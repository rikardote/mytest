<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

    protected $fillable = ['qna','year','description', 'active'];

    public function getDescriptionAttribute(){
        return " {$this->qna}/{$this->year} ";
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtoupper($value);
    }
}
