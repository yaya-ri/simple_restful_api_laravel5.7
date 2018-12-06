<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerKontak extends Controller
{

    public function index()
    {
        $database = \App\Kontak::all();

        if(count($database)>0){
            $res['message'] = "Success!";
            $res['values'] = $database;
            return response($res);
        }else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name =  $request->input('name');
        $email =  $request->input('email');
        $no =  $request->input('no');
        $address =  $request->input('address');

        $database = new \App\Kontak();
        $database->name     = $name;
        $database->email    = $email;
        $database->no       = $no;
        $database->address  = $address;

        if($database->save()){
            $res['message'] = "success!";
            $res['values'] = $database;
            return response($res);
        }
         
    }
    function show($id)
    {
        $database = \App\Kontak::where('id',$id)->get();
        if(count($database)>0){
            $res['message'] = "Success!";
            $res['values'] = $database;
            return response($res);
        }else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $name =  $request->input('name');
        $email =  $request->input('email');
        $no =  $request->input('no');
        $address =  $request->input('address');

        $database = \App\Kontak::where('id',$id)->first();
        $database->name     = $name;
        $database->email    = $email;
        $database->no       = $no;
        $database->address  = $address;

        if($database->save()){
            $res['message'] = "success!";
            $res['values'] = $database;
            return response($res);
        }else{
            $res['message'] = "failled !!";
            return response($res);
        }
    }


    public function destroy($id)
    {
        $database = \App\Kontak::where('id',$id)->first();

        if($database->delete()){
            $res['message']="Success!!";
            $res['values']=$database;
            return response($res);
        }else{
            $res['message']='failed!!';
            return response($res);
        }
    }
}
