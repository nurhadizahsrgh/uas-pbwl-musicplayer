@extends('layouts.app')

@section('content')

<div class="container">
	<center>
	<h2>Tambah Data Artis</h2>
	</center>

	<form method = "POST" action="{{ url('/artist') }}">
		@csrf
		<table>
			<tr>
				<th>NAMA ARTIS</th>
				<td><input type="text" name="artist_name"></td>
			</tr>
			<tr>
				<th></th>
				<td><input class = "btn btn-primary" type="submit" value="SIMPAN"></td>
			</tr>
		</table>
		
	</form>
	
</div>

@endsection