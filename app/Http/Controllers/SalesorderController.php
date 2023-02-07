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
