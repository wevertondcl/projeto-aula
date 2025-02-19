<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/primeiro-componente', \App\Livewire\PrimeiroComponente::class)->name('primeiro.componente.show');
//Route::get('/primeiro-componente',\App\Livewire\PrimeiroComponente::class)->name('primeiro.componente.show');

Route::get('/agendar-horario', \App\Livewire\HomeAgendamento::class)->name('home.agendamento.show');

Route::get('/home-restrita', \App\Livewire\HomeRestrita::class)->middleware('auth')->name('home.restrita.show');
Route::get('/agendamento-restrita', \App\Livewire\AgendamentoRestrita::class)->middleware('auth')->name('agendamento.restrita.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
