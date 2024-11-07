<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work_locations extends Model
{
    protected $fillable = [
        'name',
        'address'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employees::class);
    }
    use HasFactory;
}
