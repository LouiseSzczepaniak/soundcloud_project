<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    //
    public function chansons(){
        return $this->belongsToMany('App\chanson', 'playlists_chanson', "playlists_id", "chanson_id");
    }
}
