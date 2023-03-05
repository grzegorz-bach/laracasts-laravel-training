@props(['heading'])

<?php

$links = [['label' => 'All Posts', 'url' => 'admin/posts'], ['label' => 'New Post', 'url' => 'admin/posts/create']];

?>

<div class="py-8 flex mx-auto">
    <aside class="w-60 flex-shrink-0 mr-4">
        <h4 class="font-semibold mb-4 text-lg uppercase pb-4 border-b border-gray-200">Menu</h4>
        <ul>
            @foreach ($links as $link)
                <li>
                    <a href="/{{ $link['url'] }}"
                        class="{{ request()->is($link['url']) ? 'text-blue-500' : '' }}">{{ $link['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
    <main class="flex-1">
        <x-panel>
            <h1 class="text-lg font-bold mb-8 text-blue-500 text-center uppercase">{{ $heading }}</h1>
            {{ $slot }}
        </x-panel>
    </main>
</div>
