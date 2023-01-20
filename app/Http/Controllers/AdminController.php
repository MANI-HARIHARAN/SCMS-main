<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $userData = new admin();
        $userData->name = ucwords($request->name);
        $userData->role = $request->user_role;
        $userData->username = $request->username;
        $userData->password = $request->password;
        $userData->save();
        return redirect('/userlist')->with('useradd', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        $data=admin::paginate(10);
        return view('Users.List',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // $id = $request->input('id');
       
        $users=DB::table('admins')->where('id',$id)->get();
        return view('Users.Update',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        $id = $request->input('id');
        request::where('id', $id)
         ->update(
            [
               'name' => ucwords($request->input('edit_name')),
               'role' => $request->input('edit_role'),
               'username' => $request->input('edit_username'),
               'password' => $request->input('edit_password'), 
            ]);
        return redirect('/userlist')->with('userupdate', 'Updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
