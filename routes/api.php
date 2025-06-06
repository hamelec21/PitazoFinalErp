<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LogoClubController;
use App\Http\Controllers\Api\CampeonatoFemeninoController;
use App\Http\Controllers\Api\CampeonatoInfantilController;
use App\Http\Controllers\Api\CampeonatoSub45Controller;
use App\Http\Controllers\Api\CampeonatoZonaAController;
use App\Http\Controllers\Api\CampeonatoZonaBController;
use App\Http\Controllers\Api\EstadisticasCampeonatoController;
use App\Http\Controllers\Api\FixtureController;
use App\Http\Controllers\Api\NoticiaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/clubes/logos', [LogoClubController::class, 'index']);
//Campeonato Infantil
Route::get('/campeonato-infantil', [CampeonatoInfantilController::class, 'index']);
Route::get('/campeonato-infantil/serie/{serieId}', [CampeonatoInfantilController::class, 'porSerie']); //Resultados por series Infaltiles
//Campeonato sub45 y Fameninas
Route::get('/campeonato-sub45', [CampeonatoSub45Controller::class, 'tablaGeneralSub45']);

Route::get('/campeonato-femenino', [CampeonatoFemeninoController::class, 'tablaGeneralDamas']);


//Resultados Adultos Zona a
Route::get('/campeonato-zona-a', [CampeonatoZonaAController::class, 'tablaGeneralAdultos']); //tabla general
Route::get('/campeonato-zona-a/serie/{serieId}', [CampeonatoZonaAController::class, 'porSerie']); //resultados por series adultas

//Resultados Adultos Zona a
Route::get('/campeonato-zona-b', [CampeonatoZonaBController::class, 'tablaGeneralAdultos']); //tabla general
Route::get('/campeonato-zona-b/serie/{serieId}', [CampeonatoZonaBController::class, 'porSerie']); //resultados por series adultas

//Fixture
Route::get('/fixture/zona/{tipoCampeonatoId}', [FixtureController::class, 'porZona']);

//Noticias

Route::get('noticias', [NoticiaController::class, 'index']);            // Todas las noticias
Route::get('noticias/ultimas', [NoticiaController::class, 'ultimas']);  // Últimas 5
Route::get('noticia/{slug}', [NoticiaController::class, 'porSlug']); // Detalle por slug

Route::get('/estadisticas/serie/{serieId}', [EstadisticasCampeonatoController::class, 'porSerie']);
