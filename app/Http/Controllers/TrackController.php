<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Album;
use App\Artist;

class TrackController extends Controller
{

    public function index()
    {
        $rows = Track::all();
        return view('track.index', compact('rows'));
    }

    public function create()
    {
        $lst = Artist::all();
        $ls = Album::all();
        return view('track.add', compact('lst', 'ls'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'track_name' => 'required'
        ],
        [
            'track_name.required' => 'Nama wajib diisi'
        ]);

        $file = $request->file('file');
        $nama = $file->getClientOriginalName();
        $simpan = 'lagu';
        $file->move($simpan, $nama);

        Track::create([
            'track_name' => $request->track_name,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'file' => $nama
        ]);
        return redirect('track');
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
        $row = Track::findOrFail($id);
        $lst = Artist::all();
        $ls = Album::all();
        return view('track.edit', compact('row', 'lst', 'ls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'track_name' => 'required'
        ],
        [
            'track_name.required' => 'Nama wajib diisi'
        ]);

        $file = $request->file('file');
        $nama = $file->getClientOriginalName();
        $simpan = 'lagu';
        $file->move($simpan, $nama);

        $row = Track::findOrFail($id);
        $row->update([
            'track_name' => $request->track_name,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'file' => $nama
        ]);

        return redirect('track');
    }

    public function destroy($id)
    {
        $row = Track::findOrFail($id);
        $row->delete();

        return redirect('track');
    }
}
