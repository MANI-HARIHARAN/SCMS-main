<?php

namespace App\Http\Controllers;

use App\Models\purchaseOrder;
use App\Models\brands;
use App\Models\products;
use Illuminate\Http\Request;

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
        //
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
