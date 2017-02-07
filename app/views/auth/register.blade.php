@extends('layouts.master')

@section('title')
@parent
:: S'inscrire
@stop

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>S'inscrire</h2>

        @if ($errors->any())

        <ul style="color:red;">

            {{ implode('', $errors->all('<li>:message</li>')) }}

        </ul>

        @endif

        @if (Session::has('message'))

        <p>{{ Session::get('message') }}</p>

        @endif

        {{ Form::open(array('url' => array('register'), 'method' => 'post')) }}

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
        
        {{Form::submit('Inscription', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop