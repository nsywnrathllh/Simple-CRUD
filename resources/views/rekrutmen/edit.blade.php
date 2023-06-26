@extends('adminlte::page')
@section('title', 'Edit')
@section('content_header')<h1 class="m-0 text-dark">Edit</h1>
@stop
@section('content')
<form action="{{route('rekrutmen.update',$rekrutmen )}}" method="post">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="variasi">Variasi</label>
                        <input type="text" class="form-control 
@error('variasi') is-invalid @enderror" id="variasi" placeholder="Variasi"
                            name="variasi" value="{{$rekrutmen->variasi ?? old('variasi')}}">
                        @error('variasi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control 
@error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi"
                            name="deskripsi" value="{{$rekrutmen->deskripsi ?? old('deskripsi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="responsibilities">Responsibilities</label>
                        <input type="text" class="form-control 
@error('responsibilities') is-invalid @enderror" id="responsibilities" placeholder="Responsibilities"
                            name="responsibilities" value="{{$rekrutmen->responsibilities ?? old('responsibilities')}}">
                        @error('responsibilities') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="persyaratan">Persyaratan</label>
                        <input type="text" class="form-control 
@error('persyaratan') is-invalid @enderror" id="persyaratan" placeholder="Persyaratan"
                            name="persyaratan" value="{{$rekrutmen->persyaratan ?? old('persyaratan')}}">
                        @error('persyaratan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('rekrutmen.index')}}" class="btn btn-danger">
                        Batal
                    </a></div>
            </div>
        </div>
    </div>
@stop