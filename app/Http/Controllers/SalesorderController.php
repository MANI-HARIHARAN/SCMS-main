<?php

namespace App\Http\Controllers;

use App\Models\salesorder;
use App\Models\brands;
use App\Models\products;
use App\Models\customer;
use App\Models\route;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'route'=>'required',
            'company_name'=>'required',
            'bill_type'=>'required',
            'brand_name'=>'required',
            'product_name'=>'required',
            'uom'=>'required',
            'qty'=>'required',
            'gst'=>'required',
            'rate'=>'required',
            'product_total'=>'required',
            'grand_total'=>'required',
            'cash_received'=>'required',
            'total_outstanding'=>'required',
        ]);
    
        $balance = $request->cash_received - $request->grand_total;
        $salesorderData = [
            'date' => $request->date,
            'route' => $request->route,
            'company_name' => $request->company_name,
            'bill_type' => $request->bill_type,
            'brand_name' => $request->brand_name,
            'product_name' => $request->product_name,
            'uom' => $request->uom,
            'qty' => $request->qty,
            'gst' => $request->gst,
            'rate' => $request->rate,
            'product_total' => $request->product_total,
            'grand_total'=> $request->grand_total,
            'cash_received' => $request->cash_received,
            'balance' => $balance,
            'total_outstanding' => $request->total_outstanding,
            ];
            $salesorder = new SalesOrder($salesorderData);
            $salesorder->save();
            return redirect('/sales');
    }
  
//     public function store(Request $request)
//     {
//         $request->validate([
//             'date'=>'required',
//             'route'=>'required',
//             'company_name'=>'required',
//             'bill_type'=>'required',
//             'brand_name'=>'required',
//             'product_name'=>'required',
//             'uom'=>'required',
//             'qty'=>'required',
//             'gst'=>'required',
//             'rate'=>'required',
//             'product_total'=>'required',
//             'grand_total'=>'required',
//             'cash_received'=>'required',
//             'total_outstanding'=>'required',
//         ]);

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
//         $grand_total = $request->input('grand_total');
//         $cash_received = $request->input('cash_received');
//         $total_outstanding = $request->input('total_outstanding');

//         $date_array = array();
//         $route_array = array();
//         $company_name_array = array();
//         $bill_type_array = array();
//         $brand_name_array = array();
//         $product_name_array = array();
//         $uom_array = array();
//         $qty_array = array();
//         $gst_array = array();
//         $rate_array = array();
//         $product_total_array = array();
//         $grand_total_array = array();
//         $cash_received_array = array();
//         $total_outstanding_array = array();

//         foreach ($date as $date_obj) {
//            array_push($date_array, $date_obj);
//         }
//         foreach ($route as $route_obj) {
//            array_push($route_array, $route_obj);
//         }
//         foreach ($company_name as $company_name_obj) {
//            array_push($company_name_array, $company_name_obj);
//         }

//         foreach ($bill_type as $bill_type_obj) {
//            array_push($bill_type_array, $bill_type_obj);
//         }
        
        
//         foreach ($brand_name as $brand_name_obj) {
//            array_push($brand_name_array, $brand_name_obj);
//         }
//         foreach ($product_name as $product_name_obj) {
//            array_push($product_name_array, $product_name_obj);
//         }
//         foreach ($uom as $uom_obj) {
//             array_push($uom_array, $uom_obj);
//          }
//          foreach ($qty as $qty_obj) {
//             array_push($qty_array, $qty_obj);
//          }
//          foreach ($gst as $gst_obj) {
//             array_push($gst_array, $gst_obj);
//          }
//          foreach ($rate as $rate_obj) {
//             array_push($rate_array, $rate_obj);
//          }
//          foreach ($product_total as $product_total_obj) {
//             array_push($product_total_array, $product_total_obj);
//          }
//          foreach ($grand_total as $grand_total_obj) {
//             array_push($grand_total_array, $grand_total_obj);
//          }
//          foreach ($cash_received as $cash_received_obj) {
//             array_push($cash_received_array, $cash_received_obj);
//          }
//          foreach ($total_outstanding as $total_outstanding_obj) {
//             array_push($total_outstanding_array, $total_outstanding_obj);
//          }
 
//         $salesorder = new SalesOrder($salesorderData);
//         $salesorder->save();
//         return redirect("/sales");
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
