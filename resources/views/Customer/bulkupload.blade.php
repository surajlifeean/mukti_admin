@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">UPLOAD DETAILS</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
{!! Form::open(['route' => 'customers.store','files'=>true]) !!}
    
    <div class="form-group">
        <lable for="upload-file">Upload</lable>
        <input type="file" name="upload-file" class="form-control">
    </div>
    <input class="btn btn-success" type="submit" value="Upload File" name="submit">

{!! Form::close() !!}

        </div>
    </div>



@endsection
