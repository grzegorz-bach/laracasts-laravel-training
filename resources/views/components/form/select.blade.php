@props(['name', 'label' => $name, 'options' => []])

<x-form.field>
    <x-form.label name="{{ $label }}" />

    <select name="{{ $name }}" id="{{ $name }}" class="w-full">
        @foreach ($options as $option)
            <option value="{{ $option->id }}"
                {{ old($name) === $option->id ? 'selected' : '' }}>
                {{ ucwords($option->name) }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</x-form.field>
