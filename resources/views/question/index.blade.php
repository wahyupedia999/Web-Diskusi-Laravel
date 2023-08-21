@extends('layout.master')

@section('judul')

Data Pertanyaan

@endsection

@push('scripts')
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
	$(function () {
		$("#example1").DataTable();
	});
</script>

@endpush

@section('content')

<div class="card">
	<h5 class="card-header mb-3">
		<a href="/questions/create" class="btn btn-primary">
			<i class="menu-icon tf-icons bx bx-plus"></i>
			Tambah Pertanyaan
		</a>
	</h5>
	<div class="table-responsive text-nowrap">
		<table id="example1" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">Judul</th>
					<th style="text-align: center;">Isi</th>
					<th style="text-align: center;">Kategori</th>
					<th style="text-align: center;">Files</th>
					<th style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse($dataPertanyaan as $key => $data)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ Str::limit(strip_tags($data->judul), 20) }}</td>
					<td>{{ Str::limit(strip_tags($data->isi), 20) }}</td>
					<td>{{ $data->category->name }}</td>
					<td><img src="{{ asset('/uploads/'.$data->files) }}" alt="" height="120vh" width="100%"></td>
					<td>
						<div class="row">
							<div class="col-1 mr-2">
								<a href="/questions/{{ $data->id }}" style="text-decoration: none;" class="btn btn-success">
									Lihat
								</a>
							</div>
							<div class="col-1 ml-4">
								<a href="/questions/{{ $data->id }}/edit" style="text-decoration: none;" class="btn btn-warning">
									Edit
								</a>
							</div>
							<div class="col-1 ml-4">
								<form action="/questions/{{ $data->id }}" method="POST">
									@csrf
									@method('delete')
									<input class="btn btn-danger" onclick="delete_confirm(event)" type="submit" value="Hapus">
								</form>
							</div>
						</div>
					</td>
				</tr>
				
				@empty
				
				

				@endforelse
			</tbody>
		</table>
	</div>
</div>

@endsection