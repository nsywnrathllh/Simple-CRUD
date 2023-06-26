@extends('adminlte::page')
@section('title', 'Tambah')
@section('content_header')<h1 class="m-0 text-dark">Tambah</h1>
@stop
@section('content')
<form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_service">Nama</label>
                        <input type="text" class="form-control 
@error('nama_service') is-invalid @enderror" id="nama_service" placeholder="Nama" name="nama_service" value="{{old('nama_service')}}">
                        @error('nama_service') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control 
@error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi"
                            value="{{old('deskripsi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <img  class="img-thumbnail d-block border-0" name="tampil" width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('foto') is-invalid @enderror" id="foto" placeholder="Foto" name="foto" value="{{old('foto')}}">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('service.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>
    @stop