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
        $value = 1;
        $temp = $value;
        // $inc = DB::select("SELECT * FROM 'salesorders' ORDER BY so_no DESC LIMIT 1 ");
        $inc = DB::select("SELECT * FROM salesorders ORDER BY so_no DESC LIMIT 1");

        if ($inc){
            $temp1 =$inc[0]->so_no;
            $temp1 =$temp1+1;
            $temp =$temp1;
        }
        $brands = brands::select('name')->get();
        $products = products::select('name')->get();
        $customer = customer::select('customer_name')->get();
        $route = route::select('route_name')->get();
        // $salesorder = salesorder::paginate(10);
        return view('SO.home', compact('products','brands','customer','route','temp'));
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
        $date = $request->input('date');
        $route = $request->input('route');
        $customer_name = $request->input('customer_name');
        $so_no = $request->input('so_no');
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
            'customer_name' => $customer_name,
            'so_no'=>$so_no,


            //'created_by' => 'Admin',
        );
        // print_r($data[$i]);
         DB::table('salesorders')->insert($data[$i]);
    }

    return redirect('/solist')->with('useradd', 'SO Added Successfully');
}   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    
     public function show(salesorder $salesorder)
{
    $group = DB::table('salesorders')
        ->select(DB::raw('COUNT(id) as total,so_no, customer_name, route, DATE(date) as date,grand_total,total_outstanding'))
        ->groupBy(['so_no'])
        ->get();

    $data = salesorder::paginate(10);

    return view('SO.List', ['data' => $data, 'group' => $group]);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
   
    public function edit($so_no)
{
    $brands = brands::select('name')->get();
    $products = products::select('name')->get();
    $salesOrder = salesorder::where('so_no', $so_no)->first();
    $route = route::all();
    // $route = route::select('route_name')->get();
    $table=salesorder::where('so_no',$so_no)->get();
    // $customer_name=DB::select('SELECT customer_name,so_no FROM salesorders  WHERE so_no=? GROUP BY so_no', [$so_no]);
    $customer_name = customer::select('customer_name')->get();
    
    return view('SO.update', compact('brands', 'products', 'salesOrder','route','table','customer_name'));
}
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('so_no');
        $tableid = $request->input('id');
        $date = $request->input('date');
        $route = $request->input('route');
     
        $customer_name = $request->input('customer_name');
        $so_no = $request->input('so_no');
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

           
        for ($i = 0;$i < count($brand_name);$i++){
            
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
                    'customer_name' => $customer_name,
                    'so_no'=>$so_no,
                    
                );

            DB::table('salesorders')->where('so_no',$so_no)->update($data[$i]); 
        }
             
        return redirect('/solist')->with('useradd', 'SO Added Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salesorder  $salesorder
     * @return \Illuminate\Http\Response
     */
    public function destroy($so_no)
    {
    
         salesorder::where('so_no', $so_no)->delete();
        return redirect('/solist')->with('orgdelete', 'Delete successfully');
       
    }
}
