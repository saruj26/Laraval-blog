<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

     protected static function booted(): void
{
    static::creating(function($category){
        $base = Str::slug($category->name);
        $slug = $base;
        $count = static::query()->where('slug', 'like', $base.'%')->count();
        if ($count > 0) {
            $slug = $base . '-' . ($count + 1);
        }
        $category->slug = $slug;
    });
}
}
