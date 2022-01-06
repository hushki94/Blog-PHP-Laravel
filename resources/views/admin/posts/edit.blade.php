<x-layout>
    <x-setting :heading=" 'Edit Post: ' . $post->title">

        <x-panel>
            <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ $post->title }}" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                        value="{{ $post->slug }}" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                        Thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"
                        value="{{ $post->thumbnail }}">
                        
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <img src="{{  asset("storage/".$post->thumbnail) }}" alt="" class="rounded-xl">
                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="exerpt">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="exerpt" id="exerpt" required>
                    {{ $post->exerpt }}
                </textarea>
                    @error('exerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body"
                        value="{{ old('body') }}" required>
                    {{ $post->body }}
                </textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <strong>Current Category:</strong> {{$post->category->name}}
                </div>

                <div class="mb-6 mt-10">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{old('category_id' , $post->category_id)  == $category->id ? 'selected' : ''}}
                                >
                                {{ ucwords($category->name) }}</option>

                        @endforeach
                    </select>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 mt-10">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Publish
                    </button>

                </div>


            </form>
        </x-panel>
    </x-setting>

</x-layout>
