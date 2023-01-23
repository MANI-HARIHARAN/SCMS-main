<?php

namespace App\Http\Controllers;

use App\Models\route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $userData = new route();
        $userData->route_name = ucwords($request->route_name);
        $userData->save();
        return redirect('/routelist')->with('useradd', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(route $route)
    {
        $data=route::paginate(10);
        return view('Routes.List',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=DB::table('routes')->where('id',$id)->get();
        return view('Routes.Update',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        route::where('id', $id)
         ->update(
            [
                'route_name'=> ucwords($request->input('edit_route_name')),
            ]);
        return redirect('/routelist')->with('userupdate', 'Updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        route::where('id',$id)->delete();
        return redirect('/routelist')->with('orgdelete','Delete successfully');
    }
}
