<x-layout>
    <x-panel class="max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-8 text-blue-500 text-center uppercase">Publish new post</h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                    Title
                </label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                    class="border boerder-gray-400 p-2 w-full">

                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                    Excerpt
                </label>
                <textarea name="excerpt" id="excerpt" required class="border border-gray-400 p-2 w-full">{{ old('excerpt') }}</textarea>

                @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                    Body
                </label>
                <textarea name="body" id="body" required class="border border-gray-400 p-2 w-full">{{ old('body') }}</textarea>

                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="featured_image" class="block mb-2 uppercase font-bold text-sx text-gray-700">Featured image</label>
                <input type="file" name="featured_image" id="featured_image" required />

                @error('featured_image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                    Category
                </label>
                <select name="category_id" id="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') === $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Publish
            </button>
        </form>
    </x-panel>
</x-layout>
