<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameRoute;
use App\Game;
use App\Marks;

class GameLiveController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function show($live)
    {
        
        $gameroute 	= GameRoute::where('key',$live)->first();
        $game 		= Game::find($gameroute->game_id);
        $marks      = Marks::all()->where('game_id', $gameroute->game_id);
        if ($game->type->label == "Death-Match") {
        	return view('live.deathmatch',compact('marks','game'));
        }else{
        	dd("board is not alive");
        }
        
    }
}
