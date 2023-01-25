<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\route;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $route = route::select('route_name','id')->get();
       return view('Customers.add',['route'=>$route]);
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
        $customer = new customer();
        $customer->customer_name = ucwords($request->customer_name);
        $customer->trade_name = $request->trade_name;
        $customer->customer_address = $request->customer_address;
        $customer->customer_gst = $request->gst_no;
        $customer->customer_mobile = $request->mobile_number;
        $customer->outstanding = 0;
        $customer->route_name = $request->route_name;
        $customer->save();
        return redirect('/customerlist')->with('useradd', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {   
        
        $data=customer::paginate(10);
        //print_r($data);
        return view('Customers.List',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $route=customer::where('id',$id)->get();
        $routename=route::get();
        return view('Customers.Update',['route'=>$route],['routename'=>$routename]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        customer::where('id', $id)
         ->update(
            [
                'customer_name'=> ucwords($request->input('edit_customer_name')),
                'trade_name'=>$request->input('edit_trade_name'),
                'customer_address'=>$request->input('edit_customer_address'),
                'customer_gst'=>$request->input('edit_gst_no'),
                'customer_mobile'=>$request->input('edit_mobile_number'),
                'route_name'=>$request->input('edit_route_name'),
            ]);
        return redirect('/customerlist')->with('userupdate', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::where('id',$id)->delete();
        return redirect('/customerlist')->with('userdelete','Delete successfully');
    }
}
