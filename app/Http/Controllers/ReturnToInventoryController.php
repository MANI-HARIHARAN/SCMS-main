<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\customer;
use App\Models\products;
use App\Models\returnToInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnToInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::select('customer_name')->get(); 
        $brands = brands::select('name')->get();
        $products = products::select('name')->get();
        return view('ReturntoStock.addstock',compact('brands','products','customers'));
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
        $stockData = new returnToInventory();
        $stockData->date = $request->stock_date;
        $stockData->customer_name = $request->customer_name;
        $stockData->brand_name = $request->brand_name;
        $stockData->product_name = $request->product_name;
        $stockData->qty = $request->stock_qty;
        $stockData->mrp = $request->stock_mrp;
        $stockData->gst = $request->stock_gst;
        $stockData->stock_type = $request->stock_type;

        if($request->stock_type=="expiry_stock"){
            $data=($request->stock_qty*($request->stock_mrp*($request->stock_gst/100)));
            $outstand=DB::select('SELECT outstanding FROM `customers`where customer_name=?',[$request->customer_name]);
            $a= ($outstand[0]->outstanding);
            $temp=(float)$a+(float)$data;
            $stockData->total_amount = $data;
            $cn=$request->customer_name;
            DB::select('UPDATE `customers` SET outstanding=? WHERE customers.customer_name=?',[$temp,$cn]);
            
        }
        else if($request->stock_type=="mismatch_stock"){
            $data =($request->stock_qty*($request->stock_mrp+($request->stock_mrp*($request->stock_gst/100))));
            $outstand=DB::select('SELECT outstanding FROM `customers`where customer_name=?',[$request->customer_name]);
            $a= ($outstand[0]->outstanding);
            $temp=(float)$a+(float)$data;
            // echo ($data);
            // echo "dada";
            // echo ($a);
            // echo "as";
            // echo ($temp);
            $stockData->total_amount = $data;
            $cn=$request->customer_name;
            //print_r($cn);
            DB::select('UPDATE `customers` SET outstanding=? WHERE customers.customer_name=?',[$temp,$cn]);
        }
        else{
            //
        }
        $stockData->created_by = "admin";
        $stockData->save(); 
        return redirect('/stock')->with('useradd', 'Stock Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\returnToInventory  $returnToInventory
     * @return \Illuminate\Http\Response
     */
    public function show(returnToInventory $returnToInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\returnToInventory  $returnToInventory
     * @return \Illuminate\Http\Response
     */
    public function edit(returnToInventory $returnToInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\returnToInventory  $returnToInventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returnToInventory $returnToInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\returnToInventory  $returnToInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(returnToInventory $returnToInventory)
    {
        //
    }
}
