@extends('adminlte::page')
@section('title', 'Edit Service')
@section('content_header')<h1 class="m-0 text-dark">Edit Service</h1>
@stop
@section('content')
<form action="{{route('service.update', $service)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_service">Nama Service</label>
                        <input type="text" class="form-control 
@error('nama_service') is-invalid @enderror" id="nama_service" placeholder="Nama Service" name="nama_service"
                            value="{{$service->nama_service ?? old('nama_service')}}">
                        @error('nama_service') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control 
@error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Tulis Deskripsi" name="deskripsi"
                            value="{{$service->deskripsi ?? old('deskripsi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="hidden" name="oldfoto" value="{{ $service->foto }}">
                        <img src="{{ asset('storage/' . $service->foto) }}" class="img-thumbnail d-block" name="tampil"
                            width="15%" id="tampil">
                        <input type="file" class="form-control 
@error('foto') is-invalid @enderror" id="foto" placeholder="Masukan Foto" name="foto" value="{{$service->foto ?? old('foto')}}">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
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