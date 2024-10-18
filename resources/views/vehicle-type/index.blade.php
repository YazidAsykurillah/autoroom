@extends('adminlte::page')

@section('title', 'Tipe Kendaraan')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tipe Kendaraan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                
                <li class="breadcrumb-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">Tipe Kendaraan</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Tipe Kendaraan</h3>
            <div class="card-tools">
                
                <button type="button" id="btn-create" class="btn btn-default btn-sm" title="Create new Vehicle Type">
                    Buat Baru
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%;text-align: center;">#</th>
                        <th style="width: 20%;">Name</th>
                        <th>Description</th>
                        <th style="width:10%; text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="card-footer">
            <div id="data-table-button-tools" class=""></div>
        </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" data-backdrop="static" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="form-create" action="{{ url('/vehicle-type') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Buat Tipe Kendaraan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Nama tipe kendaraaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--ENDModal Create-->


    <!--Modal Update-->
    <div class="modal fade" data-backdrop="static" id="modal-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="form-update" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Tipe Kendaraan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Nama tipe kendaraan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--ENDModal Update-->

    <!--Modal Delete-->
    <div class="modal fade" data-backdrop="static" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" id="form-delete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" disabled></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--ENDModal Delete-->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){

    var vehicleTypeDT = $('#table').DataTable({
        processing: true,
        serverSide: true,
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        ajax: "{{ url('vehicle-type/datatables') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className:'text-center', searchable:false, orderable:false},
            {data: 'name', name: 'name', render:function(data, type, row, meta){
                let code_template='';
                    code_template+='<a href="/vehicle-type/'+row.id+'">';
                    code_template+= data;
                    code_template+='</a>';
                return code_template;
            }},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center', render:function(data, type, row, meta){
                let action ='';
                    action+='<button class="btn btn-default btn-xs btn-edit" title="Edit">';
                    action+=    '<i class="fas fa-edit"></i>';
                    action+='</button>&nbsp';
                    action+='<button class="btn btn-default btn-xs btn-delete" title="Delete">';
                    action+=    '<i class="fas fa-trash"></i>';
                    action+='</button>';
                return action;
            }},
        ],
        order: [
            [ 1, "asc" ],
        ],
    });

    //Block Edit
    vehicleTypeDT.on('click', '.btn-edit', function (e) {
        let data = vehicleTypeDT.row(e.target.closest('tr')).data();
        console.log(data);
        
        $('#form-update')[0].reset();
        $('#form-update').attr('action', '/vehicle-type/'+data.id);
        $('#form-update [name=name]').val(data.name);
        $('#form-update [name=description]').val(data.description);
        $('#modal-update').modal('show');
        //alert(data[0] + "'s salary is: " + data[5]);
    });
    //ENDBlock Edit

    //Block Delete
    vehicleTypeDT.on('click', '.btn-delete', function (e) {
        let data = vehicleTypeDT.row(e.target.closest('tr')).data();
        console.log(data);
        
        $('#form-delete')[0].reset();
        $('#form-delete').attr('action', '/vehicle-type/'+data.id);
        $('#form-delete [name=name]').val(data.name);
        $('#form-delete [name=description]').val(data.description);
        $('#modal-delete').modal('show');
        //alert(data[0] + "'s salary is: " + data[5]);
    });
    //ENDBlock Delete

    //Block data table button tools object
    var dataTableButtonTools = new $.fn.dataTable.Buttons(vehicleTypeDT,{
        buttons: [
            {
                extend: 'excelHtml5',
                text:'Export Excel',
                className: 'fa fa-file-excel',
                exportOptions:{
                    columns:[1,2,3],
                    format:{
                        body: function(data, row, column, node){
                            data = $('<p>' + data + '</p>').text();
                            return $.isNumeric(data.replace(',', '.')) ? data.replace(',', '.') : data;
                        }
                    }
                },
                
            },
        ],
    }).container().appendTo($('#data-table-button-tools'));
    //ENDBlock data table button tools object

    //Block Create
    $('#btn-create').on('click', function(event) {
        event.preventDefault();
        $('#modal-create').modal('show');
    });
    //ENDBlock Create

    //Block Submit Vehicle Type
    $('#form-create').on('submit', function(event) {
        event.preventDefault();
        let url = $(this).attr('action');
        let formData = new FormData(this);
        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#form-create').find("button[type='submit']").prop('disabled', true);
            },
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    $('#form-create')[0].reset();
                    $('#modal-create').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: data.message
                    });
                    vehicleTypeDT.ajax.reload();
                    $('#form-create').find("button[type='submit']").prop('disabled', false);
                } else {
                    $('#form-create').find("button[type='submit']").prop('disabled', false);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errors = jqXHR.responseJSON;
                console.log(errors);
                let error_template = "";
                $.each(errors.errors, function(key, value) {
                    console.log(value);
                    error_template += '<p>' + value + '</p>'; //showing only the first error.
                });
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    position: 'bottomRight',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-circle',
                    title: 'Error',
                    subtitle: 'Error occured',
                    body: error_template
                });
                $('#form-create').find("button[type='submit']").prop('disabled', false);
            }
        });
    });
    //ENDBlock Submit Vehicle Type

    //Block Update Vehicle Type
    $('#form-update').on('submit', function(event) {
        event.preventDefault();
        let url = $(this).attr('action');
        let formData = new FormData(this);
        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#form-update').find("button[type='submit']").prop('disabled', true);
            },
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    $('#form-update')[0].reset();
                    $('#modal-update').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: data.message
                    });
                    vehicleTypeDT.ajax.reload();
                    $('#form-update').find("button[type='submit']").prop('disabled', false);
                } else {
                    $('#form-update').find("button[type='submit']").prop('disabled', false);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errors = jqXHR.responseJSON;
                console.log(errors);
                let error_template = "";
                $.each(errors.errors, function(key, value) {
                    console.log(value);
                    error_template += '<p>' + value + '</p>'; //showing only the first error.
                });
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    position: 'bottomRight',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-circle',
                    title: 'Error',
                    subtitle: 'Error occured',
                    body: error_template
                });
                $('#form-update').find("button[type='submit']").prop('disabled', false);
            }
        });
    });
    //ENDBlock Update Vehicle Type

    //Block Delete Vehicle Type
    $('#form-delete').on('submit', function(event) {
        event.preventDefault();
        let url = $(this).attr('action');
        let formData = new FormData(this);
        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#form-delete').find("button[type='submit']").prop('disabled', true);
            },
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    $('#form-delete')[0].reset();
                    $('#modal-delete').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: data.message
                    });
                    vehicleTypeDT.ajax.reload();
                    $('#form-delete').find("button[type='submit']").prop('disabled', false);
                } else {
                    $('#form-delete').find("button[type='submit']").prop('disabled', false);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                let errors = jqXHR.responseJSON;
                console.log(errors);
                let error_template = "";
                $.each(errors.errors, function(key, value) {
                    console.log(value);
                    error_template += '<p>' + value + '</p>'; //showing only the first error.
                });
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    position: 'bottomRight',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-circle',
                    title: 'Error',
                    subtitle: 'Error occured',
                    body: error_template
                });
                $('#form-delete').find("button[type='submit']").prop('disabled', false);
            }
        });
    });
    //ENDBlock Delete Vehicle Type

});
</script>
@stop
