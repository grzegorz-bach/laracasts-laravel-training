@props(['name', 'label' => $name ])

<x-form.field>
    <x-form.label name="{{ $label }}" />

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        required
        class="border border-gray-200 p-2 w-full rounded"
    >
        {{ old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
