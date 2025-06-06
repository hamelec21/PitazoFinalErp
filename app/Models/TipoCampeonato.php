<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoCampeonato extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'is_active'];

    public function fixtures(): HasMany
    {
        return $this->hasMany(Fixture::class);
    }
}
