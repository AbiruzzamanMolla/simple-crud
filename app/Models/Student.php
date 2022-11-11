<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'division_id',
        'distict_id',
        'upzilla_id',
    ];

    public function division(){
        return $this->belongsTo(Division::class);
    }
    public function distict(){
        return $this->belongsTo(Distict::class);
    }
    public function upzilla(){
        return $this->belongsTo(Upzilla::class);
    }
}
