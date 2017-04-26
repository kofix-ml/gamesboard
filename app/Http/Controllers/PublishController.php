<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publish;

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
        $publish = Publish::find($id);
        $publish->status          = $parameters['status'];
        $publish->save();

        return redirect()->route('game.index');
    }
    	
}
