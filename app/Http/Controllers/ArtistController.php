<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;

class ArtistController extends Controller
{

    public function index()
    {
        $rows = Artist::all();
        return view('artist.index', compact('rows'));
    }

    public function create()
    {
        return view('artist.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required'
        ],
        [
            'artist_name.required' => 'Nama wajib diisi'
        ]);

        Artist::create([
            'artist_name' => $request->artist_name
        ]);

        return redirect('artist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = Artist::findOrFail($id);
        return view('artist.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'artist_name' => 'required'
        ],
        [
            'artist_name' => 'Nama wajib diisi'
        ]);

        $row = Artist::findOrFail($id);
        $row->update([
            'artist_name' => $request->artist_name
        ]);

        return redirect('artist');
    }

    public function destroy($id)
    {
        $row = Artist::findOrFail($id);
        $row->delete();

        return redirect('artist');
    }
}
