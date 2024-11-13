<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'partido_id',
        'club_id',
        'serie_id',
        'tipo_serie_id',
        'fecha_fixture',
        'puntos',
        'goles_local',
        'goles_visitante'
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function tipoSerie()
    {
        return $this->belongsTo(TipoSerie::class);
    }


    public function clubnombre()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }



}
