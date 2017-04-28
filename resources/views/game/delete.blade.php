<!-- Modal -->
<div class="modal fade" id="delete_game_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_game_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header">
      	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	  	<h4 class="modal-title" id="delete_game_label">Game Delete ({{$game->title}})</h4>
      	</div>
  		<div class="modal-body">
  		  	{!! Form::model($game, ['route' => ['game.destroy', $game->id], 'files' => true, 'method' => 'DELETE', 'id' => 'deletethisgame_'.$game->id]) !!}
  		  	   <p>Are you sure you want to delete this game?</p>
  		  	{!! Form::close() !!}
  		</div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary confirmdeletegame_{{$game->id}}">Yes, please</button>
      </div>
    </div>
  </div>
</div>