@extends('adminlte::page')
@section('title', 'Blog')
@section('content_header')
    <h1 class="m-0 text-dark">Blog</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('blog.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal Post</th>
                            <th>Foto</th>
                            <th>opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog as $key => $blog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$blog->judul}}</td>
                                <td>{{$blog->isi}}</td>
                                <td>{{$blog->tglpost}}</td>
                                <td><img src="storage/{{$blog->foto}}"
                                    alt="{{$blog->foto}} tidak tampil" class="img-thumbnail" style="width: 100px"></td>
                                <td>
                                    <a href="{{route('blog.edit',
$blog)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
<a href="{{route('blog.destroy',
$blog)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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

