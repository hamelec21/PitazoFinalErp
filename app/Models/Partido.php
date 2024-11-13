<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_local_id',
        'club_visitante_id',
        'serie_id',
        'tipo_serie_id',
        'fecha_fixture_id',
        'goles_local',
        'goles_visitante',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($partido) {
            $partido->calcularPuntos();
        });
    }

    public function calcularPuntos()
    {
        $resultadoLocal = Resultado::firstOrNew([
            'partido_id' => $this->id,
            'club_id' => $this->club_local_id,
        ]);

        $resultadoVisitante = Resultado::firstOrNew([
            'partido_id' => $this->id,
            'club_id' => $this->club_visitante_id,
        ]);

        $resultadoLocal->serie_id = $this->serie_id;
        $resultadoLocal->tipo_serie_id = $this->tipo_serie_id;
        $resultadoLocal->fecha_fixture = $this->fecha_fixture_id;

        // Asignar los goles de local y visitante
        $resultadoLocal->goles_local = $this->goles_local;
        $resultadoVisitante->goles_visitante = $this->goles_visitante;

        $resultadoVisitante->serie_id = $this->serie_id;
        $resultadoVisitante->tipo_serie_id = $this->tipo_serie_id;
        $resultadoVisitante->fecha_fixture = $this->fecha_fixture_id;

        if ($this->goles_local > $this->goles_visitante) {
            $resultadoLocal->puntos = 3;
            $resultadoVisitante->puntos = 0;
        } elseif ($this->goles_local < $this->goles_visitante) {
            $resultadoLocal->puntos = 0;
            $resultadoVisitante->puntos = 3;
        } else {
            $resultadoLocal->puntos = 1;
            $resultadoVisitante->puntos = 1;
        }




        $resultadoLocal->save();
        $resultadoVisitante->save();
    }


    public function clubLocal()
    {
        return $this->belongsTo(Club::class, 'club_local_id');
    }

    public function clubVisitante()
    {
        return $this->belongsTo(Club::class, 'club_visitante_id');
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function tipoSerie()
    {
        return $this->belongsTo(TipoSerie::class);
    }





}
