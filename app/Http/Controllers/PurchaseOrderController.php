<?php

namespace App\Http\Controllers;

use App\Models\purchaseOrder;
use App\Models\brands;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $value = 1;
        // $temp = $value;
        // $inc = DB::select("SELECT * FROM `purchase_orders` ORDER BY po_no DESC LIMIT 1");
        // if ($inc) {
        //    $temp1 = $inc[0]->po_no;
        //     $temp1 = $temp1+1;
        //    $temp =  $temp1;
        // }

        $brands = brands::select('name')->get();
        $products = products::select('name')->get();
        return view('PO.add', compact('brands', 'products'));
        //return view('PO.add',compact('brands','products','temp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date = $request->input('date');
        $bill_type = $request->input('bill_type');
        $po_no = $request->input('po_number');
        $company_name = $request->input('company_name');
        $po_date = $request->input('po_date');

        $brands = $request->input('brands');
        $products = $request->input('products');
        $uom = $request->input('po_uom');
        $qty = $request->input('po_qty');
        $mrp = $request->input('po_mrp');
        $gst = $request->input('po_gst');
        $wrate = $request->input('po_wrate');
        $rrate = $request->input('po_rrate');
        $orate = $request->input('po_orate');

        $BRAND_array = [];
        $PRODUCT_array = [];
        $UOM_array = [];
        $QTY_array = [];
        $MRP_array = [];
        $GST_array = [];
        $RRATE_array = [];
        $WRATE_array = [];
        $ORATE_array = [];

        for ($j = 0; $j < count($brands); $j++) {
            if (isset($brands[$j]))
                array_push($BRAND_array, $brands[$j]);
            if (isset($products[$j]))
                array_push($PRODUCT_array, $products[$j]);
            if (isset($uom[$j]))
                array_push($UOM_array, $uom[$j]);
            if (isset($qty[$j]))
                array_push($QTY_array, $qty[$j]);
            if (isset($mrp[$j]))
                array_push($MRP_array, $mrp[$j]);
            if (isset($gst[$j]))
                array_push($GST_array, $gst[$j]);
            if (isset($wrate[$j]))
                array_push($RRATE_array, $wrate[$j]);
            if (isset($rrate[$j]))
                array_push($WRATE_array, $rrate[$j]);
            if (isset($orate[$j]))
                array_push($ORATE_array, $orate[$j]);
        }

        for ($i = 0; $i < count($PRODUCT_array); $i++) {
            $data[$i] = array(
                'brand_name' => $brands[$i],
                'product_name' => $products[$i],
                'uom' => $uom[$i],
                'qty' => $qty[$i],
                'mrp' => $mrp[$i],
                'gst' => $gst[$i],
                'wrate' => $wrate[$i],
                'rrate' => $rrate[$i],
                'orate' => $orate[$i],

                'date' => $date,
                'bill_type' => $bill_type,
                'po_no' => $po_no,
                'company_name' => ucwords($company_name),
                'po_date' => $po_date,

                'product_total' => $mrp[$i] + ($mrp[$i] * ($gst[$i] / 100)),
                'grand_total' => $qty[$i] * $mrp[$i] + ($mrp[$i] * ($gst[$i] / 100)),
                'created_by' => "admin"
            );
            // print_r($data[$i]);
             DB::table('purchase_orders')->insert($data[$i]);
        }
//stock update code:
        for ($k = 0; $k < count($PRODUCT_array); $k++) {
            $stockcheck = DB::select('SELECT * FROM `stocks` where brand_name=? AND product_name=?', [$brands[$k], $products[$k]]);
            if (isset($stockcheck)) {
                print_r($stockcheck);
                $a= ($stockcheck[0]->qty);
                $temp=(float)$a+(float)$qty[$k];
                DB::select('UPDATE `stocks` SET `qty`= ? WHERE brand_name=? and product_name=?',[$temp,$brands[$k], $products[$k]]);  
                DB::select('UPDATE stocks SET mrp =? WHERE brand_name=? and product_name=?',[$mrp[$k],$brands[$k], $products[$k]]);
            }
            else{
                $data[$k] = array(
                    'brand_name' => $brands[$k],
                    'product_name' => $products[$k],
                    'qty' => $qty[$k],
                    'mrp' => $mrp[$k],
                );
                DB::table('stocks')->insert($data[$k]);
            }
        }     //stock update code end:
        
            echo "insert sucessfully";
        return redirect('/polist')->with('useradd', 'PO Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseOrder $purchaseOrder)
    {
        $data = purchaseOrder::paginate(10);
        $group = DB::select('SELECT COUNT(id) as total,po_no,company_name,po_date,bill_type,date FROM purchase_orders GROUP BY po_no');
        return view('PO.List', ['data' => $data], ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($po_no)
    {
        // $id = DB::select('SELECT id FROM purchase_orders WHERE po_no=?',[$po_no]);
        $brands = brands::select('*')->get();
        $products = products::select('*')->get();
        $users = purchaseOrder::where('po_no', $po_no)->get();
        $date = DB::select('SELECT date  FROM purchase_orders WHERE po_no=? GROUP BY po_no', [$po_no]);
        $potype = DB::select('SELECT bill_type,po_no FROM purchase_orders  WHERE po_no=? GROUP BY po_no', [$po_no]);
        $pono = DB::select('SELECT po_no FROM purchase_orders  WHERE po_no=? GROUP BY po_no', [$po_no]);
        $podate = DB::select('SELECT po_date,po_no FROM purchase_orders  WHERE po_no=? GROUP BY po_no', [$po_no]);
        $company = DB::select('SELECT company_name,po_no FROM purchase_orders  WHERE po_no=? GROUP BY po_no', [$po_no]);
        $table = purchaseOrder::where('po_no', $po_no)->get();
        //print_r($brands);
        return view('PO.Update', compact('brands', 'products', 'users', 'table', 'date', 'potype', 'pono', 'podate', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $po_number = $request->input('po_no');
        $tableid = $request->input('id');
        $date = $request->input('edit_date');
        $bill_type = $request->input('edit_bill_type');
        $po_no = $request->input('edit_po_number');
        $company_name = $request->input('edit_company_name');
        $po_date = $request->input('edit_po_date');

        $brands = $request->input('edit_brands');
        $products = $request->input('edit_products');
        $uom = $request->input('edit_po_uom');
        $qty = $request->input('edit_po_qty');
        $mrp = $request->input('edit_po_mrp');
        $gst = $request->input('edit_po_gst');
        $wrate = $request->input('edit_po_wrate');
        $rrate = $request->input('edit_po_rrate');
        $orate = $request->input('edit_po_orate');

        for ($i = 0; $i < count($brands); $i++) {
            $data[$i] = array(
                'brand_name' => $brands[$i],
                'product_name' => $products[$i],
                'uom' => $uom[$i],
                'qty' => $qty[$i],
                'mrp' => $mrp[$i],
                'gst' => $gst[$i],
                'wrate' => $wrate[$i],
                'rrate' => $rrate[$i],
                'orate' => $orate[$i],

                'date' => $date,
                'bill_type' => $bill_type,
                'po_no' => $po_no,
                'company_name' => ucwords($company_name),
                'po_date' => $po_date,

                'product_total' => $mrp[$i] + ($mrp[$i] * ($gst[$i] / 100)),
                'grand_total' => $qty[$i] * $mrp[$i] + ($mrp[$i] * ($gst[$i] / 100)),
                'created_by' => "admin"

            );
            DB::table('purchase_orders')->where('po_no', $po_no)->where('id', $tableid[$i])->update($data[$i]);
        }
      
        for ($k = 0; $k < count($brands); $k++) {
            $stockcheck = DB::select('SELECT * FROM `stocks` where brand_name=? AND product_name=?', [$brands[$k], $products[$k]]);
            $oldpoqty = DB::select('SELECT * FROM `purchase_orders` where po_no=? and brand_name=? and product_name=?', [$po_no,$brands[$k], $products[$k]]);
            for($z=0;$z<count($brands);$z++){
                if (isset($stockcheck)) {
                    $a[$z]= ($stockcheck[$z]->qty);
                    $b[$z]= ($oldpoqty[$z]->qty);
                    $temp1[$z]=(float)$a[$z]-(float)$b[$z];
                  //  print_r($temp1[$z]);
                    $temp[$z]=(float)$temp1[$z]+(float)$qty[$z];
                  // print_r($temp[$z]);
                    DB::select('UPDATE stocks SET qty=? WHERE brand_name=? and product_name=?',[$temp[$z],$brands[$k],$products[$k]]);  
                    DB::select('UPDATE stocks SET mrp=? WHERE brand_name=? and product_name=?',[$mrp[$k],$brands[$k],$products[$k]]);
                }
                else{
                    $data[$k] = array(
                        'brand_name' => $brands[$k],
                        'product_name' => $products[$k],
                        'qty' => $qty[$k],
                        'mrp' => $mrp[$k],
                    );
                  DB::table('stocks')->insert($data[$k]);
                }

            }
            
        }
      return redirect('/polist')->with('userupdate', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($po_no)
    {      
        $selectpodata = DB::select('SELECT * FROM `purchase_orders` where po_no=?', [$po_no]);
        $count = DB::select('SELECT COUNT(id) as total FROM `purchase_orders` WHERE po_no=?', [$po_no]);
        $total= ($count[0]->total);
        for($i=0;$i<$total;$i++){
            $brandData[$i]= ($selectpodata[$i]->brand_name);
            $productData[$i]= ($selectpodata[$i]->product_name);
            $qtyData[$i]= ($selectpodata[$i]->qty);
            $mrpData[$i]= ($selectpodata[$i]->mrp);
            $stockcheck = DB::select('SELECT * FROM `stocks` where brand_name=? AND product_name=?', [$brandData[$i],$productData[$i]]);
            if (isset($stockcheck)) {
                $qtyStock[$i]=($stockcheck[0]->qty);
                $deleteStockqty[$i]=(float)$qtyStock[$i]-(float)$qtyData[$i];
                DB::select('UPDATE `stocks` SET `qty`= ? WHERE brand_name=? and product_name=?',[$deleteStockqty[$i],$brandData[$i],$productData[$i]]);  
            }
        }
        purchaseOrder::where('po_no', $po_no)->delete();
        return redirect('/polist')->with('orgdelete', 'Delete successfully');
    }
}
