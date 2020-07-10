@extends('layouts.app')

@section('content')

<div class="container">
	<center>
	<h2>Edit Data Album</h2>
	</center>
	<form action="{{ url('/album/' . $row->album_id) }}" method="POST">
		<input type="hidden" name="_method" value="PATCH">
		@csrf
		<table>
			<tr>
				<th>NAMA ALBUM</th>
				<td><input type="text" name="album_name" value="{{ $row->album_name }}"></td>
			</tr>
			<tr>
				<th>ARTIS</th>
				<td>
					<select name="artist_id">
						@foreach($lst as $rows)
						<option value="{{ $rows->artist_id }}">{{ $rows->artist_name }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "btn btn-primary" type="submit" value="UPDATE"></td>
			</tr>
		</table>
		
	</form>
	
</div>
@endsection