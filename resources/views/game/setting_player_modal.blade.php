<!-- Modal -->
<div class="modal fade" id="setting_player_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="setting_player_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="setting_player_label">Player Setting ({{$game->title}})</h4>
      </div>
      <div class="modal-body">
        @foreach($players as $player)
          {!! Form::model($player, ['route' => ['player.update', $player->id], 'files' => true, 'id' => 'playersetting', 'class' => 'form-inline']) !!}
              <div class="form-group">
                  {!! Form::label('name', 'Name') !!}
                  {!! Form::text('name', null, array('class' => 'form-control')) !!}
              </div>
              <button type="submit" class="btn btn-default">Save</button>
              {!! Form::hidden('game_id', $game->id, array('class' => 'form-control')) !!}
          {!! Form::close() !!}
        @endforeach
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary saveplayersetting">Add</button>
      </div>
    </div>
  </div>
</div>