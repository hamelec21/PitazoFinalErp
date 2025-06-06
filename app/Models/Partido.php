<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'tipo_campeonato_id',
        'temporada_id',
    ];

    // Relaciones
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

    public function tipoCampeonato()
    {
        return $this->belongsTo(TipoCampeonato::class);
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id');
    }


    public function partido(): HasOne
    {
        return $this->hasOne(Partido::class);
    }

    public function fixture(): BelongsTo
    {
        return $this->belongsTo(Fixture::class);
    }
}
