@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Infos Membre
@stop
@section('titre_contenu')
Infos Membre
@stop
@section('contenu')
<h3>
{{ $un_membre->prenom }} {{ $un_membre->nom }}
</h3>
<div class='h2'>
{{ $un_membre->adresse }}
</div>
@stop
@section('pied_page')
LP3MI 2024
@stop