<?php

namespace App\Http\Controllers;

use App\GameRoute;
use Illuminate\Http\Request;

class GameRouteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();

        $gameroute = new GameRoute;
        $fields = [
            'game_id'               => $parameters['game_id'],
            'key'                   => rand(),
        ];

        $gameroute = $gameroute->create($fields);
        $gameroute->save();

        return redirect()->back();
    }

    public function update(Request $request, $gameroute)
    {
        $parameters = $request->all();
        $gameroute = GameRoute::find($gameroute);
        $gameroute->game_id           = $parameters['game_id'];
        $gameroute->key               = rand();
        $gameroute->save();

        return redirect()->back();
    }
}
