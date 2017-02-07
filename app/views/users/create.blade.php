@extends('layouts.master')

@section('title')
@parent
:: Créer un utilisateur
@stop

@section('content')
</nav>

<h1>Créer un utilisateur</h1>

{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'users')) }}

	<div class="form-group">
		{{ Form::label('username', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('nerd_level', 'Nerd Level') }}
		{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop