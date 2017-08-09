<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $members=identitydetail::select('identitydetails.id','name','phone_no','loan_alloted')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('group_id','=',0)
        ->where('loan_alloted','=',0)
        ->get();


         return view('group.create')->withMembers($members);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            $groupmembers=$request->groupmembers;

            $otherdetails=otherdetail::select('group_id')
                        ->orderby('group_id','desc')
                        ->first();
            $gid=$otherdetails->group_id;




        foreach($groupmembers as $member) {
            
            $otherdetails=otherdetail::where('customer_id','=',$member)
              ->first();
            $otherdetails->group_id=$gid+1;

            $otherdetails->save();

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
