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

    /**
    *
    *	Changes for update
    *	Description :     
    *	Last edited by : Firdausneonexxa
    *
    */
    	
    public function update(Request $request, Player $player)
    {
        $parameters = $request->all();
        $player->name                  = $parameters['name'];
        $player->save();

        return back()->with('player_setting_saved', $player->game_id);
    }
    	
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return back()->with('player_setting_saved', $player->game_id);
    }
    
}
