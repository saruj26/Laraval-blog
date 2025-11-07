<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    // Allow mass-assignment of category_id when creating posts via seeders or factories
    protected $fillable = ['title', 'content', 'img_url', 'slug', 'category_id'];

    // Use the booted method so Eloquent's trait initializers are set up properly.
    protected static function booted(): void
    {
        static::creating(function ($post) {
            $base = Str::slug($post->title);
            $slug = $base;
            $count = static::query()->where('slug', 'like', $base . '%')->count();
            if ($count > 0) {
                $slug = $base . '-' . ($count + 1);
            }
            $post->slug = $slug;
        });
    }
}
