@props(['name'])

<label for="{{ $name }}" class="block mb-2 uppercase font-bold text-sx text-gray-700">
    {{ ucwords(str_replace(['_', '-'], ' ', $name)) }}
</label>
