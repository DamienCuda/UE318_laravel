<?php 

use Spatie\Html\Elements\Form;
use Spatie\Html\Elements\Label;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Button;

$form = new Form();
$submitButton = Button::create()
    ->type('submit')
    ->text('Créer un membre')
    ->addClass('btn btn-primary');

$form = $form->action('creation/membre')->method('POST');


$labelNom = Label::create()
    ->for('name')
    ->text('Nom');
$inputNom = Input::create()
    ->type('text')
    ->name('name')
    ->addClass('formcontrol')
    ->required(true);

$labelAdresse = Label::create()
    ->for('email')
    ->text('Adresse e-mail');
$inputAdresse = Input::create()
    ->type('email')
    ->name('email')
    ->addClass('formcontrol')
    ->required(true)
    ->attribute('pattern', '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$')
    ->attribute('title', 'Entrez une adresse valide');

$labelPassword = Label::create()
    ->for('password')
    ->text('Mot de passe');
$inputPassword = Input::create()
    ->type('password')
    ->name('password')
    ->addClass('formcontrol')
    ->required(true)
    ->attribute('title', 'Entrez uneon mot de passe valide'); 

?>

@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
Création d'un nouveau membre
@stop
@section('contenu')
<div class="formgroup">
{!! $form->open() !!}
@csrf
<div class="formgroup">
{!! $labelNom->toHtml() !!}
{!! $inputNom->toHtml() !!}
</div>
<div class="formgroup">
{!! $labelAdresse->toHtml() !!}
{!! $inputAdresse->toHtml() !!}
</div>
<div class="formgroup">
{!! $labelPassword->toHtml() !!}
{!! $inputPassword->toHtml() !!}
</div>
<p>

</p>
{!! $submitButton->toHtml() !!}
{!! $form->close() !!}
</div>
@stop
@section('pied_page')
LP3MI 2024
@stop