



@extends('layouts.app')





@section('content')

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
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Manage Customer<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Bulk Upload</a>
                            </li>
                            <li>
                                <a href="#">Delete Customer <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Collapse Group</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>

        
    </nav>


 <div class="container">
<div class="row">
  <div class="col-md-3 col-md-offset-2">
    {{Form::open(['route'=>['customerdetails.store'],'method'=>'POST'])}}

     {{Form::label('searchby','Search By')}}

    <select class="form-control searchby" name="searchby">
    
     
          <option value="name">Name</option>
          
          <option value="city">Place</option>


          <option value="city">Customer ID</option>
        
    </select>
  </div>

  <div class="col-md-3">  
<b>
      <p>Search Data</p>  </b>
      {{Form::text('name',null,['class'=>'form-control'])}}

  </div>

  <div class="col-md-2">
      {{Form::submit('search',['class'=>'btn btn-primary','style'=>'margin-top:25px'])}}

    {{Form::close()}}
    </div>
<div class="col-md-1">
    <button type="button" class="btn btn-default" aria-label="Left Align">Add New
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button>
</div>
 </div>



<table class="table table-striped">
   		   		   		 
  @foreach($matchinglist as $list)
     <tr><td>
    <div class="row">
       <div class="col-md-8 col-md-offset-2" >
         <div class="list">
           <h3>{{ucwords($list->name)}}  </h3>
             <p>
    Resident of:{{$list->address}},
   	{{$list->city}},
   	{{$list->pin}},
   	{{$list->state}},
   	{{$list->country}}.<br>
   	Contact No:{{$list->phone_no}}<br>


    @if($list->group_id)
     <b>SHG:{{$list->group_id}}</b>
    @endif
    
	Joined At:{{date('jS M, Y', strtotime($list->created_at))}}
   
              <a class="btn" href="{{route('customerdetails.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-list-alt"></span></a>
              
              
              <a class="btn" href="{{route('customerdetails.edit',$list->id)}}" role="button"><span class=" glyphicon glyphicon-pencil"></span></a>

              
              @if($list->status=="active")
              <a class="btn" href="{{route('unregcust.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
              @endif

              @if($list->loan_alloted==1)
              <a class="btn" href="{{route('customerdetails.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-stats"></span></a>
              @endif
              </p>

              
              <hr>
         </div>
       </div>

    </div>
       		</td></tr>
       @endforeach

       
  </table>

  </div>
</div>

@endsection



