@extends('layouts.app')

@section('content')

<div class="container">
	<center>
	<h2>Daftar Artis <a href="{{ url('artist/create') }}">Tambah Data</a></h2>
	</center>
	
	<table>
		<tr>
			<th>ID</th>
			<th>NAMA ARTIS</th>
			<th>EDIT</th>
			<th>HAPUS</th>
		</tr>

		@foreach($rows as $row)
		<tr>
			<td>{{ $row->artist_id }}</td>
			<td>{{ $row->artist_name }}</td>
			<td><a href="{{ url('artist/' . $row->artist_id . '/edit') }}">Edit</a></td>
			<td><form action="{{ url('artist/' . $row->artist_id) }}" method="POST">
				<input name="_method" type="hidden" value="DELETE">
				@csrf
				<button>Hapus</button>
			</form></td>
		</tr>
		@endforeach
	</table>
	
</div>

@endsection