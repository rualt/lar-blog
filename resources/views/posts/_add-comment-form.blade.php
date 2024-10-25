@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex itemms-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">Your thoughts:</h2>
        </header>

        <div class="mt-6 p">
            <textarea
                name="body"
                class="w-full text-small focus:outline-none focus:ring p-1" 
                rows="5"
                placeholder="..."
                required
            ></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t botder-gray-200">
            <x-submit-button>Post</x-submit-button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline hover:text-blue-200 text-blue-400">Register</a> or
        <a href="/login" class="hover:text-blue-200 text-blue-400">log in</a> to leave a comment.
    </p>
@endauth

