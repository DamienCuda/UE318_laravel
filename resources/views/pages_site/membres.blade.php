@extends('pages_site/fond')

@section('titre')
Membres | CSS
@stop
@if(auth()->check())
    @section('titre_contenu')
    Liste des membres
    @stop

    @section('contenu')
        @foreach ($les_membres as $membre)
        <h3>{{ $membre->name }}</h3>
        @if(auth()->check() && auth()->user()->isVerified)
            <div class='h2'>
                {{ $membre->email }}
            </div>
        @endif
        @endforeach
    @stop
@else
    @section('titre_contenu')
    Bienvenue !<br/> Connectez-vous pour avoir accès aux informations du club.
    @stop
@endif

@section('pied_page')
LP3MI 2024
@stop
