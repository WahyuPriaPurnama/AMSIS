@if (session()->has('alert'))
    <div class="alert alert-success my-3">
        {{ session()->get('alert') }}
    </div>
@endif
<div class="card shadow border-0">
    <div class="card-header border-0">
        <b> {{ $header }} </b>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
