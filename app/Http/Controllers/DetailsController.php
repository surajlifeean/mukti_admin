<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;



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


        if($request->idproof=='others')

            $identitydetail->idproof = $request->otheridproof;

        else
            $identitydetail->idproof = $request->idproof;


        $identitydetail->dob = $request->bday;

        $identitydetail->save();

          $gid = session('groupid');
                

        $addressdetail =new addressdetail;

          $addressdetail->address =$request->address;

          $addressdetail->city =$request->city;

          $addressdetail->pin =$request->pin;

          $addressdetail->state =$request->state;   

          $addressdetail->country =$request->country;

          $addressdetail->phone_no =$request->contact;

          $addressdetail->addressproof =$request->addproof;   

          $addressdetail->customer_id =$identitydetail->id;

          $addressdetail->save();




        $otherdetail =new otherdetail;

         $otherdetail->salary=$request->income;

         if(strcmp($request->occupation,'others')==0)
            $otherdetail->occupation=$request->otheroccupation;

         else
              $otherdetail->occupation=$request->occupation;
          
            

          $otherdetail->registered_by=Auth::user()->name;

          $otherdetail->customer_id=$identitydetail->id;

          $otherdetail->group_id=$gid;



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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
