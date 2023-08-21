@extends('layout.master')

@section('judul')

Selamat Datang Di Forum

@endsection

@section('content')
  <!--intro -->
<div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-9">
          <div class="card-body">
            <h5 class="card-title text-primary text-bold">Sulit Mencari Solusi?</h5>
            <p class="mb-4">
             Tempat diskusi dan belajar bahasa programming, dari pemula hingga pakar, disini kamu boleh bertanya dan juga berbagi.
            </p>

            <a href="/questions/create" class="btn btn-sm btn-outline-primary">Buat Pertanyaan</a>
          </div>
        </div>
        <div class="col-sm-3 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
              src="{{asset('/template/assets/img/illustrations/man-with-laptop-light.png')}}"
              height="140"
              alt="View Badge User"
              data-app-dark-img="illustrations/man-with-laptop-dark.png"
              data-app-light-img="illustrations/man-with-laptop-light.png"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/intro -->
<!--isi forum -->
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($dataPertanyaan as $items)
    <div class="col">
      <div class="card h-100">
        <img src="{{asset('/uploads/'. $items->files)}}" class="card-img-top" height="250vh" />
        <div class="position-absolute top-0 end-0 mt-3 me-3">
          <span class="badge rounded-pill bg-info">
            {{ $items->category->name }}
          </span>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $items->judul }}</h5>
          <small class="text-muted">By : <b>{{ $items->user->profile->nama }}</b> | {{ $items->created_at }}</small>
          <p class="card-text mt-1">
            {{ strip_tags($items->isi) }}
          </p>
        </div>
        <div class="card-footer">
            <div class="d-grid col-6 mx-auto">
            <a class="btn btn-primary" href="/questions/{{$items->id}}" role="button">Lihat</a>
            </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
<!--/ isi forum -->
@endsection