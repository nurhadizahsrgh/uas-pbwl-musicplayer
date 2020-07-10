<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
    protected $table = "tb_played";

    protected $primaryKey = 'played';

    protected $fillable = ['artist_id', 'album_id', 'track_id'];

    public function artist()
    {
    	return $this->belongsTo('App\Artist', 'artist_id');
    }

    public function album()
    {
    	return $this->belongsTo('App\Album', 'album_id');
    }

    public function track()
    {
    	return $this->belongsTo('App\Track', 'track_id');
    }
}
