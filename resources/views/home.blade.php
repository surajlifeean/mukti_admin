@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">MUKTI</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->

            <div class="row">
  <div class="col-sm-4">
        <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-tags"></i>
                </div>
                <div class="text">
                    <var>73</var>
                    <label class="text-muted">total orders</label>
                </div>
                <div class="options">
                    <a href="javascript:;" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-search"></i> View orders</a>
                </div>
            </div>
  </div>
  <div class="col-sm-4">
    <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="text">
                    <var>3</var>
                    <label class="text-muted">invited guests</label>
                </div>
                <div class="options">
                    <a href="javascript:;" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Add a guest</a>
                </div>
            </div>      
</div>
  <div class="col-sm-4">
    
    <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-star"></i>
                </div>
                <div class="text">
                    <var>614</var>
                    <label class="text-muted">page likes</label>
                </div>
                <div class="options">
                    <a href="javascript:;" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-search"></i> View traffic</a>
                </div>
            </div>
  </div>
</div>
        </div>
    </div>

</div>


@endsection
