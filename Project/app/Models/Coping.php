<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coping extends Model
{
    use HasFactory;

    protected $fillable = [
        'results', 'group', 'name', 'lastname'
    ];
}
