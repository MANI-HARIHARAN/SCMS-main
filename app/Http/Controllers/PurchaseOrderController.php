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
        $products = $request->input('products');
        $uom = $request->input('po_uom');
        $qty = $request->input('po_qty');
        $mrp = $request->input('po_mrp');
        $gst = $request->input('po_gst');
        $wrate = $request->input('po_wrate');
        $rrate = $request->input('po_rrate');
        $orate = $request->input('po_orate');

    $BRANCH_array = array();
    $PRODUCT_array = array();
    $UOM_array = array();
    $QTY_array = array();
    $MRP_array = array();
    $GST_array = array();
    $RRATE_array = array();
    $WRATE_array = array();
    $ORATE_array = array();

    foreach ($brands as $BRANCH_obj) {
       array_push($BRANCH_array, $BRANCH_obj);
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

        for ($i = 0;$i < count($BRANCH_array);$i++){
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

            'bill_date' => $date,
            'bill_type' => $bill_type,
            'po_no' => $po_no,
            'company_name' => ucwords($company_name),
            'po_date' => $po_date,

            'product_total' => $request->po_number,
            'grand_total' => $request->po_number,
            'created_by' => $request->po_number,
            );
           
            print_r($data[$i]);
        }
        DB::table('purchase_orders')->insert($data[$i]);
        echo "insert sucessfully";
        
       // return redirect('/customerlist')->with('useradd', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(purchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchaseOrder $purchaseOrder)
    {
        //
    }
}
