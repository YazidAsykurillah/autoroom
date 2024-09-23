@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                
                <li class="breadcrumb-item active"><i class="fas fa-home"></i></li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
<h5 class="mb-2">Projects Info</h5>
<div class="row">

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Overdue Projects</span>
                <span class="info-box-number">4</span>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-clipboard"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Ongoing Projects</span>
                <span class="info-box-number">10</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-clipboard"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Completed Projects</span>
                <span class="info-box-number">200</span>
            </div>
        </div>
    </div>
    
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function(){

        //console.log(math.number("12.7"));

    });
</script>
@stop
