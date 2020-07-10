@extends ('layouts.app')

@section('content')

<div class="container">
	<center>
	<h2>Edit Data Artis</h2>
	</center>
	
	<form action="{{ url('/artist/' . $row->artist_id) }}" method="POST">
		<input name="_method" type="hidden" value="PATCH">
		@csrf
		<table>
			<tr>
				<th>NAMA ARTIS</th>
				<td><input type="text" name="artist_name" value="{{ $row->artist_name }}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "btn btn-primary" type="submit" value="UPDATE"></td>
			</tr>
		</table>
		
	</form>
	
</div>
@endsection