<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publish;
use App\Marks;
use App\Player;

class PublishController extends Controller
{
    /*
    *
    *   Changes for update
    *   Description :   
    *   Last edited by : Firdausneonexxa
    *
    */
        
    public function update (Request $request, $id){
        $parameters = $request->all();

        // get it online or offline
        $publish = Publish::find($id);
        $publish->status          = $parameters['status'];
        $publish->save();

        // recreate players marking scheme
        if ($parameters['status'] == 1) {
        	$players = Player::all()->where('game_id',$publish->game_id);

        	// clear player marks
        	$marks = Marks::where('game_id',$publish->game_id)->get();
        	foreach ($marks as $mark) {
        		$mark->delete();
        	}
        	
        	// create new marking scheme
        	foreach ($players as $player) {

        		$mark = new Marks;
		        $fields = [
		            'game_id'               => $publish->game_id,
		            'player_id'           	=> $player->id,
		        ];

		        $mark = $mark->create($fields);
		        $mark->save();
        	}
        }


        return redirect()->route('game.index');
    }
    	
}
