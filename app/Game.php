<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
     	'title','description','total_player','total_group','player_arrangement','no_of_player','type_id',
    ];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
