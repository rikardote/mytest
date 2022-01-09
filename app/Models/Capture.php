<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Capture extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'incidencia_id',
        'qna_id',
        'periodo_id',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $casts = [
        'fecha_inicio'  => 'date:d/m/Y',
        'fecha_fin'  => 'date:d/m/Y'
    ];

    public function setFechaInicioAttribute( $value ) {
        //$this->attributes['fecha_inicio'] = (new Carbon($value))->format('Y-m-d');
        $this->attributes['fecha_inicio'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    public function setFechaFinAttribute( $value ) {
        $this->attributes['fecha_fin'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        //$this->attributes['fecha_fin'] = (new Carbon($value))->format('Y-m-d');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
    public function qna()
    {
        return $this->belongsTo(Qna::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
