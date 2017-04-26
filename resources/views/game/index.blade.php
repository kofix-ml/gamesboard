@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($games as $game)

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;@if($publishes[$game->id][0]['status'])background-color: #FB4F3A; color: white;@endif">{{ $game->title }} @if($publishes[$game->id][0]['status']) : <strong>GAME IS ONLINE</strong>@endif </div>

                <div class="panel-body">
                    <div class="col-md-3 col-xs-12">
                        <a href="#" class="thumbnail">
                          <img src="https://secure.gravatar.com/avatar/22c0273af57a7c69239303b0cdc0a887?s=64" alt="..." width="100%">
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h5>Description:</h5>
                        <p>No. of Players : {{count($players[$game->id])}}/{{$game->total_player}}</p>
                        <p>Created : {{$game->created_at}}</p>
                        <p>Updated : {{$game->updated_at}}</p>
                        <p>Game type : {{$game->type->label}}</p>
                        {!! Form::model($publishes[$game->id][0], ['route' => ['publish.update', $publishes[$game->id][0]['id']], 'method' => 'PUT', 'id' => 'publishstatusform']) !!}
                        <p>Status : 
                            {!! Form::select('status', ['0' => 'Offline', '1' => 'Online'], $publishes[$game->id][0]['status'], array('class' => 'form-control', 'id' => 'publish_status')) !!}
                        </p>
                        {!! Form::close() !!}
                        <p>Publish at : </p><input class="form-control" type="text" placeholder="URL Link.." readonly>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-primary col-md-12 col-xs-10 col-xs-offset-1" type="button" data-toggle="modal" data-target="#add_player" @if($publishes[$game->id][0]['status'])disabled="true"@endif>
                                Add Player <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-primary col-md-12 col-xs-10 col-xs-offset-1" type="button" data-toggle="modal" data-target="#features_error" @if($publishes[$game->id][0]['status'])disabled="true"@endif>
                                Players Setting <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-success col-md-12 col-xs-10 col-xs-offset-1" type="button" data-toggle="modal" data-target="#features_error" @if(!$publishes[$game->id][0]['status'])disabled="true"@endif>
                                Preview <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-success col-md-12 col-xs-10 col-xs-offset-1" type="button" data-toggle="modal" data-target="#features_error" @if(!$publishes[$game->id][0]['status'])disabled="true"@endif>
                                Game Dashboard <i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>
                    <div class="col-md-1 col-xs-12" >
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-warning col-md-12 col-xs-10 col-xs-offset-1" type="button" data-toggle="modal" data-target="#features_error" @if($publishes[$game->id][0]['status'])disabled="true"@endif><i class="fa fa-cogs" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-md-12 col-xs-6" style="padding: 0px 0px 10px 0px">
                            <button class="btn btn-danger col-md-12 col-xs-10 col-xs-offset-1"  type="button" data-toggle="modal" data-target="#features_error" @if($publishes[$game->id][0]['status'])disabled="true"@endif><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

{{-- include game player modal add --}}
@foreach($games as $game)
@include('game.add_player_modal',['game_name'=>$game->title,'game_id'=>$game->id,'total_player'=>$game->total_player,'current_player'=>count($players[$game->id])])
@endforeach
{{-- include public modal --}}
@include('features_not_ready_modal')


<script type="text/javascript">
  $(document).ready(function() {
    $('.addnewplayer').click(function(){
      $('#addnewplayerform').submit();
      gameindex("addplayer");
    });
    $('#publish_status').change(function(){
        $('#publishstatusform').submit();
    });
    



    function gameindex(actiontype) {
        switch (actiontype) {
            case "addplayer" :
                console.log('Done:added new player');
                break;
            default:
                console.log('Done:Something');
        }
    }
  });
</script>
@endsection
