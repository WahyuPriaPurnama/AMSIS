<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <button type="submit" {{ $attributes->merge([
        'class' => 'btn btn-success',
    ]) }} target="_blank" data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-title="Simpan"><i class="bi bi-floppy-fill"></i>
        {{ $slot }}
    </button>
</div>