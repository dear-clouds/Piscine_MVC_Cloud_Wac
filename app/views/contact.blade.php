@extends('layouts.master')

@section('title')
@parent
:: Contact
@stop

@section('content')
<div class="page-header">

  <h1>Contact</h1>

  {{ Form:: open(array('url' => 'contact', 'method' => 'post')) }}
  <ul class="errors">
    @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
    @endforeach
  </ul>

<div class="form-group">
  {{ Form:: label ('name', 'Nom*' )}}
  {{ Form:: text ('name', '', array('class' => 'form-control') )}}
</div>

<div class="form-group">
  {{ Form:: label ('email', 'E-mai*') }}
  {{ Form:: email ('email', '', array('placeholder' => 'me@exemple.fr', 'class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form:: label ('message', 'Message*' )}}
    {{ Form:: textarea ('message', '', array('class' => 'form-control'))}}
  </div>

    {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg')) }}
    {{ Form::submit('Envoyer', array('class' => 'btn btn-primary btn-lg')) }}

    {{ Form:: close() }}



  </div>


  @stop