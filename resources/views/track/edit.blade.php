@extends('layouts.app')
@section('content')

<div class="container">
	<center>
	<h2>Edit Data Track</h2>
	</center>
	
	<form action="{{ url('/track/' . $row->track_id) }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
		@csrf
		<table>
			<tr>
				<th>JUDUL</th>
				<td><input type="text" name="track_name" value="{{ $row->track_name }}"></td>
			</tr>
			<tr>
				<th>ARTIS</th>
				<td>
					<select name="artist_id">
						@foreach($lst as $rows)
						<option value ="{{ $rows->artist_id }}">{{ $rows->artist_name }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<th>NAMA ALBUM</th>
				<td>
					<select name="album_id">
						@foreach($ls as $rows)
						<option value ="{{ $rows->album_id }}">{{ $rows->album_name }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<th>FILE</th>
				<td><td><input type="file" name="file" value="{{ $row->file }}"></td></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "btn btn-primary" type="submit" value="UPDATE"></td>
			</tr>
		</table>
		
	</form>
	
</div>
@endsection