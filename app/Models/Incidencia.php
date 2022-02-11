<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description'
    ];
    public function getCodeAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }
}
