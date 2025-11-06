<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Backfill slug for posts where it's null
        DB::table('posts')->whereNull('slug')->orderBy('id')->chunkById(100, function ($posts) {
            foreach ($posts as $post) {
                $base = Str::slug($post->title ?: 'post');
                $slug = $base;

                // Ensure uniqueness: if slug exists, append the id
                $exists = DB::table('posts')->where('slug', $slug)->exists();
                if ($exists) {
                    $slug = $base . '-' . $post->id;
                }

                DB::table('posts')->where('id', $post->id)->update(['slug' => $slug]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op: we won't null existing slugs on rollback
    }
};
