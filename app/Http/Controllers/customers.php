<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\rate;

class customers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('customer.bulkupload');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request);
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();

        $file=fopen($filePath,'r');

        $header=fgetcsv($file);        


        $escapedHeader=[];
        foreach ($header as $key => $value) {
            
            $escapedItem=preg_replace('/[^a-z]/', '', $value);
            array_push($escapedHeader, $escapedItem);
        
        }
        
        while ($columns=fgetcsv($file)) {
            # code...
            if($columns[0]=="")
            {
                continue;
            }

            foreach ($columns as $key => &$value) {
                # code...
                $value=preg_replace('/\D/', 'change', $value);

            }


               // dd($value);
            $data=array_combine($escapedHeader,$columns);


            foreach ($data as $key => &$value) {
                # code...
                $value=($key=="interestrate")?(float)$value:(integer)$value;

                $scheme=$data['scheme'];

                $principal=$data['principal'];

                $interestrate=$data['interestrate'];

                $noofinstallments=$data['noofinstallments'];

                $ewi=$data['ewi'];

                $processingfees=$data['processingfees'];

                $muktipadsqty=$data['muktipadsqty'];

            }

                $rate=new rate;
               
                

                $rate->principal=$principal;
                
                $rate->interestrate=$interestrate;
                
                $rate->noofinstallments=$noofinstallments;
                
                $rate->ewi=$ewi;

                $rate->processingfees=$processingfees;
                
                $rate->muktipadsqty=$muktipadsqty;

                $rate->save();
                
            

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
