@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<center>
	<h2>Daftar Played <a class = "btn btn-primary" href="{{ url('played/create') }}">Tambah Data</a></h2>
	</center>

	<table class="table">
		<tr>
			<th>ARTIS</th>
			<th>NAMA ALBUM</th>
			<th>JUDUL</th>
			<th>PLAYED</th>
			<th>EDIT</th>
			<th>HAPUS</th>
		</tr>
		@foreach($rows as $row)
		<tr>
			<td>{{ $row->artist->artist_name }}</td>
			<td>{{ $row->album->album_name }}</td>
			<td>{{ $row->track->track_name }}</td>
			<td>{{ $row->played }}</td>
			<td><a class = "btn btn-success" href="{{ url('played/' . $row->played . '/edit') }}">Edit</a></td>
			<td><form action="{{ url('played/' . $row->played) }}" method="POST">
				<input name="_method" type="hidden" value="DELETE">
				@csrf
				<button class = "btn btn-danger" >Hapus</button>
			</form></td>
		</tr>
		@endforeach
	</table>
</div>
</div>

@endsection