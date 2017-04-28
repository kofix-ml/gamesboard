<!-- Modal -->
<div class="modal fade" id="add_player_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="add_player_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if($current_player < $total_player)
          <h4 class="modal-title" id="add_player_label">Add Player ({{$game->title}})</h4>
        @else
          <h4 class="modal-title" id="add_player_label">Game {{$game->title}} is full</h4>
        @endif
      </div>
      <div class="modal-body">
        @if($current_player < $total_player)
          {!! Form::open(['route' => 'player.store', 'files' => true, 'id' => 'addnewplayerform_'.$game->id]) !!}
              <div class="form-group">
                  {!! Form::label('name', 'Name') !!}
                  {!! Form::text('name', null, array('class' => 'form-control')) !!}
              </div>
              {!! Form::hidden('game_id', $game->id, array('class' => 'form-control')) !!}
          {!! Form::close() !!}
        @else
          The number of players for this game has exceed the limit!!.
        @endif
        
      </div>
      <div class="modal-footer">
        @if($current_player < $total_player)
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary addnewplayer_{{$game->id}}">Add</button>
        @else
          <button type="button" class="btn btn-success" data-dismiss="modal">Ok, I got it!</button>
        @endif
      </div>
    </div>
  </div>
</div>