<x-layout>
    <x-setting heading="Publish new post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <x-form.input name="featured_image" type="file" />

            <x-form.select name="category_id" label="Category" :options="$categories" />

            <x-form.submit-button label="Publish" />

        </form>
    </x-setting>
</x-layout>
