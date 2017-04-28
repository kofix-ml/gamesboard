<!-- Modal -->
<div class="modal fade" id="new_game" tabindex="-1" role="dialog" aria-labelledby="new_game_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="new_game_label">New Game</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'game.store', 'files' => true]) !!}
                            @include('forms.gameconfig',['button_data' => 'Create Game'])
                    {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>