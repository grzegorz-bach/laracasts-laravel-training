<x-layout>
    <x-panel class="max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-8 text-blue-500 text-center uppercase">Publish new post</h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <x-form.input name="featured_image" type="file" />

            <x-form.select name="category_id" label="Category" :options="$categories" />

            <x-form.submit-button label="Publish" />

        </form>
    </x-panel>
</x-layout>
