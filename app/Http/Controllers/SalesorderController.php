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
        //
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
