<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class searchSuggestion extends Controller
{
    public function search(Request $request){
        if($request['query'])
            {
                $query = $request['query'];
                $data = DB::table('files')
                    ->where('topic', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;background-color:white;margin-left:auto;margin-right:auto;">';
                foreach($data as $row)
                {
                    $output .= '
                    <li><a class="dropdown-item" style="color:black;">'.$row->topic.'</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            }
       }
}
