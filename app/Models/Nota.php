<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $fillable = ['club_id','tipo_sancion_id','descripcion','fecha_id'];

    public function club()
    {
        return $this->belongsTo(Club::class,'club_id','id');
    }
    public function fechafixture()
    {
        return $this->belongsTo(FechaFixture::class,'fecha_id','id');
    }

    function tipoSancion()
    {
        return $this->belongsTo(TipoSancion::class,'tipo_sancion_id','id');
    }
}
