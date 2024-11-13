<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['codigo','nombre','logo'];

    //Relaciones
    public function sancion()
    {
        return $this->hasMany(Sancion::class, 'id');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'id');
    }


    public function resultados()
    {
        return $this->hasMany(Resultado::class);
    }





}
