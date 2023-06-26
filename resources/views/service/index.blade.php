@extends('adminlte::page')
@section('title', 'Service')
@section('content_header')
<h1 class="m-0 text-dark">Service</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('service.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Service</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($service as $key => $service)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$service->nama_service}}</td>
                            <td>{{$service->deskripsi}}</td>
                            <td><img src="storage/{{$service->foto}}" alt="{{$service->foto}} tidak tampil"
                                    class="img-thumbnail" style="width: 80px"></td>
                            <td>
                                <a href="{{route('service.edit',
$service)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('service.destroy',
$service)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush