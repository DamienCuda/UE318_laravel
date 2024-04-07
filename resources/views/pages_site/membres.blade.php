@extends('pages_site/fond')

@section('titre')
Membres | CSS
@stop

@section('titre_contenu')
Liste des membres
@stop

@section('contenu')
@foreach ($les_membres as $membre)
    <h3>{{ $membre->name }}</h3>
    @if(auth()->check())
        <div class='h2'>
            {{ $membre->email }}
        </div>
    @endif
@endforeach
@stop

@section('pied_page')
LP3MI 2024
@stop
