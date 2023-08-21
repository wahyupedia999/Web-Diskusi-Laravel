@extends('layout.master')

@section('judul')

Detail Pertanyaan

@endsection

@section('content')

<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body">   
      <h3 class="card-title"><b>{{ $dataPertanyaan->judul }}</b></h3>
      <h6 class="card-text">Ditulis oleh : {{ $dataPertanyaan->user->profile->nama }}</h6>
      <p class="card-text"><small class="text-muted">created at : {{ $dataPertanyaan->created_at }}</small></p>
      <div class="text-center">
        <img src="{{ asset('/uploads/'. $dataPertanyaan->files) }}" class="rounded" alt="..." height="300vh" width="80%">
      </div>
      <br>
      <br>
      <div class="badge bg-info text-wrap">
        {{ $dataPertanyaan->category->name }}
      </div>
      <!-- <p class="card-text">Tags : laravel auth</p> -->
      <p class="card-description mt-3">
        {{ strip_tags($dataPertanyaan->isi) }}
      </p>
    </div>
  </div>
</div>
<h3 class="m-4">Komentar</h3>
<div class="col-lg-12 stretch-card my-1">
  @forelse($dataPertanyaan->replies as $items)
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title d-inline-block">{{ $items->user->profile->nama }} </h4>
      <i class="bi bi-three-dots-vertical float-right" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>      
      <p class="card-text"><small class="text-muted">created at: {{ $items->created_at }}</small></p>
      <p class="card-description">
        {{ strip_tags($items->balasan) }}
      </p>

      @auth
      @if($items->id_user == Auth::id())
      <div class="row">
        <div class="col">
          <a href="/replies/{{ $items->id }}/edit" style="text-decoration: none;" class="btn btn-primary">
            Ubah Komentar
          </a>
        </div>
        <div class="col">
          <form action="/replies/{{ $items->id }}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger" onclick="delete_confirm(event)" type="submit" value="Hapus">
          </form>
        </div>
      </div>
      @else
      @endif
      @endauth

    </div>
  </div>
  @empty

  <div class="m-4">
    <h5>Tidak ada Komentar</h5>
  </div>

  @endforelse
</div>
<!--   jika jawaban kosong
  <h4 class="m-4 text-muted">Belum Ada Jawaban</h4> -->
  <br>
  <br>
  @auth
  <hr>
  <h3 class="m-4">Beri Komentar</h3>
  <form action="/replies/{{ $dataPertanyaan->id }}" method="POST" class="m-4">
    @csrf
    @method('post')
    <div class="form-group">
      <textarea type="text" class="form-control" name="balasan" placeholder="Masukkan jawaban anda"></textarea>
      @error('jawaban')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
      @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-success">Komentar</button>
  </form>
  @endauth
  @push('script')
  <script src="https://cdn.tiny.cloud/1/5n435sr2mdy24gdv0rnf442rjho3y7sdpzae5y6dupb31qiq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
      ]
    });
  </script>
  @endpush

  @endsection