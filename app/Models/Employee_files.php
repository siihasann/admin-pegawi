<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee_files extends Model
{
    protected $fillable = [
        'employee_id',
        'file_type',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
    ];

    public function employees():BelongsTo
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
    use HasFactory;
}
