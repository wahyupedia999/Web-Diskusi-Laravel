@extends('layout.master')
@section('judul')
    Tentang Mini Forum
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{asset('/logo.jpg')}}" class="img-fluid mx-auto d-block" style="width:272px; height:66px;" alt="..."><br>
        <p>Mini Forum adalah situs untuk developer tempat kamu dapat berdiskusi, belajar, dan berkolaborasi. Dibangun pada open-source software, Mini Forum memiliki banyak user.
            Di komunitas developer ini, kamu akan melihat banyak artikel tentang pendapat dari para developer, berbagi pengalaman, dan cerita para developer. 
            Di sini kamu dapat menemukan kontributor untuk proyek kamu atau berkontribusi pada orang lain, mempekerjakan atau dipekerjakan, dan menawarkan atau mendapatkan bimbingan. Kamu juga bisa mendapatkan bantuan dengan mengajukan pertanyaan. Selain itu, ada daftar alat, event, barang untuk dijual, dan pendidikan.
            Mini Forum memungkinkan kamu untuk menonton video komunitas, mendengarkan podcast, dan membeli merchandise. Yang terbaik dari semuanya, hal ini secara teratur menjadi tantangan, sehingga kamu dapat mengambil andil di dalamnya dan memenangkan hadiah.</p>
    </div>
</div>
@endsection