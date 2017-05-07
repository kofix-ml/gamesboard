<!-- Modal -->
<div class="modal fade" id="add_game_agent" tabindex="-1" role="dialog" aria-labelledby="add_agent_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_agent_label">Add Agent</h4>
      </div>
      <div class="modal-body">
          {{-- {!! Form::open(['route' => 'gameagent.store', 'files' => true, 'id' => 'addnewagent']) !!}
              <div class="form-group">
                  {!! Form::label('name', 'Name') !!}
                  {!! Form::text('name', null, array('class' => 'form-control')) !!}
              </div>
              {!! Form::hidden('game_id', $game->id, array('class' => 'form-control')) !!}
          {!! Form::close() !!} --}}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary addnewagent">Add</button>
      </div>
    </div>
  </div>
</div>