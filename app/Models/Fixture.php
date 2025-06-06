<?php

namespace App\Models;
// app/Models/Fixture.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fixture extends Model
{
    protected $fillable = [
        'tipo_campeonato_id',
        'serie_id',
        'club_local_id',
        'club_visita_id',
        'fecha_fixture_id',
    ];

    // 🔗 Relación con TipoCampeonato (Zona A / B)
    public function tipoCampeonato(): BelongsTo
    {
        return $this->belongsTo(TipoCampeonato::class);
    }

    // 🔗 Relación con Serie (Primera, Segunda, Sub-45, etc.)
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    // 🔗 Club local
    public function clubLocal(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_local_id');
    }

    // 🔗 Club visita
    public function clubVisita(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_visita_id');
    }

    // 🔗 Relación con FechaFixture (ej: FECHA 1, FECHA 2, etc.)
    public function fechaFixture(): BelongsTo
    {
        return $this->belongsTo(FechaFixture::class);
    }

    // 🔗 (Opcional) Relación con el Partido si se va a jugar
    public function partido()
    {
        return $this->hasOne(Partido::class);
    }
}
