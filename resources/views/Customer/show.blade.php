
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse --> 
    <!-- Page Content -->
    </nav>
</div>


<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Customer Details</h1>

   <table class="table table-striped">
        <tbody>

         <tr><td align="center">
               <a href=#> <img src="{{asset('images/'.$img)}}" height="20%" width="20%"></a>
         </td></tr>

        <tr><td>
  <b>
  Customer ID: {{strtoupper($genid)}}
  </b>
  </td></tr>
  <tr>
  <td>
   Customer Name: {{$custdetails->name}}

        </td></tr>
        <tr><td>
    {{$custdetails->relation}}'s Name:{{$custdetails->gardian}}
    </td></tr>
    
    <tr><td>
    Gender:{{$custdetails->gender}}
    </td></tr>

    <tr><td>
     Marital Status:{{$custdetails->marital_status}}
   </td></tr>
   
   
     

    
    <tr><td>
   Pan No:{{$custdetails->pan_no}}
    </td></tr>
   <tr><td>
   Aadhar No:{{$custdetails->aadhar_no}}
    </td></tr>

   <tr><td>
    Identity Proof Submitted:{{$custdetails->idproof}}
    </td></tr>
    <tr><td>
    Born On:{{$custdetails->dob}}
    </td></tr>

    <tr><td>
    Address:{{$custdetails->address}},
    {{$custdetails->city}},
      {{$custdetails->country}}
    {{$custdetails->pin}},
    {{$custdetails->state}}.
      </td></tr>
      <tr><td>
    Group_id:{{$custdetails->group_id}}.
    </td></tr>
    <tr><td>
    Contact No:{{$custdetails->phone_no}}
    </td></tr>
    <tr><td>
    Proof of Address:{{$custdetails->addressproof}}
    </td></tr>
    <tr><td>
    Annual Salary:{{$custdetails->salary}}
    </td></tr>

    <tr><td>
    Occupation:{{$custdetails->occupation}}
    </td></tr>
    <tr><td>
    Joined At:{{date('jS M, Y', strtotime($custdetails->created_at))}}
    </td></tr>
   <tr><td>
    Registered By:{{$custdetails->registered_by}}
    </td></tr>

            </tbody>
    </table>
<tr><td >
    <a href="{{url('home')}}" class="btn btn-primary">Home Page</a>

      @if($custdetails->loan_alloted)
    <a href=# class="btn btn-primary">Premium Status</a>
      @endif

       
</td></tr>
  </div>
</div>


</body>
</html>
