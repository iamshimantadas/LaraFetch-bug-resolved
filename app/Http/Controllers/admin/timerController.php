<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Downloadlimit;


class timerController extends Controller
{
    public function redirecttimer(){
        if(session()->get('adminmail')){
        $rec = DB::table('downloadlimit')->orderBy('id', 'DESC')->get();
       return view('admin/timer',['time'=>$rec]);
        }else{
            return view('/admin/login');
        }

    }
    public function time(Request $request){
        if(session()->get('adminmail')){
            $request->validate([ 'timer'=>'required' ]);

            $time = $request['timer'];

            $download = new Downloadlimit;
            $download->downloadsec = $time;
            $download->date = date("Y/m/d");
            date_default_timezone_set("Asia/Kolkata");
            $download->time = date("h:i:sa");
            $download->save();

            return redirect('/admin_dashboard');
            
        }else{
            return view('/admin/login');
        }

    }

}
