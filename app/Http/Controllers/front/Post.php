<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Post extends Controller
{
    function home(){

        $data['result'] = DB::table('posts')->orderBy('id','desc')->get();
        return view('front.home',$data);
    }

    function post($id){

        $data['result'] = DB::table('posts')->where('slug',$id)->get();
        return view('front.post',$data);
    }

  public static function page_menu(){
    $result = DB::table('pages')->where('status','1')->get();
    return $result;

    }

    function page($id){
        $data['result'] = DB::table('pages')->where('slug',$id)->get();
        // echo '<pre>';
        // print_r($result);
        // die();
        return view('front.page',$data);
    }
}
