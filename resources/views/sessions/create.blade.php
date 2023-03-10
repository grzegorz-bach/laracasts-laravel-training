<x-layout>
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="current-password" />

                <x-form.submit-button label="Log In" />

                @error('login')
                    <p class="text-white bg-red-500 px-2 py-4 rounded-xl text-center text-xs mt-1">{{ $message }}</p>
                @enderror

                {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}
            </form>
        </x-panel>
    </main>
</x-layout>
