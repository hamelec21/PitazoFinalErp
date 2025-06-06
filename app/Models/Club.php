<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'logo'];

    //Relaciones
    public function sancion()
    {
        return $this->hasMany(Sancion::class, 'id');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id');
    }

    public function sanciones()
    {
        return $this->hasMany(Sancion::class, 'club_id');
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . ltrim($this->logo, '/')) : null;
    }


    public function fixturesLocal(): HasMany
    {
        return $this->hasMany(Fixture::class, 'club_local_id');
    }

    public function fixturesVisita(): HasMany
    {
        return $this->hasMany(Fixture::class, 'club_visita_id');
    }
}
