@if (session()->has('alert'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ session()->get('alert') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('alert2'))
    <div class="alert alert-danger alert-dismissible fade show my-3">
        {{ session()->get('alert2') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card shadow">
    <div class="card-header">
        <b> {{ $header }} </b>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
