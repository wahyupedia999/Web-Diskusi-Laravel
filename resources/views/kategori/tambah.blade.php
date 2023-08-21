@extends('layout.master')

@section('judul')

Tambah Kategori

@endsection

@section('content')

<div class="card mb-4">
    <div class="card-body">
        <form action="/kategori" method="POST">
            @csrf
            <div class="form-group">
              <label>Nama Kategori</label><br><br>
              <input type="text" name="nama" class="form-control">
            </div>
            @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
    </div>
  </div>
  
@endsection