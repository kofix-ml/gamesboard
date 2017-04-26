@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Game</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'game.store', 'files' => true]) !!}
                            @include('forms.gameconfig',['button_data' => 'Create Game'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
