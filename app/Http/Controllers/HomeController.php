<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;

use App\otherdetail;

use DB;

use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $currentdate=Carbon::now();

        $count=DB::table('identitydetails')->count();

        $premiumdue=DB::table('identitydetails')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('nextpremiumdate','<',$currentdate)
        ->where('status','=','active')
        ->count();
        $count=DB::table('identitydetails')->count();


        $groups=DB::table('otherdetails')->max('group_id');

        return view('home')->withCount($count)->withDue($premiumdue)->withGroups($groups);
    }
}
