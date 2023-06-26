@extends('adminlte::page')
@section('title', 'Tambah')
@section('content_header')<h1 class="m-0 text-dark">Tambah</h1>
@stop
@section('content')
<form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control 
@error('judul') is-invalid @enderror" id="judul" placeholder="Masukan Judul" name="judul" value="{{old('judul')}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" class="form-control 
@error('isi') is-invalid @enderror" id="isi" placeholder="Tulis Blog" name="isi"
                            value="{{old('isi')}}">
                        @error('isi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="tglpost">Tanggal Post</label>
                        <input type="date" class="form-control 
@error('tglpost') is-invalid @enderror" id="tglpost" placeholder="Masukan Tanggal" name="tglpost"
                            value="{{old('tglpost')}}">
                        @error('tglpost') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <img  class="img-thumbnail d-block border-0" name="tampil" width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('foto') is-invalid @enderror" id="foto" placeholder="Masukan foto Anda" name="foto" value="{{old('foto')}}">
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