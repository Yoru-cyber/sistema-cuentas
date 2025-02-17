<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Profit extends Model
{
    use HasFactory;
    protected $table = 'profit';
    protected $fillable = [
        'income',
        'total',
        'date',
    ];
    
}
