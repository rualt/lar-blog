<x-layout>
    <article>
        <article>
            <h1>
                {{ $post->title }}
            </h1>
            <p>
                {!! $post->body !!}
            </p>
        </article>
    </article>

    <a href="/">Go Back</a>
</x-layout>
