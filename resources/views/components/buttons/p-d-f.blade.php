<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<a {{ $attributes->merge([
        'class' => 'btn btn-danger',
    ]) }} target="_blank" data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-title="Export PDF"><i class="bi bi-filetype-pdf"></i>
        {{ $slot }}
    </a>
</div>