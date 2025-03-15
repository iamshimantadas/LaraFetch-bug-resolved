<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class linksController extends Controller
{
   public function link(Request $request){
    if(session()->get('adminmail')){
        $file = DB::table('files')
        ->orderBy('id', 'DESC')->get();
        return view('admin/links',['link'=>$file]);
    }else{
        return view('/admin/login');
    }
   }

   public function copylink(Request $request){
    if(session()->get('adminmail')){
        $request->validate([
            'topicname'=>'required',
            'filelink'=>'required'
        ]);

        $topic = $request['topicname'];
        $filelink = $request['filelink'];

        return view('admin/copylink',['link'=>$filelink,'topic'=>$topic]);

    }else{
        return view('/admin/login');
    }
   }

}
