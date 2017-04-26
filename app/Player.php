<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
     	'name','game_id',
    ];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
