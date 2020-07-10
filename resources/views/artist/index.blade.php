@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">	
	<center>
	<h2>Daftar Artis <a class = "btn btn-primary" href="{{ url('artist/create') }}">Tambah Data</a></h2>
	</center>
	
	<table class="table">
		<tr>
			<th>ID ARTIS</th>
			<th>NAMA ARTIS</th>
			<th>EDIT</th>
			<th>HAPUS</th>
		</tr>

		@foreach($rows as $row)
		<tr>
			<td>{{ $row->artist_id }}</td>
			<td>{{ $row->artist_name }}</td>
			<td><a class = "btn btn-success" href="{{ url('artist/' . $row->artist_id . '/edit') }}">Edit</a></td>
			<td><form action="{{ url('artist/' . $row->artist_id) }}" method="POST">
				<input name="_method" type="hidden" value="DELETE">
				@csrf
				<button class= "btn btn-danger">Hapus</button>
			</form></td>
		</tr>
		@endforeach
	</table>
	</div>
</div>

@endsection