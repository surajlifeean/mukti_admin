<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\rate;

use App\identitydetail;


use App\addressdetail;

class customers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('customer.bulkupload');
    }

    /**
     * Show the form for creating a new resource.
     *
  //   * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('customer.register');
    }

    /**
     * Store a newly created resource in storage.
     *
  //   * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request);
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();

        $file=fopen($filePath,'r');

        $header=fgetcsv($file);  // header will be used to construct the array.. 
        // but we want the values in the format array[header]=value..



        $escapedHeader=[]; // validating header
        foreach ($header as $key => $value) {
            $lheader=strtolower($value); 
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader); //eleminate all characters except lower case a-z 
            array_push($escapedHeader, $escapedItem);
        
        }
        //looping each column to get the data
           while ($columns=fgetcsv($file)) {
            # code...
            if($columns[0]=="")
            {
                continue;
            }

         foreach ($columns as $key => &$value) {
                # code...
              //  $value=preg_replace('/\D/', 'change', $value);

     
               // dd($value);
            $data=array_combine($escapedHeader,$columns);
       }



             foreach ($data as $key => &$value) {
            
             

            
                $name=$data['nameoftheapplicant'];
                $created_at=$data['registrationdate'];
                $gender=$data['gender'];
                $marital_status=$data['maritalstatus'];
                $dob=$data['dob'];
                $gardian=$data['fathershusbandsname'];
                $relation=$data['relationship'];
                $idproof=$data['idno'];
                $aadhar_no=$data['aadharno'];
                $pan_no=$data['pancard'];


                
                $address=$data['residentialaddress'];
                $pin=$data['pin'];
                $data['landmark'];
                $phone_no=$data['contactdetails'];
                
                //print_r($data);
                }

                
              $identitydetail=new identitydetail;

                
              $identitydetail->name=strtolower($name);
              $identitydetail->gardian=strtolower($gardian);
              $identitydetail->relation=strtolower($relation);
              $identitydetail->gender=strtolower($gender);
              $identitydetail->marital_status=strtolower($marital_status);
              $identitydetail->pan_no=$pan_no;
              $identitydetail->aadhar_no=$aadhar_no;
              $identitydetail->idproof=$idproof;
              $identitydetail->dob=date('Y-m-d', strtotime($dob));
              $identitydetail->created_at=date('Y-m-d', strtotime($created_at));  

              $identitydetail->updated_at=date('Y-m-d', strtotime($created_at));  

              $identitydetail->save();



$add=explode(',',$address);
//print_r($add);

foreach($add as $key=>$value){

}
$district=$add[$key];
$city=$add[$key-1];

$output = array_slice($add, 0, $key-1); 
$output=implode(',', $output);

              $addressdetail=new addressdetail;

              $addressdetail->address=$output;
              $addressdetail->city=$city;
              $addressdetail->pin=$pin;
              $addressdetail->state="West Bengal";
              $addressdetail->country=$district;
              $addressdetail->phone_no=$phone_no;
              $addressdetail->addressproof="Aadhar Card";
              $addressdetail->customer_id=$identitydetail->id;

            $addressdetail->created_at=$identitydetail->created_at;
              
            $addressdetail->updated_at=$identitydetail->updated_at;

            $addressdetail->save();

              }

    }

    /**
     * Display the specified resource.
     *
     // @param  int  $id
     //@return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     // @param  int  $id
     // @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     // @param  \Illuminate\Http\Request  $request
     //@param  int  $id
     //@return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     // @param  int  $id
     // @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
