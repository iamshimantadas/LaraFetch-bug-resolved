<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\fileHandler;
use App\Http\Controllers\admin\linksController;
use App\Http\Controllers\admin\timerController;
use App\Http\Controllers\fileDownloadController;
use App\Http\Controllers\admin\searchSuggestion;


Route::get('/', function () {
    return view('index');
});
Route::get('/file_download/{link}/{topic}', function (String $link,String $topic) {
    return view('download',['downloadFilename'=>$link,'topic'=>$topic]);
});
Route::get('/file_process',[fileDownloadController::class,'fileDownload']);
Route::get('/final_download',[fileDownloadController::class,'finalDownload']);



// admin routes adminmail
Route::get('/admin',function(){
    if(session()->get('adminmail')){
        return redirect('/admin_dashboard');
    }else{
        return view('/admin/login');
    }
});
Route::post('/admin_login',[loginController::class,'login']);
Route::get('/admin_dashboard',[loginController::class,'dashboard']);

Route::get('/admin_file',function(){
    if(session()->get('adminmail')){
        return view('/admin/files');
    }else{
        return view('/admin/login');
    }
});
Route::post('/admin_file_upload',[fileHandler::class,'files']);
Route::get('/admin_links',[linksController::class,'link']);
Route::get('/admin_logout',function(){
    if(session()->get('adminmail')){

        session()->forget('adminmail');
        session()->flush();

        return redirect('/admin');

    }else{
        return view('/admin/login');
    }
});
Route::get('/admin_timer',[timerController::class,'redirecttimer']);
Route::post('/admin_timer_req',[timerController::class,'time']);
Route::post('/admin_file_modify',[fileHandler::class,'fileModify']);
Route::post('/admin_file_modify_req',[fileHandler::class,'fileModifyRequest']);
Route::post('/copylink',[linksController::class,'copylink']);
Route::post('/admin_post_search',[fileHandler::class,'fileModifyByTopicName']);
Route::post('/deletefile',[fileHandler::class,'deleteFiles']);
Route::post('/search_sugg',[searchSuggestion::class,'search'])->name('searchsuggestion');
