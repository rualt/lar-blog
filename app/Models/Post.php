<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    /**
     * Get content of all Posts
     *
     * @return SplFileInfo
     */
    public static function all(): array
    {
        $files = File::files(resource_path('posts'));
        return array_map(
            fn ($file) => $file->getContents(),
            $files
        );
    }

    /**
     * Get content of the post page based pn passed slug value
     *
     * @param  string $slug Post page slug
     *
     * @throws ModelNotFoundException if post page is not exists
     *
     * @return string page html content
     */
    public static function find(string $slug): string
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 1, fn() => file_get_contents($path));
    }
}
