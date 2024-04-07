@extends('pages_site/fond')

@section('entete')
@stop

@section('titre')
Page sécurisée
@stop

@section('titre_contenu')
Contenu de la BD
@stop

@section('contenu')
{{ $utilisateur }} {{ $id }}
@stop

@section('pied_page')
LP3MI 2024
@stop