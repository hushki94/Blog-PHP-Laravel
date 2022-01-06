@auth

    <x-panel>

        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex item-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full" />
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-10">
                <textarea name="body" class="w-full text-sm focus:outline-none focus-ring" rows="5"
                    placeholder="Write something" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>

                @enderror
            </div>
            <div class="flex justify-end border-t border-gray-200 pt-6">
                <x-submit-button>POST</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <strong><a href="/register">Register</a> </strong>or <strong><a href="/login">login</a> </strong>to leave a comment.
    </p>
@endauth
