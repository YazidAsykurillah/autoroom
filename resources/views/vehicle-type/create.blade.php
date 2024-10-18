@extends('adminlte::page')

@section('title', 'Create Vehicle Type')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Create Vehicle Type</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                
                <li class="breadcrumb-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/vehicle-type">
                        Vehicle Type
                    </a>
                </li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="card">
        <form class="" id="form-create" action="{{ url('/vehicle-type')}}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Form Create Vehicle Types</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!--General Information-->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">General Information</h3>
                                <div class="card-tools"></div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="code" placeholder="Code of the vehicle-type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Name of the vehicle-type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" placeholder="Email of the vehicle-type">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--EndGeneral Information-->
                    <!--Role Options-->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">Roles</div>
                            <div class="card-body">
                                <div class="form-group">
                                
                              </div>
                            </div>
                        </div>
                    </div>
                    <!--END Role Options-->
                </div>
            </div>
            <div class="card-footer">
                <a href="/vehicle-type" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    //Block store vehicle-type event
    $('#form-create').on('submit', function(event){
        event.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            type: 'post',
            url: url,
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function(){
                $('#form-create').find("button[type='submit']").prop('disabled', true);
            },
            success: function(data){
                console.log(data);
                if(data.status == true){
                    $('#form-create')[0].reset();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: data.message
                    });
                    $('#form-create').find("button[type='submit']").prop('disabled', false);
                    window.location.href = data.data.url;
                }else{
                    $('#form-create').find("button[type='submit']").prop('disabled', false);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                let errors = jqXHR.responseJSON;
                console.log(errors);
                let error_template = "";
                //console.log(textStatus);
                $.each( errors.errors, function( key, value ){
                    console.log(value);
                    error_template += '<p>'+value+ '</p>'; //showing only the first error.
                });
                console.log(error_template);
                $(document).Toasts('create',{
                    class: 'bg-danger',
                    position: 'bottomRight',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-circle',
                    title: 'Error',
                    subtitle: ' Validation error',
                    body: error_template
                });
                $('#form-create').find("button[type='submit']").prop('disabled', false);
            }
        });
    });
    //ENDBlock store vehicle-type event
});
</script>
@stop
