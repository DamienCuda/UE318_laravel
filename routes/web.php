<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('message_redirect', 'App\Http\Controllers\ControleurMembres@showMessagePage')->name('message_redirect');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'App\Http\Middleware\VerifyUserMiddleware'], function () {
    Route::get('modifier/{id}', 'App\Http\Controllers\ControleurMembres@editer');
    Route::post('miseAJour/{id}', 'App\Http\Controllers\ControleurMembres@miseAJour');
    Route::get('membres/edit', 'App\Http\Controllers\ControleurMembres@consult');
    Route::get('membres/vue', 'App\Http\Controllers\ControleurMembres@index')->name('vue');
    Route::get('membre/{numero}', 'App\Http\Controllers\ControleurMembres@afficher');
    Route::get('creer', 'App\Http\Controllers\ControleurMembres@creer');
    Route::post('creation/membre', 'App\Http\Controllers\ControleurMembres@enregistrer');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/identite','App\Http\Controllers\ControleurMembres@identite');
Route::get('/protege','App\Http\Controllers\ControleurMembres@acces_protege')->middleware('auth');
Route::post('/verifyUser','App\Http\Controllers\AdminController@verifyUser')->name('verifyUser');

Route::any('/firewall/panel/{path?}', function() {

    $panel = new \Shieldon\Firewall\Panel();
    $panel->csrf(['_token' => csrf_token()]);
    $panel->entry();

})->where('path', '(.*)');