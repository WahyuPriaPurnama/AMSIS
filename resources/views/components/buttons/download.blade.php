<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <a {{ $attributes->merge([
        'class' => 'btn btn-success',
    ]) }} target="_blank" data-bs-toggle="tooltip" data-bs-title="Download File"><i class="bi bi-download"></i>
        {{ $slot }}
    </a>
</div>
