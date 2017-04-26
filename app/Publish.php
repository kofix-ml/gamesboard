<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $fillable = [
     	'link','game_id','status',
    ];

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
