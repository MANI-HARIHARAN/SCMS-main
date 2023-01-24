<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\brands;
use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::paginate(10);
        return view('Products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $products = DB::table('brands')->get();
        return view('Products.add', ['products' => $products]);
          
        
        
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
            'name' =>'required',
            'brands'=>'required',
        ]);
        $products = new products;
        $products->name = $request->name;
        $products->brands = $request->brands;
        $products->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $products = products::find($id);
    return view('Products.edit', compact('products'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = products::findOrFail($id);
        $products->name = $request->input('name'); 
        $products->brands = $request->input('brands');
         $products->save();
         return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = products::find($id);
        $products->delete();
        return redirect('/products');
    }
}
