<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ranks extends Model
{

    protected $fillable = [
        'name',
        'lavel',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employees::class);
    }
    use HasFactory;
}
