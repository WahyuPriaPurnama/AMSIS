@props(['label', 'name', 'items' => []])

@php
    $initialSelected = collect($items)->firstWhere('id', old($name . '_id'));
@endphp

<div x-data="autocompleteField(
    {{ Js::from($items) }},
    '{{ old($name . '_name') }}',
    {{ Js::from($initialSelected) }}
)" @click.outside="filtered = []" class="position-relative w-100" style="min-height: 3rem;">
    <label class="form-label">{{ $label }}</label>

    <input type="text" class="form-control @error($name . '_name') is-invalid @enderror" x-model="query" @input="filter"
        placeholder="Ketik {{ strtolower($label) }}..." />

    @error($name . '_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <ul x-show="filtered.length > 0" x-transition class="list-group position-absolute w-100 shadow"
        style="top: 100%; z-index: 1000; max-height: 200px; overflow-y: auto;">
        <template x-for="item in filtered" :key="item.id">
            <li @click="select(item)" class="list-group-item list-group-item-action" x-text="item.name"></li>
        </template>
    </ul>

    <div x-show="showAdd" class="mt-2">
        <button @click="addNew" class="btn btn-success">
            + "<span x-text="query"></span>"
        </button>
    </div>

    <input type="hidden" name="{{ $name }}_id" :value="selected?.id">
    <input type="hidden" name="{{ $name }}_name" :value="query">
</div>
