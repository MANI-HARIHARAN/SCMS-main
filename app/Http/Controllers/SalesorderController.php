<?php

namespace App\Http\Controllers;

use App\Models\salesorder;
use App\Models\brands;
use App\Models\products;
use App\Models\customer;
use App\Models\route;
use Illuminate\Http\Request;
use DB;

class SalesorderController extends Controller
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
        $customer = customer::select('customer_name')->get();
        $route = route::select('route_name')->get();
        // $salesorder = salesorder::paginate(10);
        return view('SO.home', compact('products','brands','customer','route'));
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
    //  */

    public function store(Request $request)
    {
        $date = $request->input('date');
        $route = $request->input('route');
        $company_name = $request->input('company_name');
        $bill_type = $request->input('bill_type');
    
        $brand_name = $request->input('brand_name');
        $product_name = $request->input('product_name');
        $uom = $request->input('uom');
        $qty = $request->input('qty');
        $gst = $request->input('gst');
        $rate = $request->input('rate');
        $product_total = $request->input('product_total');
        $grand_total= $request->input('grand_total');
        $cash_received = $request->input('cash_received');
        $balance =$request->input('balance');
        $total_outstanding = $request->input('total_outstanding');
           
        $brand_name_array = [];
        $product_name_array = [];
        $uom_array = [];
        $qty_array = [];
        $gst_array = [];
        $rate_array = [];
        $product_total_array = [];
        
        // print(count($brand_name));
        for($j=0;$j<count($brand_name);$j++)
        {
            if(isset($brand_name[$j]))
                array_push($brand_name_array,$brand_name[$j]);
            
            if(isset($product_name[$j]))
                array_push($product_name_array,$product_name[$j]);
            
            if(isset($uom[$j]))
                array_push($uom_array,$uom[$j]);
            
            if(isset($qty[$j]))
                array_push($qty_array,$qty[$j]);
            if(isset($gst[$j]))
                array_push($gst_array,$gst[$j]);    
            
            if(isset($rate[$j]))
                array_push($rate_array,$rate[$j]);
            
            if(isset($product_total[$j]))
                array_push($product_total_array,$product_total[$j]);
            
            
                    
            //print_r($stsArr[$j]."<br>");
        }
        // print_r($product_total_array);
        // print_r($rate_array);
        // print_r($gst_array);
        // print_r($qty_array);
        // print_r($brand_name_array);
        // print_r($uom_array);
        // print_r($product_name_array);
    // print_r($product_name_array);
   
     for ($i = 0; $i < count($brand_name_array); $i++) {
        $data[$i] = array(
            'brand_name' => $brand_name[$i],
            'product_name' => $product_name[$i],
            'uom' => $uom[$i],
            'qty' => $qty[$i],
            'gst' => $gst[$i],
            'rate' => $rate[$i],
            'product_total' => $product_total[$i],


            'grand_total' => $grand_total,
            'cash_received' => $cash_received,
            'balance' => $balance,
            'total_outstanding' => $total_outstanding,
            'date' => $date,
            'route' => $route,
            'bill_type' => $bill_type,
            'company_name' => $company_name,

            //'created_by' => 'Admin',
        );
        // print_r($data[$i]);
         DB::table('salesorders')->insert($data[$i]);
    }

    return redirect('/sales');
} 

    

    // public function store(Request $request)
    // {
       
            
    //         $date = $request->input('date');
    //         $route = $request->input('route');
    //         $company_name = $request->input('company_name');
    //         $bill_type = $request->input('bill_type');


    //         $brand_name = $request->input('brand_name');
    //         $product_name = $request->input('product_name');
    //         $uom = $request->input('uom');
    //         $qty = $request->input('qty');
    //         $gst = $request->input('gst');
    //         $rate = $request->input('rate');
    //         $product_total = $request->input('product_total');
    //         $grand_total= $request->input('grand_total');
    //         $cash_received = $request->input('cash_received');
    //         $balance =$request->input('balance');
    //         $total_outstanding = $request->input('total_outstanding');
            
    //         $BRAND_array = array();
    //         $PRODUCT_array = array();
    //         $UOM_array = array();
    //         $QTY_array = array();
    //         $GST_array = array();
    //         $RATE_array = array();
    //         $PTOTAL_array = array();
    //         $GTOTAL_array = array();
    //         $CASH_array = array();
    //         $BALANCE_array = array();
    //         $TOTALOUT_array = array();

    //         foreach ($brand_name as $brand_name_obj) {
    //             array_push($BRAND_array, $brand_name_obj);
    //          }
    //          foreach ($product_name as $product_name_obj) {
    //             array_push($PRODUCT_array, $product_name_obj);
    //          }
    //          foreach ($uom as $uom_obj) {
    //             array_push($UOM_array, $uom_obj);
    //          } 
    //          foreach ($qty as $qty_obj) {
    //             array_push($QTY_array, $qty_obj);
    //          }  
    //          foreach ($gst as $gst_obj) {
    //             array_push($GST_array, $gst_obj);
    //          } 
    //          foreach ($rate as $rate_obj) {
    //             array_push($RATE_array, $rate_obj);
    //          }
    //          foreach ($product_total as $product_total_obj) {
    //             array_push($PTOTAL_array, $product_total_obj);
    //          }  
    //          foreach ($grand_total as $grand_total_obj) {
    //             array_push($GTOTAL_array, $grand_total_obj);
    //          }
    //          foreach ($cash_received as $cash_received_obj) {
    //             array_push($CASH_array, $cash_received_obj);
    //          }
    //          foreach ($balance as $balance_obj) {
    //             array_push($BALANCE_array, $balance_obj);
    //          }
    //          foreach ($total_outstanding as $total_outstanding_obj) {
    //             array_push($TOTALOUT_array, $total_outstanding_obj);
    //          }
         
    //              for ($i = 0;$i < count($BRAND_array);$i++){
    //                  $data[$i] = array(
    //                  'brand_name' => $brands_name[$i],
    //                  'product_name' => $products_name[$i],
    //                  'uom' => $uom[$i],
    //                  'qty' => $qty[$i],
    //                  'gst' => $gst[$i],
    //                  'rate' => $rate[$i],
    //                  'product_total' => $product_total[$i],
    //                  'grand_total' => $grand_total[$i],
    //                  'cash_received' => $cash_received[$i],
    //                  'balance' => $balance[$i],
    //                  'total_outstanding' => $total_outstanding[$i],
         
    //                  'date' => $date,
    //                  'route' => $route,
    //                  'bill_type' => $bill_type,
    //                  'company_name' =>$company_name,
                     
         
    //                  'product_total' => $request->po_number,
    //                  'grand_total' => $request->po_number,
    //                  'created_by' => $request->po_number,
    //                  );
                    
    //                  //print_r($data[$i]);
    //                  DB::table('salesorders')->insert($data[$i]);
    //              }
                 
    //              echo "insert sucessfully";
    // }

//     public function store(Request $request)
// {

//             $salesorder = new salesorder;
//             $salesorder->date = $request->date;
//             $salesorder->route = $request->route;
//             $salesorder->company_name = $request->company_name;
//             $salesorder->bill_type = $request->bill_type;
//             $salesorder->brand_name = $request->brand_name;
//             $salesorder->product_name = $request->product_name;
//             $salesorder->uom = $request->uom;
//             $salesorder->qty = $request->qty;
//             $salesorder->gst = $request->gst;
//             $salesorder->rate = $request->rate;
//             $salesorder->product_total = $request->product_total;
//             $salesorder->grand_total= $request->grand_total;
//             $salesorder->cash_received = $request->cash_received;
//             $salesorder->balance =$request->balance;
//             $salesorder->total_outstanding = $request->total_outstanding;
//             $salesorder->save();
//             return redirect('/sales');

//     // return redirect('/sales');
// }

  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function show(salesorder $salesorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function edit(salesorder $salesorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salesorder $salesorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(salesorder $salesorder)
    {
        //
    }
}
