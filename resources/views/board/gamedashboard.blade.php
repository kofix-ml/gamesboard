@extends('layouts.board')

@section('content')

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#playercontrol" aria-controls="playercontrol" role="tab" data-toggle="tab">Player Control</a></li>
    <li role="presentation"><a href="#gameagent" aria-controls="gameagent" role="tab" data-toggle="tab">Game Agent</a></li>
    <li role="presentation"><a href="#gamecontrol" aria-controls="gamecontrol" role="tab" data-toggle="tab">Game Control</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="playercontrol">
        <div class="container">
          <br>
          <div class="col-md-12">
          {{-- jefrey way --}}
            @foreach($players as $player)
              <div class="row">
                {{-- model marks --}}
                
                
              </div>
            @endforeach


          {{-- vue way --}}
           {{--  @foreach($players as $player)
              <div class="row">
                {{$player->name}}
                <input class="form-control" id="disabledInput" type="text" :placeholder="counter" disabled>
                <button v-on:click="counter += 1">Say hi</button>
              </div>
            @endforeach --}}
          </div>
          
        </div>
        
    </div>
    <div role="tabpanel" class="tab-pane" id="gameagent">agent list, role, remove</div>
    <div role="tabpanel" class="tab-pane" id="gamecontrol">board freeze, game start</div>
  </div>

</div>
@endsection