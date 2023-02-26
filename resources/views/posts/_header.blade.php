<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <x-category-dropdown />

        <!-- Author -->
        <x-author-dropdown />

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/posts">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}" />
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}" />
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Find something" class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
