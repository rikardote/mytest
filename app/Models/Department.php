<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description'
    ];

    public function getCodeAttribute($value)
    {
        return str_pad($value, 5, '0', STR_PAD_LEFT);
    }

    public function getFullnameAttribute(){
        return "{$this->code} - {$this->description}";
    }


}
