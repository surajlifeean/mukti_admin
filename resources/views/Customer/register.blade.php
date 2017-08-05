@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-md-2">
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="http://www.janmukti.com"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>            </li>
        </ul>
        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                     <li>
                          <a href="#"><i class="fa fa-sitemap fa-fw"></i> Options<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('customers.index')}}">Bulk Upload</a>
                            </li>
                            <li>
                                <a href="{{route('customers.index')}}">Download Report</a>
                            </li>
                            <li>
                                <a href="{{route('customers.index')}}">View Customers</a>
                            </li>
                            <li>
                                <a href="{{route('customers.index')}}">Register Customers</a>
                            </li>

                           </ul>
                            <li>
                                <a href="#">Finance <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Daily Cash Book</a>
                                    </li>
                                    <li>
                                        <a href="#">Bank Deposit Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Dividend Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Revenue Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Expenses Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Capital Inflow Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Daily Cash Book</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">Groups<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">View Groups</a>
                                    </li>
                                </ul>
                            </li>

                        
                    </li>
                </ul>

            </div>
        </div>

    <!-- Page Content -->
    </nav>
</div>
</div>



<div class="col-md-9">
<div class="row container">
 <div class="col-md-8 col-md-offset-2">
   <h2>Register Customer</h2>

   <hr>
   <h3>Identity Details</h3>
{!! Form::open(['route' => 'customerdetails.store','data-parsley-validate'=>'','files'=>true]) !!}


                {{ Form::label('name','Name:')}}

                {!!Form::text('name',null,['class'=>'form-control','required'=>''])!!}


                {{ Form::label('spouseorfather',"Father's/Husband's Name:")}}

    {{ Form::text('spouseorfather',null,array('class'=>'form-control','required'=>''))}}

    <select class="form-control" name="relation">
    
     
          <option value="father">Father</option>
          
          <option value="husband">Husband</option>
            
    </select>


    {{Form::label('pan','Pan Card Number:')}}

    {{Form::text('pan',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('aadhar','Aadhar Card Number:')}}

    {{Form::text('aadhar',null,array('class'=>'form-control','required'=>''))}}

    {{Form::label('gender','Gender:')}}

    <select class="form-control" name="gender">
    
     
          <option value="male">Male</option>
          
          <option value="female">Female</option>
            
    </select>


    {{Form::label('maritalstatus','Marital Status:')}}

    <select class="form-control" name="maritalstatus">
    
     
          <option value="single">Single</option>
          
          <option value="married">Married</option>

          <option value="widow">Widow</option>

          <option value="divorced">Divorced</option>
            
    </select>

    {{Form::label('dob','Date of Birth:')}}

    

    <input class="form-control" type="date" name="bday">


    {{Form::label('idproof','Proof of Identity:')}}

    

    <select class="form-control idproof" name="idproof">
    
     
          <option value="pancard">Pan Card</option>
          
          <option value="aadharcard">Aadhar Card </option>

          <option value="passport">Passport</option>

          <option  value="others">Others</option>       
            
    </select>

    <p class="others"></p>
{{Form::label('created_at','Registration Date:')}}(mm/dd/yy)
{{Form::date('created_at', \Carbon\Carbon::now()),array('class'=>'form-control','required'=>'')}}

<h3>Address Details</h3>

    {{Form::label('address','Address:')}}

    {{Form::textarea('address',null,array('class'=>'form-control','style'=>'height:50px','required'=>''))}}


    {{Form::label('city','City/Town/Village:')}}

    {{Form::text('city',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('country','District:')}}

    {{Form::text('country',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('state','State:')}}

    {{Form::text('state',null,array('class'=>'form-control','required'=>''))}}



    {{Form::label('pin','Pin Code:')}}

    {{Form::text('pin',null,array('class'=>'form-control','required'=>''))}}
    
    {{Form::label('contact','Mobile No:')}}

    {{Form::text('contact',null,array('class'=>'form-control','required'=>''))}}

    {{Form::text('addproof',null,array('class'=>'form-control','required'=>'','placeholder'=>'Specify the Proof of address'))}}

    <h3>Other Details</h3>
    {{Form::label('income','Gross Annual Income:')}}  

    <select class="form-control" name="income">
    
     
          <option value="less than 1 lakhs">Below 1 lakhs</option>
          
          <option value="1-5 lakhs">1 to 5 lakhs</option>

          <option value="5-10 lakhs">5 to 10 lakhs</option>

          <option  value="10-25 lakhs">10 to 25 lakhs</option>

          <option value="over 25 lakhs">more than 25 lakhs</option>  

            
    </select>

    {{Form::label('occupation','Occupation:')}} 


    <select class="form-control occupation" name="occupation">
    
     
          <option value="private sector">Private Sector</option>
          
          <option value="Public Sector">Public Sector</option>

          <option value="Agriculture">Agriculture</option>


          <option value="Government Service">Government Service</option>
          
          <option value="Retired">Retired</option>

          <option value="Housewife">Housewife</option>


          <option value="Business">Business</option>

          
          <option value="Professional">Professional</option>
          
          <option value="Student">Student</option>

          <option value="Housewife">Housewife</option>


            <option  value="others">Others</option>       
            
    </select>

    <p class="otheroccupation"></p>
 
    

    {{Form::label('featured_image','Upload Image')}}

    {{Form::file('featured_image')}}

    {{Form::label('featured_image2','Upload Aadhar Image')}}

    {{Form::file('featured_image2')}}

    {{Form::label('featured_image3','Upload PAN Image/Voters ID Image')}}

    {{Form::file('featured_image3')}}

    {{ Form::submit('Save and Next',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}

    
{!! Form::close() !!}
</div>
</div>

</div>
</div>
@endsection
