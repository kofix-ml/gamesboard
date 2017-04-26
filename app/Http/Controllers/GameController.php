<?php

namespace App\Http\Controllers;

use App\Game;
use App\Player;
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
        if($players->isEmpty())
        {
            $players = 0;
        }

        if($publishes->isEmpty())
        {
            $publishes = 0;
        }
        
        return view('game.index',compact('games','players','publishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all()->pluck('label','id');
        return view('game.new',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
