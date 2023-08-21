@extends('layout.master')

@section('judul')

Ubah Komentar

@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Halaman Edit Jawaban</h4>
            
            <p class="card-description">
                Edit Jawaban Untuk Pertanyaan <strong><a href="/questions/{{$dataEditKomentar->questions->id}}" target="_blank">{{ $dataEditKomentar->questions->judul }}</a></strong> 
            </p>
            <form action="/replies/{{ $dataEditKomentar->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <textarea type="text" class="form-control" name="balasan" placeholder="Masukkan jawaban anda">{{ $dataEditKomentar->balasan }}</textarea>
                    @error('balasan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>
    </div>
</div>
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
