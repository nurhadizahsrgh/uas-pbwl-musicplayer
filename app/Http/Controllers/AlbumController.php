<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Artist;

class AlbumController extends Controller
{

    public function index()
    {
        $rows = Album::all();
        return view('album.index', compact('rows'));
    }

    public function create()
    {
        $lst = Artist::all();
        return view('album.add', compact('lst'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'album_name' => 'required'
        ],
        [
            'album_name.required' => 'Nama wajib diisi'
        ]);

        $rows=Album::create([
        'album_name' => $request->album_name,
        'artist_id' => $request->artist_id
        ]);
        return redirect('album');
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
        $row = Album::findOrFail($id);
        $lst = Artist::all();
        return view('album.edit', compact('row', 'lst'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'album_name' => 'required'
        ],
        [
            'album_name.required' => 'Nama wajib diisi'
        ]);

        $row = Album::findOrFail($id);
        $row->update([
            'album_name' => $request->album_name,
            'artist_id' => $request->artist_id
        ]);

        return redirect('album');
    }

    public function destroy($id)
    {
        $row = Album::findOrFail($id);
        $row->delete();

        return redirect('album');
    }
}
