@extends('adminlte::page')

@section('title', 'Role :: '.$role->name.'')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Role Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="/home"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/role">Roles</a></li>
                <li class="breadcrumb-item active">{{ $role->id }}</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="row">
        <!--Role Information-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Role Information</h3>
                </div>
                <div class="card-body">
                    <strong>Code</strong>
                    <p class="text-muted">
                      {{ $role->code }}
                    </p>
                    
                    <strong>Name</strong>
                    <p class="text-muted">
                      {{ $role->name }}
                    </p>
                    
                </div>
            </div>
        </div>
        <!--END Role Information-->
    </div>
    <div class="row">
        <!--Permission Information-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permission List</h3>
                </div>
                <div class="card-body">
                    <table id="table-permissions" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%;text-align: center;">#</th>
                                <th style="width: 30%;">Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <div class="form-check">
                                       <input class="form-check-input permission-checkbox" type="checkbox" name="permission_name[]" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}}
                                    </div>
                                </td>
                                <td>{{ $permission->name}}</td>
                                <td>{{ $permission->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--ENdPermission Information-->
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">    
@stop

@section('js')
<script type="text/javascript">
    
    $(document).ready(function(){

        var _token = $('meta[name="csrf-token"]').attr('content');

        //instantiate datatable to permission table
        var permissionDT = $('#table-permissions').DataTable({
            processing: true,
            serverSide: false,
        });

        //control permission checkbox action
        $('.permission-checkbox').on('change', function(event){
            let role_id = '{{$role->id}}';
            let permission_name = $(this).val();
            if(this.checked){
                assignOrRevokePermissionFromRole('assign',role_id, permission_name);
            }
            else{
                assignOrRevokePermissionFromRole('revoke',role_id, permission_name);
            };
        });

        //assign or revoke permission from role functions
        function assignOrRevokePermissionFromRole(mode, role_id, permission_name){
            /*console.log(mode);
            console.log(role_id);
            console.log(permission_name);*/

            $.ajax({
                url: '/role/synchronize-permission',
                type: 'POST',
                data: {
                    '_token': _token,
                    'mode': mode,
                    'role_id': role_id,
                    'permission_name': permission_name
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                }
            });
        }
    });
</script>
@stop
