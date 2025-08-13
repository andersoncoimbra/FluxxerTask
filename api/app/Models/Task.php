<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'status'];

    protected $casts = [
        'status' => TaskStatus::class,
    ];
}
