<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    /**
     * __construct
     *
     * @param  string $title
     * @param  string $excerpt
     * @param  string $date
     * @param  string $body
     * @param  string $slug
     * @return void
     */
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    /**
     * Get date of each Posts (body and metadata)
     *
     * @return Object
     */
    public static function all(): iterable
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
            ))
            ->sortByDesc('date');
        });
    }

    /**
     * Get content of the post page based on passed slug value
     *
     * @param  string $slug Post page slug
     *
     * @return Post|null page body and metadata
     */
    public static function find(string $slug): Post|null
    {
        return static::all()->firstWhere('slug', $slug);
    }

    /**
     * Get content of the post page based pn passed slug value
     *
     * @param  string $slug Post page slug
     *
     * @throws ModelNotFoundException if post by slug is not exists
     *
     * @return Post page body and metadata
     */
    public static function findOrFail(string $slug): Post
    {
        $post = static::find($slug);

        if (is_null($post)) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
