@extends('layouts.master')

@section('title')
@parent
:: Profil
@stop

@section('content')
<h1><strong>{{ Auth::user()->username }}</strong></h1>
<h3 class="pull-right"><i>{{ Auth::user()->role }}</i></h3>


<p><strong>Username:</strong> {{ Auth::user()->username }}</p>
<p><strong>Prénom:</strong> {{ Auth::user()->name }}</p>
<p><strong>Nom:</strong> {{ Auth::user()->lastname }}</p>
<p><strong>Date de naissance:</strong> {{ Auth::user()->birthdate }}</p>
<p><strong>Date d'inscription:</strong> {{ Auth::user()->created_at }}</p>
<p><strong>Email:</strong> {{ Auth::user()->email }}</p>

<br>

<p><strong>Dernière connexion:</strong> {{ Auth::user()->updated_at }}</p>


<br><br>





<h2>Mes fichiers</h2>

@if ($uploads->count())

<p><strong>{{ $uploadCount->count() }}</strong> fichiers pour un total de <strong>{{ $totalSize }}</strong> octets.</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Miniature</th>
			<th>Nom</th>
			<th>Description</th>
			<th>Taille</th>
			<th>Date d'ajout</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($uploads as $upload)
		<tr>
			<td class="miniatures"><img class="miniatures" src="{{ $upload->url }}"></td>
			<td>{{ $upload->name }}</td>
			<td>{{ $upload->description }}</td>
			<td>{{ $upload->size }}</td>
			<td>{{ $upload->created_at }}</td>
			<td>
				<a href="upload/{{ $upload->id }}" target="_blank" class="btn btn-small btn-info">Voir</a>
				<a href="upload/{{ $upload->id }}/edit" class="btn btn-small btn-warning">Editer</a>
				{{ Form::open(array('url' => 'upload/' . $upload->id, 'class' => 'pull-right')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td></tr>
			@endforeach

		</tbody>

	</table>

	{{ $uploads->links(); }}


	{{ Form:: open(array('url' => 'newfolder', 'method' => 'post')) }}
  <ul class="errors">
    @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
    @endforeach
  </ul>

<div class="col-md-11">
<div class="form-group">
  {{ Form:: text ('dossier', '', array('placeholder' => 'Créer un dossier', 'class' => 'form-control')) }} 
 
</div>
</div>

<div class="col-md-1">
 {{ Form::submit('Créer', array('class' => 'btn btn-primary')) }}
</div>
    

    {{ Form:: close() }}

	@else
	Tu n'as aucun fichier uploadé.
	@endif

	@stop