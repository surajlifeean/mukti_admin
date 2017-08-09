<?php

namespace App\Http\Controllers;

use App\rate;

use Illuminate\Http\Request;

use Excel;


use App\identitydetail;

use App\addressdetail;

use App\otherdetail;


class DownloadcsvController extends Controller
{
    //
     public function download(Request $request){
     
     	//$data=rate::get()->toArray();
        $data=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at','address', 'city','pin','country', 'state', 'group_id', 'phone_no','loan_alloted','addressproof', 'salary', 'occupation')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->get()->toArray();
    
       // ,group_id,,address,pin,city,phone_no,occupation,salary,aadhar_no,pan_no,
     //	dd($data);
     	Excel::create('customer_details',function($excel) use($data){
     		 $excel->sheet('Sheetname', function($sheet) use($data) {

     		$sheet->fromArray($data);

     	});
   })->download('xls');

}

public function showdownloadpage(){

	return view('customer.downloadreport');
}
}