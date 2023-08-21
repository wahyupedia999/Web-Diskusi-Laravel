@extends('layout.master')

@section('judul')

Data Profil

@endsection

@section('content')

<div class="card mb-4">
    <div class="card-body">
        <form action="/profile/{{ $dataProfile->id }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{ $dataProfile->nama }}" name="nama">
            </div>
            <br>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" value="{{ $dataProfile->ttl }}" name="ttl">
                <!-- $data = new DateTime($dataProfile->ttl); $datas = $data->getTimestamp(); $today = new DateTime('today');  $y = $today->diff($datas)->y -->
                <!-- $data = $dataProfile->ttl; $today = new DateTime('today');  $y = $today->diff($data)->y -->
            </div>
            <br>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option>--Pilih--</option>
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <br>
            @error('jenis_kelamin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" >{{ $dataProfile->alamat }}</textarea>
            </div>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" value="{{ $dataProfile->pekerjaan }}" name="pekerjaan">
            </div>
            @error('bio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            <a href="/pertanyaan" class="btn btn-light"> Kembali </a>
        </form>
    </div>
</div>

@endsection