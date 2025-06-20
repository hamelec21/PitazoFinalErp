<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FechaFixture extends Model
{
    use HasFactory;
    protected $fillable = ['fecha'];

    //Relaciones
    public function sancion()
    {
        return $this->hasMany(Sancion::class, 'id');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id');
    }


    public function fixtures(): HasMany
    {
        return $this->hasMany(Fixture::class);
    }
}
