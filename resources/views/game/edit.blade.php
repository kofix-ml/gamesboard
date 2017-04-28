<!-- Modal -->
<div class="modal fade" id="setting_game_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="setting_game_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header">
      	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	  	<h4 class="modal-title" id="setting_game_label">Game Setting ({{$game->title}})</h4>
      	</div>
  		<div class="modal-body">
  		  	{!! Form::model($game, ['route' => ['game.update', $game->id], 'files' => true, 'method' => 'PUT']) !!}
  		  	   @include('forms.gameconfig',['button_data' => 'Save Game'])
  		  	{!! Form::close() !!}
  		</div>
    </div>
  </div>
</div>