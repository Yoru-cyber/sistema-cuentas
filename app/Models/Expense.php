<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
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
