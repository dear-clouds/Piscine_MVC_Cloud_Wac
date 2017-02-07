@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<div class="page-header">

    @if ( Auth::guest() )
   <div class="jumbotron">
      <div class="container">
        <h1>Bienvenue sur Cloud Wac</h1>
        <p>Cloud Wac est un site d'hébergement de fichiers totalement gratuit et organisable. N'hésitez plus et venez l'essayer !</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="register">S'inscrire !</a></p>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>


    @else
    <div class=".col-md-4">
        <h2>Salut <strong>{{ Auth::user()->username }}</strong> !<br><small><i>Upload des fichiers dès maintenant</i></small></h2>

        <br><br>
        <p class="bg-danger">{{ HTML::ul($errors->all()) }}</p>

        <br>



        {{ Form::open(array('url'=>'upload','files'=>true)) }}

        <div class="form-control input-lg">

            {{ Form::file('file','',array('id'=>'')) }}
</div>
            <br>

            {{ Form::textarea('description','',array('placeholder' => 'Description', 'id'=>'','class'=>'form-control', 'rows' => '3')) }}

        </div>
        <br/>
        {{ Form::submit('Uploader', array('class' => 'btn btn-primary btn-lg')) }}

        {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg')) }}

        {{ Form::close() }}

    </div>

    @endif


    <br><br>



</div>


@stop