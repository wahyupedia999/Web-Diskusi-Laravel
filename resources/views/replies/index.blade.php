@extends('layout.master')

@section('judul')

Data Komentar

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
	<div class="table-responsive text-nowrap mt-4 mb-2 mr-1">
		<table id="example1" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">Pertanyaan</th>
					<th style="text-align: center;">Komentar Saya</th>
					<th style="text-align: center;width: 50%;">Aksi</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse($dataKomentar as $key => $data)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ Str::limit(strip_tags($data->questions->isi), 40) }}</td>
					<td>{{ Str::limit(strip_tags($data->balasan), 40) }}</td>
					<td>
						<div class="row">
							<div class="col">
								<a href="/questions/{{ $data->questions->id }}" style="text-decoration: none;" class="btn btn-success" target="_blank">
									Lihat
								</a>
							</div>
							<div class="col">
								<a href="/replies/{{ $data->id }}/edit" style="text-decoration: none;" class="btn btn-warning">
									Edit
								</a>
							</div>
							<div class="col">
								<form action="/replies/{{ $data->id }}" method="POST">
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