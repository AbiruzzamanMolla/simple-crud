<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upzilla extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'distict_id',
    ];
}
