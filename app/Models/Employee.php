<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_empleado',
        'name',
        'first_lastname',
        'second_lastname',
        'fecha_ingreso',
        'job_id',
        'department_id',
        'schedule_id',
        'condition_id'
    ];

    protected $casts = [
        'fecha_ingreso'  => 'date:d/m/Y',
    ];

    public function setFechaIngresoAttribute( $value ) {
        $this->attributes['fecha_ingreso'] = (new Carbon($value))->format('Y-m-d');
      }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
