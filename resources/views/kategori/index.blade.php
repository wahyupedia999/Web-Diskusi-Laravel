@extends('layout.master')

@section('judul')

Data Kategori

@endsection

@section('content')

  <div class="card ">
      <div class="card-body">
        @auth
        <a href="/kategori/create" class="btn btn-primary my-1">
          <i class="menu-icon tf-icons bx bx-plus"></i>Tambah
        </a>
        @endauth
        <table class="table table-hover text-center">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                @auth
                <th scope="col" colspan="2">Action</th>
                @endauth
              </tr>
            </thead>
            <tbody>
              @forelse($dataKategori as $key => $data)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $data->name }}</td>
                  @auth
                  <td>
                    <a href="/kategori/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
                  </td>
                  <td>
                    <form action="/kategori/{{ $data->id }}" method="POST">
                      @csrf
                      @method('delete')
                      <input class="btn btn-danger" onclick="delete_confirm(event)" type="submit" value="Hapus">
                    </form>
                  </td>
                  @endauth
                </tr>
              @empty

              <td><h5>Tidak ada Data</h5></td>

              @endforelse
            </tbody>
          </table>
      </div>
  </div>

  @endsection