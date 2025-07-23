<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <button type="button" {{ $attributes->merge([
        'class' => 'btn btn-danger',
    ]) }} target="_blank"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Data"><i class="bi bi-trash3-fill"></i>
        {{ $slot }}
    </button>
</div>
