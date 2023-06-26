@extends('adminlte::page')
@section('title', 'Edit')
@section('content_header')<h1 class="m-0 text-dark">Edit</h1>
@stop
@section('content')
<form action="{{route('blog.update', $blog)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control 
@error('judul') is-invalid @enderror" id="judul" placeholder="Masukan Judul" name="judul"
                            value="{{$blog->judul ?? old('judul')}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" class="form-control 
@error('isi') is-invalid @enderror" id="isi" placeholder="Tulis Blog" name="isi"
                            value="{{$blog->isi ?? old('isi')}}">
                        @error('isi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="tglpost">Tanggal Post</label>
                        <input type="date" class="form-control 
@error('tglpost') is-invalid @enderror" id="tglpost" placeholder="Masukan Tanggal" name="tglpost" value="{{$blog->tglpost ?? old('tglpost')}}">
                        @error('tglpost') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="hidden" name="oldfoto" value="{{ $blog->foto }}">
                        <img src="{{ asset('storage/' . $blog->foto) }}" class="img-thumbnail d-block" name="tampil"
                            width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('foto') is-invalid @enderror" id="foto" placeholder="Masukan Foto" name="foto" value="{{$blog->foto ?? old('foto')}}">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('blog.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>
    @stop