<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameRoute extends Model
{
    protected $fillable = [
     	'key','game_id',
    ];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
