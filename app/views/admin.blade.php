@extends('layouts.master')

@section('title')
@parent
:: Admin
@stop

@section('content')


<p class="pull-right"><a href="admin/users" class="btn btn-default btn-lg"><img src="img/users.png" alt="users"> Gérer les utilisateurs</a> 
  <a href="admin/files" class="btn btn-default btn-lg"><img src="img/folder.png" alt="uploads"> Gérer les uploads</a></p>
<br>

@if ($users->count())
<h1>Derniers membres inscrits</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Date de naissance</th>
      <th>Date d'inscription</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->lastname }}</td>
      <td>{{ $user->birthdate }}</td>
      <td>{{ $user->created_at }}</td>

    </tr>
    @endforeach

  </tbody>

</table>

@else
Il n'y a aucun membre.
@endif

<br><br>


@if ($uploads->count())
<h1>Derniers fichiers uploadés</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Miniature</th>
      <th>Nom</th>
      <th>Description</th>
      <th>Ajouté par</th>
      <th>Taille</th>
      <th>Date d'ajout</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($uploads as $upload)
    <tr>
      <td width="100px"><img class="miniatures" src="{{ $upload->url }}"></td>
      <td>{{ $upload->name }}</td>
      <td>{{ $upload->description }}</td>
      <td>{{ $upload->user_id }}</td>
      <td>{{ $upload->size }}</td>
      <td>{{ $upload->created_at }}</td>

    </tr>
    @endforeach

  </tbody>

</table>


@else
Il n'y a aucun fichier.
@endif



@stop