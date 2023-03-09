<x-layout>
    <x-setting :heading="'Edit post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <div>
                <x-form.input name="featured_image" type="file" />
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="post featured image" width="300">
                </div>
            </div>

            <x-form.select name="category_id" label="Category" :options="$categories" :selected="$post->category->id" />

            <x-form.submit-button label="Update" />

        </form>
    </x-setting>
</x-layout>
