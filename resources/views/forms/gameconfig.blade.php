<div class="form-group">
	{!! Form::label('type_id', 'Game Type') !!}
	{!! Form::select('type_id', \App\Type::pluck('label','id'), null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::label('title', 'Name') !!}
	{!! Form::text('title', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::textarea('description', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::label('total_player', 'Total Player') !!}
	{!! Form::number('total_player', null, array('class' => 'form-control', 'min' => '0')) !!}
</div>
<div class="form-group">
	{!! Form::label('total_group', 'Total Group') !!}
	{!! Form::number('total_group', null, array('class' => 'form-control', 'min' => '0')) !!}
</div>
<div class="form-group">
    {!! Form::label('player_arrangement', 'Arrangement Type') !!}
    {!! Form::select('player_arrangement', ['1' => 'Auto', '2' => 'Manual'], '1', array('class' => 'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::submit($button_data, array('class' => 'btn btn-primary')) !!}
</div>