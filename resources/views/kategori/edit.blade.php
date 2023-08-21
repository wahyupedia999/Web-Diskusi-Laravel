@extends('layout.master')

@section('judul')

Edit Kategori

@endsection

@section('content')

<div class="card mb-4">
    <div class="card-body">
        <form action="/kategori/{{ $editKategori->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label>Nama Kategori</label><br><br>
              <input type="text" name="nama" class="form-control" value="{{ $editKategori->name }}">
            </div>
            @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <a class="btn btn-danger" href="/kategori">Kembali</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </form>
    </div>
  </div>
  
@endsection