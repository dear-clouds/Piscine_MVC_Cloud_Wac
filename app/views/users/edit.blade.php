@extends('layouts.master')

@section('title')
@parent
:: Profil
@stop

@section('content')
<h1>Editer {{ $user->username }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

	<div class="form-group">
            {{Form::label('username','Nom d\'utilisateur')}}
            {{Form::text('username', null,array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password','Mot de passe')}}
            {{Form::password('password',array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('name','Prénom')}}
            {{Form::text('name', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('lastname','Nom')}}
            {{Form::text('lastname', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('birthdate','Date de naissance')}}
            {{Form::input('date', 'birthdate', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('role','Role')}}
            {{Form::text('role', null,array('class' => 'form-control'))}}
        </div>

	{{ Form::submit('Modifier le membre', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@stop