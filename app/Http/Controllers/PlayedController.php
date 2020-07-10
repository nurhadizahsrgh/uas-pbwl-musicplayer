<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Played;
use App\Track;
use App\Album;
use App\Artist;

class PlayedController extends Controller
{

    public function index()
    {
        $rows = Played::all();
        return view('played.index', compact('rows'));
    }

    public function create()
    {
        $lst = Artist::all();
        $ls = Album::all();
        $l = Track::all();
        return view('played.add', compact('lst', 'ls', 'l'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'artist_id' => 'required',
            'album_id' => 'required',
            'track_id' => 'required'
        ],
        [
            'artist_id.required' => 'Wajib diisi'
        ]);

        Played::create([
        'artist_id' => $request->artist_id,
        'album_id' => $request->album_id,
        'track_id' => $request->track_id
        ]);

        return redirect('played');
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
        $row = Played::findOrFail($id);
        $lst = Artist::all();
        $ls = Album::all();
        $l = Track::all();

        return view('played.edit', compact('row', 'lst', 'ls', 'l'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'artist_id' => 'required'
        ],
        [
            'artist_id.required' => 'Wajib diisi'
        ]);

        $row = Played::findOrFail($id);
        $row->update([
        'artist_id' => $request->artist_id,
        'album_id' => $request->album_id,
        'track_id' => $request->track_id,
        ]);

        return redirect('played');
    }

    public function destroy($id)
    {
        $row = Played::findOrFail($id);
        $row->delete();

        return redirect('played');
    }
}
