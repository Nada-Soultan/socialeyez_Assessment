<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'description' , 'completed'];


public function scopeWhenSearch($query, $search)
{
    return $query->when($search, function ($q) use ($search) {
        return $q->where('title', 'like', "%$search%");

    });
}
}