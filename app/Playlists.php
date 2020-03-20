<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    //
    public function chansons(){
        return $this->belongsToMany('App\Chanson', 'chanson', "id");
    }
}
