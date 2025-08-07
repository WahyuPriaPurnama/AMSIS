<div class="d-flex justify-content-end">
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-success']) }} target="_blank"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Simpan">
        <i class="bi bi-floppy-fill"></i> Simpan{{ $slot }}
    </button>
</div>
