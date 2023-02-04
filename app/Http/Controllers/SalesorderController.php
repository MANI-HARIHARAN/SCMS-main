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
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'date'=>'required',
    //         'route'=>'required',
    //         'company_name'=>'required',
    //         'bill_type'=>'required',
    //         'brand_name'=>'required',
    //         'product_name'=>'required',
    //         'uom'=>'required',
    //         'qty'=>'required',
    //         'gst'=>'required',
    //         'rate'=>'required',
    //         'product_total'=>'required',
    //         'grand_total'=>'required',
    //         'balance'=>'required',
    //         'cash_received'=>'required',
    //         'total_outstanding'=>'required'
    //     ]);
    //         $salesorder = new salesorder;
    //         $salesorder->date = $request->date;
    //         $salesorder->route = $request->route;
    //         $salesorder->company_name = $request->company_name;
    //         $salesorder->bill_type = $request->bill_type;
    //         $salesorder->brand_name = $request->brand_name;
    //         $salesorder->product_name = $request->product_name;
    //         $salesorder->uom = $request->uom;
    //         $salesorder->qty = $request->qty;
    //         $salesorder->gst = $request->gst;
    //         $salesorder->rate = $request->rate;
    //         $salesorder->product_total = $request->product_total;
    //         $salesorder->grand_total= $request->grand_total;
    //         $salesorder->cash_received = $request->cash_received;
    //         $salesorder->balance =$request->balance;
    //         $salesorder->total_outstanding = $request->total_outstanding;
    //         $salesorder->save();
    //         return redirect('/sales');
    // }

    public function store(Request $request)
{

            $salesorder = new salesorder;
            $salesorder->date = $request->date;
            $salesorder->route = $request->route;
            $salesorder->company_name = $request->company_name;
            $salesorder->bill_type = $request->bill_type;
            $salesorder->brand_name = $request->brand_name;
            $salesorder->product_name = $request->product_name;
            $salesorder->uom = $request->uom;
            $salesorder->qty = $request->qty;
            $salesorder->gst = $request->gst;
            $salesorder->rate = $request->rate;
            $salesorder->product_total = $request->product_total;
            $salesorder->grand_total= $request->grand_total;
            $salesorder->cash_received = $request->cash_received;
            $salesorder->balance =$request->balance;
            $salesorder->total_outstanding = $request->total_outstanding;
            $salesorder->save();
            return redirect('/sales');

    // return redirect('/sales');
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
