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
          <div class="col-md-6 col-md-offset-3">
          {{-- jefrey way --}}
            @foreach($marks as $mark)
              <div class="row">
                {!! Form::model($mark, ['route' => ['mark.update', $mark->id], 'method' => 'PUT', 'id' => 'updateplayermark_'.$mark->player->id]) !!}
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::text('name', $mark->player->name, array('class' => 'form-control', 'disabled' => true)) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::number('value', $mark->value, array('class' => 'form-control')) !!}
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
                {!! Form::close() !!}
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
    <div role="tabpanel" class="tab-pane" id="gameagent">
      <div class="container">
        <br>
        <br>
        <div class="row">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add_game_agent">Add Agent <i class="fa fa-users" aria-hidden="true"></i></button> 
        </div>
        @foreach($gameagents as $gameagent)
          <div class="row">
            {!! Form::model($gameagent, ['route' => ['gameagent.update', $gameagent->id], 'method' => 'PUT', 'id' => 'updategameagent_'.$gameagent->user->id]) !!}
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::text('name', $gameagent->user->name, array('class' => 'form-control', 'disabled' => true)) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::select('role_id', \App\Role::pluck('label','id'), null, array('class' => 'form-control')) !!}
                  </div>
                  <button type="submit" class="btn btn-default"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>
            {!! Form::close() !!}
          </div>
        @endforeach
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="gamecontrol">
      <div class="container">
        <br>
        <br>
        <div class="row">
          @if($gameroute->count() > 0) 
          {!! Form::model($gameroute[0], ['route' => ['gameroute.update', $gameroute[0]->id], 'files' => true, 'method' => 'PUT']) !!}
          <button class="btn btn-warning" type="submit">Re-Generate Key <i class="fa fa-key" aria-hidden="true"></i></button>
          {!! Form::hidden('game_id', $game->id, array('class' => 'form-control')) !!} 
          {!! Form::close() !!}
          @else
          {!! Form::open(['route' => 'gameroute.store', 'files' => true]) !!}
          <button class="btn btn-warning" type="submit">Generate Key <i class="fa fa-key" aria-hidden="true"></i></button>
          {!! Form::hidden('game_id', $game->id, array('class' => 'form-control')) !!} 
          {!! Form::close() !!}
          @endif
        </div>
        <br>
        <div class="row">
          
          {{-- check if exist --}}
          @if($gameroute->count() > 0) 
            
            <div class="form-inline">
              <div class="form-group">
                {!! Form::text('key', $gameroute[0]->key, array('class' => 'form-control', 'disabled' => true)) !!}
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default"><i class="fa fa-clone" aria-hidden="true"></i></button>
              </div>
            </div>
          @else
            <div class="form-inline">
              <div class="form-group">
                {!! Form::text('key', 'No key generated yet', array('class' => 'form-control', 'disabled' => true)) !!}
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default"><i class="fa fa-clone" aria-hidden="true"></i></button>
              </div>
            </div>
          @endif

        </div>
        <br>
        <br>
        <div class="row">
          <h3>Game Control</h3>
          <div class="form-inline">
            <button type="submit" class="btn btn-default"><i class="fa fa-play" aria-hidden="true"></i></button>
            <button type="submit" class="btn btn-default"><i class="fa fa-pause" aria-hidden="true"></i></button>
            <button type="submit" class="btn btn-default"><i class="fa fa-stop" aria-hidden="true"></i></button>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection