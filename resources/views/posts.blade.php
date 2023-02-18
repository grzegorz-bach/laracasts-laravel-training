    <x-layout>

        <x-header />

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-featured-post-card :post="$posts->first()" />

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card :post="$post"  style="grid-column: span {{ $loop->iteration > 2 ? 2 : 3}}" />
                @endforeach
            </div>
        </main>
    </x-layout>
