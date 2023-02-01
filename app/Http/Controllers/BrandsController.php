<?php

namespace App\Http\Controllers;

use App\Models\brands;
use Illuminate\Http\Request;
use DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::paginate(10);
        return view('Brands.brands', compact('brands'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Brands.addbrands');
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
        ]);
        $brands = new brands;
        $brands->name = $request->name;
        $brands->save();
        return redirect('/brands')->with('brandadd','Brands added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){

        // $brands = brands::paginate(10);
        // return view('Brand.brands', ['brands' => $brands]);
         
      }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $brands = brands::find($id);
        return view('Brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brands = brands::find($id);
        $brands->name = $request->name;   
         $brands->save();
         return redirect('/brands')->with('brandupdate', 'Update Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = brands::find($id);
        $brands->delete();
        return redirect('/brands');
    }
        
}
