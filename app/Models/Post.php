<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    /**
     * Get content of the post page based pn passed slug value
     *
     * @param  string $slug Post page slug
     *
     * @throws ModelNotFoundException if post page is not exists
     *
     * @return string $post page htm: content
     */
    public static function find(string $slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 3600, fn() => file_get_contents($path));
    }
}
