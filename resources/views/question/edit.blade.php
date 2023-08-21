@extends('layout.master')
@section('judul')
Edit Pertanyaan
@endsection
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-description">
            Silakan tanyakan apapun yang kalian kamu tanyakan
        </p>
        <form action="/questions/{{ $dataEditPertanyaan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Pertanyaan" value="{{ $dataEditPertanyaan->judul }}">
                @error('judul')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="title">Content</label>
                <textarea type="text" class="form-control" name="isi" placeholder="Apa yang ingin anda tanyakan?">
                    {{ $dataEditPertanyaan->isi }}
                </textarea>
                @error('isi')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="title">Gambar</label>
                <input type="file" class="form-control" name="file" placeholder="Silahkan input gambar">
                <img src="{{ asset('/uploads/'.$dataEditPertanyaan->files) }}" alt="" class="mt-4">
            </div>
            @error('file')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="title">Kategori</label>
                        <select class="form-control" name="kategori" placeholder="Masukkan Kategori">
                          <option value="">--Pilih Kategori--</option>
                          @forelse($dataKategori as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                          @empty
                          <h5>Data Kosong</h5>
                          @endforelse
                          @error('kategori_id')
                          <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-4 mt-4">
                    <a href="/kategori/create" class="btn btn-info" target="_blank"> Buat Kategori Baru</a>
                </div>
            </div>
        </div>
    <!-- <br>
    <div class="form-group">
        <label for="title">Tags</label>
        <input type="text" class="form-control" name="tags"  placeholder="Masukkan tags">
        @error('tags')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>-->
    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/questions" class="btn btn-danger"> Kembali </a>
</form>
</div>
</div>
</div>
@endsection

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