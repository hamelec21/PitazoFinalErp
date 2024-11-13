<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSancion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id');
    }
}
