<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    /**
    *
    *   Changes for Store
    *   Description :   
    *   Last edited by : Firdausneonexxa
    *
    */
        
    public function store (Request $request){
        $parameters = $request->all();

        $player = new Player;
        $fields = [
            'name'                  => $parameters['name'],
            'game_id'               => $parameters['game_id'],
        ];

        $player = $player->create($fields);
        $player->save();

        return redirect()->route('game.index');
    }
    
}
