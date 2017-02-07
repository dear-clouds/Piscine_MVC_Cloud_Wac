@extends('layouts.master')

@section('title')
@parent
:: Profil
@stop

@section('content')
<h1><strong>{{ $user->username }}</strong></h1>
<p><strong>{{ $user->role }}</strong></p>


<p><strong>Username:</strong> {{ $user->username }}</p>
<p><strong>Prénom:</strong> {{ $user->name }}</p>
<p><strong>Nom:</strong> {{ $user->lastname }}</p>
<p><strong>Date de naissance:</strong> {{ $user->birthdate }}</p>
<p><strong>Date d'inscription:</strong> {{ $user->created_at }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

<br>

<p><strong>Dernière connexion:</strong> {{ $user->updated_at }}</p>


<br><br>

<h2>Ses fichiers</h2>


@if ($uploads->count())

{{ $uploadCount->count() }} fichiers.
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Miniature</th>
			<th>Nom</th>
			<th>Description</th>
			<th>Taille</th>
			<th>Date d'ajout</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($uploads as $upload)
		<tr>
			<td class="miniatures"><img class="miniatures" src="../{{ $upload->url }}"></td>
			<td>{{ $upload->name }}</td>
			<td>{{ $upload->description }}</td>
			<td>{{ $upload->size }}</td>
			<td>{{ $upload->created_at }}</td></tr>
		@endforeach
		
	</tbody>
	
</table>

{{ $uploads->links(); }}

@else
      Ce membre n'a aucun fichier uploadé.
      @endif

@stop