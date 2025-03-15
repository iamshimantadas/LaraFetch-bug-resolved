<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Downloadlimit;
use App\Models\Downloads;
use vendor\autoload;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;



class fileDownloadController extends Controller
{
    public function fileDownload(Request $request){
        $request->validate([
            'filename'=>'required',
        'topic'=>'required']);

        $file = $request['filename'];
        $topic = $request['topic'];

        $sec = Downloadlimit::select('downloadsec')
        ->orderBy('id', 'DESC')->first()->downloadsec;

        return view('process',['filename'=>$file,'sec'=>$sec,'topic'=>$topic]);
    }

    public function finalDownload(Request $request){
        $request->validate([ 'fileName' => 'required', 'topic'=>'required','emailbox'=>'required|email' ]);
        $fileName = $request['fileName'];
        $topic = $request['topic'];
        $email = $request['emailbox'];

         // validate emailid 
         $validator = new EmailValidator();
         $multipleValidations = new MultipleValidationWithAnd([
             new RFCValidation(),
         new DNSCheckValidation()
     ]);
         //ietf.org has MX records signaling a server with email capabilities
     $res = $validator->isValid("$email", $multipleValidations); //true
     
     if(session()->get('userDownloadMail')){

        // saving download file reocrd into database.
        $download = new Downloads;
        $download->name = $topic;
        $download->email = $email;
        $download->date = date("Y/m/d");
        date_default_timezone_set("Asia/Kolkata");
        $download->time = date("h:i:sa");
        $download->loc = $_SERVER['REMOTE_ADDR'];
        $download->save();

        return view('finalDownload',['file'=>$fileName,'topic'=>$topic]);

     }else{

        if($res){

            // saving download file reocrd into database.
            $download = new Downloads;
            $download->name = $topic;
            $download->email = $email;
            $download->date = date("Y/m/d");
            date_default_timezone_set("Asia/Kolkata");
            $download->time = date("h:i:sa");
            $download->loc = $_SERVER['REMOTE_ADDR'];
            $download->save();
    
            // Via the global "session" helper...
            session(['userDownloadMail' => $email]);
    
    
            return view('finalDownload',['file'=>$fileName,'topic'=>$topic]);
    
         }
         else{
            return "<font style='color:red;font-size:30px;'>
            Please go-back and provide valid email address!!
            </font>
            <br><br><br><br>
            ";
         }

     }


    }

}
