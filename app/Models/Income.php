<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $table = 'income';
    protected $fillable = [
        'name',
        'value',
        'profit_id',
        'date',
    ];
    public function profit()
    {
        return $this->belongsTo(Profit::class);
    }
}
