@extends('pages_site/fond')

@section('entete')
@stop

@section('titre')
    Club des Usagers de l'Espace galactique
@stop

@section('titre_contenu')
    Choisissez le membre que vous souhaitez modifier
@stop

@section('contenu')
    @foreach ($les_membres as $membre)
        <h3><a href="/modifier/{{ $membre->id }}"> {{ $membre->name }}</a></h3>
        @if(auth()->check())
            <div class='h2'>
                {{ $membre->email }}
            </div>
        @endif
    @endforeach

    <a href="{{ url('/creer') }}"> Créer nouveau membre </a>
@stop
@section('pied_page')
    LP3MI 2023
@stop