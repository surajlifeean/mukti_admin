<?php

namespace App\Http\Controllers;

use App\rate;

use Illuminate\Http\Request;

use Excel;


class DownloadcsvController extends Controller
{
    //
     public function download(Request $request){
     
     	$data=rate::get()->toArray();
     //	dd($data);
     	Excel::create('rate_chart',function($excel) use($data){
     		 $excel->sheet('Sheetname', function($sheet) use($data) {

     		$sheet->fromArray($data);

     	});
   })->download('xls');

}
}
