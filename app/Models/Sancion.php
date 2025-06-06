<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    use HasFactory;
    protected $fillable = ['club_id','fecha_id','nombre','sancion','puntos','tipo_serie_id','serie_id','tipo_campeonato_id'];

    //relaciones
    public function club()
    {
        return $this->belongsTo(Club::class,'club_id','id');
    }
    public function fechafixture()
    {
        return $this->belongsTo(FechaFixture::class,'fecha_id','id');
    }

}
