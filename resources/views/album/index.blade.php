@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<center>
	<h2>Daftar Album <a class = "btn btn-primary" href="{{ url('album/create') }}">Tambah Data</a></h2>
	</center>
	<table class="table">
		<tr>
			<th>ID ALBUM</th>
			<th>NAMA ALBUM</th>
			<th>ARTIS</th>
			<th>EDIT</th>
			<th>HAPUS</th>
		</tr>
		@foreach($rows as $row)
		<tr>
			<td>{{ $row->album_id }}</td>
			<td>{{ $row->album_name }}</td>
			<td>{{ $row->artist->artist_name }}</td>
			<td><a class = "btn btn-success" href="{{ url('album/' . $row->album_id . '/edit') }}">Edit</a></td>
			<td><form action="{{ url('album/' . $row->album_id) }}" method="POST">
				<input name="_method" type="hidden" value="DELETE">
				@csrf
				<button class = "btn btn-danger">Hapus</button>
			</form></td>
		</tr>
		@endforeach
	</table>
	</div>
</div>
@endsection