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
        $brands = brands::select('name')->get();
        $products = products::select('name')->get();
        return view('PO.add',['brands'=>$brands],['products'=>$products]);
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
       print_r($brands) ;
        $products = $request->input('products');
        $uom = $request->input('po_uom');
        $qty = $request->input('po_qty');
        $mrp = $request->input('po_mrp');
        $gst = $request->input('po_gst');
        $wrate = $request->input('po_wrate');
        $rrate = $request->input('po_rrate');
        $orate = $request->input('po_orate');

    $BRAND_array = array();
    $PRODUCT_array = array();
    $UOM_array = array();
    $QTY_array = array();
    $MRP_array = array();
    $GST_array = array();
    $RRATE_array = array();
    $WRATE_array = array();
    $ORATE_array = array();

    foreach ($brands as $BRAND_obj) {
       array_push($BRAND_array, $BRAND_obj);
    }
    foreach ($products as $product_obj) {
       array_push($PRODUCT_array, $product_obj);
    }
    foreach ($uom as $uom_obj) {
       array_push($UOM_array, $uom_obj);
    } 
    foreach ($qty as $qty_obj) {
       array_push($QTY_array, $qty_obj);
    }  
    foreach ($mrp as $mrp_obj) {
       array_push($MRP_array, $mrp_obj);
    } 
    foreach ($gst as $gst_obj) {
       array_push($GST_array, $gst_obj);
    } 
    foreach ($rrate as $rrate_obj) {
       array_push($RRATE_array, $rrate_obj);
    }
    foreach ($wrate as $wrate_obj) {
       array_push($WRATE_array, $wrate_obj);
    }  
    foreach ($orate as $orate_obj) {
       array_push($ORATE_array, $orate_obj);
    }

        for ($i = 0;$i < count($PRODUCT_array);$i++){
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

            'product_total' => $mrp[$i]+($mrp[$i]*($gst[$i]/100)),
            'grand_total' =>$qty[$i]*$mrp[$i]+($mrp[$i]*($gst[$i]/100)),
            'created_by' => "admin"
            );
           
           // print_r($data[$i]);
           DB::table('purchase_orders')->insert($data[$i]);
        }
        //print_r($brands) ; 
     //echo "insert sucessfully";
        
      return redirect('/polist')->with('useradd', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseOrder $purchaseOrder)
    {
        $data=purchaseOrder::paginate(10);
        // $group=DB::select('SELECT *,po_no,bill_date,bill_type,company_name,po_date, COUNT(*) as total FROM purchase_orders GROUP BY po_no');
        // $group = DB::table('purchase_orders')
        // ->select('*','po_no','bill_date','bill_type','company_name','po_date')
        // ->groupBy('po_no')
        // ->get();
        return view('PO.List',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $brands = brands::select('name')->get();
        $products = products::select('name')->get();
        $users=purchaseOrder::where('id',$id)->get();
        return view('PO.Update',compact('brands','products','users'));
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
        $id = $request->input('id');
        purchaseOrder::where('id', $id)
         ->update(
            [
                'bill_date'=>$request->input('edit_date'),
                'bill_type'=>$request->input('edit_bill_type'),
                'po_no'=>$request->input('edit_po_number'),
                'company_name'=> ucwords($request->input('edit_company_name')),
                'po_date'=>$request->input('edit_po_date'),
                'brand_name'=> $request->input('edit_brands'),
                'product_name'=> $request->input('edit_products'),
                'uom'=> $request->input('edit_po_uom'),
                'qty'=> $request->input('edit_po_qty'),
                'gst'=> $request->input('edit_po_gst'),
                'mrp'=> $request->input('edit_po_mrp'),
                'wrate'=> $request->input('edit_po_wrate'),
                'rrate'=> $request->input('edit_po_rrate'),
                'orate'=> $request->input('edit_po_orate'),

                'product_total'=>  $request->input('edit_po_mrp')+($request->input('edit_po_mrp')*($request->input('edit_po_gst')/100)),
                'grand_total'=> $request->input('edit_po_qty')*($request->input('edit_po_mrp')+($request->input('edit_po_mrp')*($request->input('edit_po_gst')/100))),
                'created_by'=>"admin",
            ]);
        return redirect('/polist')->with('userupdate', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        purchaseOrder::where('id',$id)->delete();
        return redirect('/polist')->with('orgdelete','Delete successfully');
    }
}
