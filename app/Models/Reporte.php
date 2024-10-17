<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'f', 'f_2', 'f_3', 'control', 'minutos', 'telefono', 'personal', 
        'fecha', 'salida', 'hora_salida', 'entrada', 'hora_entrada', 
        'direccion', 'solicitantes', 'pacientes1', 'pacientes2', 'pacientes3', 
        'fallecidos1', 'fallecidos2', 'edades', 'domicilios', 'escoltas', 
        'maternidad', 'transito', 'trabajo', 'accidente_otro1', 'accidente_otro2', 
        'hospital_roosevelt', 'hospital_general', 'hospital_igss', 'hospital_otro', 
        'radiotelefonista', 'pilotos', 'unidades', 'personal1', 'personal2', 
        'formalizado', 'conforme', 'vobo', 'razon1', 'razon2', 'sra1', 'sra2', 
        'dia', 'mes', 'anio', 'secretaria', 'observaciones', 'si_fallecido', 'no_fallecido'
    ];
}
