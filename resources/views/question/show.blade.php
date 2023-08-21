@extends('layout.master')
@section('judul')
Data Pertanyaan
@endsection
@section('content')
  <div class="card ">
      <div class="card-body">
        <a href="/kategori/tambah" class="btn btn-primary my-1">Tambah</a>
        <table class="table table-hover text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>lorem ipsum</td>
                    <td>pemograman</td>
                    <td>
                        <a href="/pertanyaan/detail" class="btn btn-info">Lihat</a>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger ">Hapus</a>
                    </td>
                  </tr>
            </tbody>
          </table>
      </div>
  </div>
  @endsection  