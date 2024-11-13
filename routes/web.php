<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/campeonato-adulto',App\Livewire\CampeonatoAdulto::class)->name('campeonato-adulto');
Route::get('/campeonato-femenino',App\Livewire\CampeonatoFemenino::class)->name('campeonato-femenino');
Route::get('/campeonato-infantil',App\Livewire\CampeonatoInfantil::class)->name('campeonato-infantil');
Route::get('/campeonato-sub45',App\Livewire\CampeonatoSub45::class)->name('campeonato-sub45');




