@extends('pages_site.fond')

@section('titre', 'Vérification')

@section('titre_contenu', 'Liste des membres à vérifier')

@section('contenu')
@if($unverifiedUsers->isEmpty())
    <p>Il n'y a plus d'utilisateur à vérifier 😉</p>
@else
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Vérifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unverifiedUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('verifyUser') }}" method="POST">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary">Accepter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@stop

@section('pied_page', 'LP3MI 2024')
