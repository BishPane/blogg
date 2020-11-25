<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Page extends Controller
{
    function listing(){
        $data['result'] = DB::table('pages')->orderBy('id','desc')->get();
        // echo '<pre>';
        // print_r($data['result']);
        // die();
        return view('admin.page.list',$data);
    }
    function submit(Request $request){
        $request->validate([

            'name'=>'required',
            'slug'=>'required|unique:pages',
            'description'=>'required'
        ]);

            
        $data = array(
            'name' => $request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')

        );

        DB::table('pages')->insert($data);
        $request->session()->flash('msg','PAGE SAVED');
        return redirect('/admin/page/list');


    }
    function delete($id,Request $request){
        DB::table('pages')->where('id',$id)->delete();
        $request->session()->flash('msg',"DELETED");
        return redirect('/admin/page/list');

    }
    function edit($id, Request $request){
       $data['result'] = DB::table('pages')->where('id',$id)->get();
    //    echo '<pre>';
    //    print_r($data);
    //    die();
       return view('/admin.page.edit',$data);
    }
    function update(Request $request, $id){
        $request->validate([

            'name'=>'required',
            'slug'=>'required',
            'description'=>'required'
        ]);

        $data = array(
            'name' => $request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),

            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')

        );
       

            
       

        DB::table('pages')->where('id',$id)->update($data);
        $request->session()->flash('msg','PAGE UPDATED');
        return redirect('/admin/page/list');


    }
}
