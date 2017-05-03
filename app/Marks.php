<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    //
    protected $fillable = [
     	'round','game_id','player_id',
    ];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
