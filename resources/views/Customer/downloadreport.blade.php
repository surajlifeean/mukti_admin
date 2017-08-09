@extends('layouts.app')

@section('content')
<div id="page-wrapper">
        <div class="container-fluid">

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">REPORT DOWNLOAD</h1>
                </div>


 </div>

			 <div class="row">
			<a href="{{url('/download')}}" class="btn btn-default btn-lg">
					  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Download Customer Details
			</a>
			 
			 </div>

</div>
</div>
@endsection
