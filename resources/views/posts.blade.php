<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                <a href="#">
                    {{ $post->category->name }}
                </a>
            </p>
            <p>
                {{ $post->excerpt }}
            </p>
        </article>
    @endforeach
</x-layout>
