<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use App\document;

use App\loan_allotment;

use Image;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

           $customerdetails=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at', 'identitydetails.updated_at', 'address', 'city','pin','group_id',
         'state', 'country', 'phone_no',
         'addressproof', 'salary', 'occupation','registered_by','loan_alloted')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->orderBy('id', 'desc')
        ->get();

        return view('Customer.index')->withMatchinglist($customerdetails);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //

       // dd($request);

        $identitydetail =new identitydetail;
        
        $identitydetail->name =$request->name;

        $identitydetail->gardian = $request->spouseorfather;

        $identitydetail->relation=$request->relation;

        $identitydetail->gender = $request->gender;

        $identitydetail->marital_status =$request->maritalstatus;

        $identitydetail->pan_no = $request->pan;

        $identitydetail->aadhar_no = $request->aadhar;

        $identitydetail->created_at=$request->created_at;

        $identitydetail->updated_at=$request->created_at;
        

        if($request->idproof=='others')

            $identitydetail->idproof = $request->otheridproof;

        else
            $identitydetail->idproof = $request->idproof;


        $identitydetail->dob = $request->bday;

        $identitydetail->save();


        $addressdetail =new addressdetail;

          $addressdetail->address =$request->address;

          $addressdetail->city =$request->city;

          $addressdetail->pin =$request->pin;

          $addressdetail->state =$request->state;   

          $addressdetail->country =$request->country;

          $addressdetail->phone_no =$request->contact;

          $addressdetail->addressproof =$request->addproof;   

          $addressdetail->customer_id =$identitydetail->id;

          $addressdetail->created_at=$request->created_at;
        
          $addressdetail->updated_at=$request->created_at;
        

          $addressdetail->save();




        $otherdetail =new otherdetail;

         $otherdetail->salary=$request->income;

         if(strcmp($request->occupation,'others')==0)
            $otherdetail->occupation=$request->otheroccupation;

         else
              $otherdetail->occupation=$request->occupation;
          
            

        //  $otherdetail->registered_by=Auth::user()->name;

          $otherdetail->registered_by='admin';

          $otherdetail->customer_id=$identitydetail->id;

          $otherdetail->group_id=0;

          $otherdetail->created_at=$request->created_at;
        
          $otherdetail->updated_at=$request->created_at;
        

          $otherdetail->save();


          $img=new document;
        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename=time().'.'.$image->getClientOriginalExtension();//part of image intervention library
            $location=public_path('/images/'.$filename);
            
            // use $location='images/'.$filename; on a server
            Image::make($image)->resize(1000,1000)->save($location);
            $img->image=$filename;

            $img->customer_id=$identitydetail->id;

            $img->description="photo";            

            $img->save();
        }

        
          $img=new document;
        if($request->hasFile('featured_image2')){
            $image2=$request->file('featured_image2');
            $filename=time().'.'.$image2->getClientOriginalExtension();//part of image intervention library
            $location=public_path('/images/'.$filename);
            
            // use $location='images/'.$filename; on a server
            Image::make($image2)->resize(1000,1000)->save($location);

            $img->image=$filename;

            $img->customer_id=$identitydetail->id;

            $img->description="aadhar";            

            $img->save();

        }

     $img=new document;
        if($request->hasFile('featured_image3')){
            $image3=$request->file('featured_image3');
            $filename=time().'.'.$image3->getClientOriginalExtension();//part of image intervention library
            $location=public_path('/images/'.$filename);
            
            // use $location='images/'.$filename; on a server
            Image::make($image3)->resize(1000,1000)->save($location);

            $img->image=$filename;

            $img->customer_id=$identitydetail->id;

            $img->description="voterorpan";            

            $img->save();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
          $loan_allotments=loan_allotment::find($id);
            if(count($loan_allotments)){
    $customerdetails=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at', 'identitydetails.updated_at', 'address', 'city','pin','country',
         'state', 'group_id', 'phone_no','loan_alloted','status',
         'addressproof', 'salary', 'occupation','registered_by')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('identitydetails.id','=',$id)
        ->first();
        }
        else{
          $customerdetails=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at', 'identitydetails.updated_at', 'address', 'city','pin',
         'state', 'group_id', 'phone_no','loan_alloted',
         'addressproof', 'salary', 'occupation','registered_by')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('identitydetails.id','=',$id)
        ->first();   
        }


    
        $imag=document::where('documents.customer_id','=',$customerdetails->id)->first();

         if(count($imag))
            $img=$imag->image;
         else
            $img="default-user.png";




        $name=explode(" ",$customerdetails->name);
        //echo $name[1];
        $f=substr($name[0],0,1); 
        $l=substr($name[1],0,1); 
        
        $adhno=substr($customerdetails->aadhar_no,8,4);
        
        $adhno=$adhno*10000+$customerdetails->id;

        $custid=$f.$l.$adhno;

        
        
   return view('Customer.show')->withCustdetails($customerdetails)->withImg($img)->withGenid($custid);

    

    }

    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
