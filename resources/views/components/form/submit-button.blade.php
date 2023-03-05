@props(['label' => 'Submit'])

<x-form.field>
    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
        {{ $label }}
    </button>
</x-form.field>
