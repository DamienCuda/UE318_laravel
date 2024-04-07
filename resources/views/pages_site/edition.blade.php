<?php

use Spatie\Html\Elements\Form;
use Spatie\Html\Elements\Label;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Button;




$form = new Form();
$submitButton = Button::create()
    ->type('submit')
    ->text('Modifier membre')
    ->addClass('btn btn-info');

$form = $form->action("/miseAJour/$un_membre->id")->method('POST');

$labelNom = Label::create()
    ->for('name')
    ->text('Nom');
$inputNom = Input::create()
    ->type('text')
    ->name('name')
    ->addClass('formcontrol')
    ->required(true)
    ->value($un_membre->name);

$labelAdresse = Label::create()
    ->for('email')
    ->text('Adresse e-mail');
$inputAdresse = Input::create()
    ->type('email')
    ->name('email')
    ->addClass('formcontrol')
    ->required(true)
    ->attribute('pattern', '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$')
    ->attribute('title', 'Enter a valid email address')
    ->value($un_membre->email);
?>

@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
Modification des infos du membre
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
<p>
</p>
@if(auth()->check() && auth()->id() == $un_membre->id)
    {!! $submitButton->toHtml() !!}
@else
    <p>Seul le titulaire du compte peut modifier les informations</p>
@endif
{!! $form->close() !!}
</div>
@stop
@section('pied_page')
LP3MI 2024
@stop