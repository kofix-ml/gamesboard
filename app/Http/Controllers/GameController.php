<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameAgent;
use App\GameRoute;
use App\Player;
use App\Marks;
use App\Publish;
use App\Type;
use Illuminate\Http\Request;

class GameController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        $players = Player::all()->groupBy('game_id');
        $publishes = Publish::all()->groupBy('game_id');

        // Notes for checking collection
            // if ($result->first()) { } 
            // if (!$result->isEmpty()) { }
            // if ($result->count()) { }
            // if (count($result)) { }

        //check for empty collection
        // dd($players);
        
        foreach ($games as $game) {
            if(!$players->get($game->id))
            {
                $players->prepend(null, $game->id);
            }
        }
        
        // dd($players);
        if($publishes->isEmpty())
        {
            $publishes = 0;
        }
        
        return view('game.index',compact('games','players','publishes'));
    }

    /**
    *
    *    Changes for Store
    *    Description : Saving a game
    *    Last edited by : Firdausneonexxa
    *
    */
        
    public function store(Request $request)
    {
        $parameters = $request->all();

        $game = new Game;
        $fields = [
            'type_id'               => $parameters['type_id'],
            'title'                 => $parameters['title'],
            'description'           => $parameters['description'],
            'total_player'          => $parameters['total_player'],
            'total_group'           => $parameters['total_group'],
            'player_arrangement'    => $parameters['player_arrangement'],
        ];

        $game = $game->create($fields);
        $game->save();

        $publish = new Publish;
        $publish->game_id = $game->id;
        $publish->save();

        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $marks      = Marks::all()->where('game_id', $game->id);
        $gameagents = GameAgent::all()->where('game_id', $game->id);
        $gameroute  = GameRoute::get()->where('game_id', $game->id);
        
        return view('board.gamedashboard',compact('marks','gameagents','gameroute'));
    }

    /**
    *
    *    Changes for Update
    *    Description :     
    *    Last edited by : Firdausneonexxa
    *
    */
        
    public function update(Request $request, Game $game)
    {
        $parameters = $request->all();

        $game->type_id               = $parameters['type_id'];
        $game->title                 = $parameters['title'];
        $game->description           = $parameters['description'];
        $game->total_player          = $parameters['total_player'];
        $game->total_group           = $parameters['total_group'];
        $game->player_arrangement    = $parameters['player_arrangement'];
        $game->save();

        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('game.index');
    }
}
