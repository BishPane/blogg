<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    function listing(){
        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        // echo '<pre>';
        // print_r($data['result']);
        // die();
        return view('admin.post.list',$data);
    }
    function submit(Request $request){
        $request->validate([

            'title'=>'required',
            'slug'=>'required|unique:posts',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'post_date'=>'required',
        ]);
                // echo "Hello";
        // $image =$request->file('image')->store('public/post');
        $image =$request->file('image');
        $ext = $image->extension();
        $file = time().'.'.$ext;
        $image->storeAs('/public/post',$file);

            
        $data = array(
            'title' => $request->input('title'),
            'slug'=>$request->input('slug'),
            'short_desc'=>$request->input('short_desc'),
            'long_desc'=>$request->input('long_desc'),
            'image'=>$file,
            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')

        );

        DB::table('posts')->insert($data);
        $request->session()->flash('msg','DATA SAVED');
        return redirect('/admin/post/list');


    }
    function delete($id,Request $request){
        DB::table('posts')->where('id',$id)->delete();
        $request->session()->flash('msg',"DELETED");
        return redirect('/admin/post/list');

    }
    function edit($id, Request $request){
       $data['result'] = DB::table('posts')->where('id',$id)->get();
    //    echo '<pre>';
    //    print_r($data);
    //    die();
       return view('/admin.post.edit',$data);
    }
    function update(Request $request, $id){
        $request->validate([

            'title'=>'required',
            'slug'=>'required',

            'short_desc'=>'required',

            'long_desc'=>'required',
            'image'=>'mimes:jpg,jpeg,png',
            'post_date'=>'required',
        ]);

        $data = array(
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),

            'short_desc'=>$request->input('short_desc'),
            'long_desc'=>$request->input('long_desc'),

            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d h:i:s')

        );
        if($request->hasFile('image')){

            $image =$request->file('image')->store('public/post');
        $image =$request->file('image');
        $ext = $image->extension();
        $file = time().'.'.$ext;
        $image->storeAs('/public/post',$file);

        $data['image'] = $file;

        }
                // echo "Hello";
        

            
       

        DB::table('posts')->where('id',$id)->update($data);
        $request->session()->flash('msg','DATA UPDATED');
        return redirect('/admin/post/list');


    }
}
