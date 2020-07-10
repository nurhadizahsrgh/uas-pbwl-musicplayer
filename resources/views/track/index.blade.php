@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<center>
	<h2>Daftar Track <a class = "btn btn-primary" href="{{ url('track/create') }}">Tambah Data</a></h2>
	</center>

	<table class="table">
		<tr>
			<th>ID TRACK</th>
			<th>JUDUL</th>
			<th>ARTIS</th>
			<th>ALBUM</th>
			<th>FILE</th>
			<th>EDIT</th>
			<th>HAPUS</th>
		</tr>
		@foreach($rows as $row)
		<tr>
			<td>{{ $row->track_id }}</td>
			<td>{{ $row->track_name }}</td>
			<td>{{ $row->artist->artist_name }}</td>
			<td>{{ $row->album->album_name }}</td>
			<td>
				<audio controls>
					<source src="lagu/{{ $row->file }}" type="audio/mp3">
				</audio>
			</td>
			<td><a class = "btn btn-success" href="{{ url('track/' . $row->track_id . '/edit') }}">Edit</a></td>
			<td><form action="{{ url('track/' . $row->track_id) }}" method="POST">
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