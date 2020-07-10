<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = "tb_track";
    protected $primaryKey = 'track_id';
    protected $fillable = ['track_name', 'artist_id', 'album_id', 'file'];

    public function artist(){
    	return $this->belongsTo('App\Artist', 'artist_id');
    }

    public function album(){
    	return $this->belongsTo('App\Album', 'album_id');
    }
}
