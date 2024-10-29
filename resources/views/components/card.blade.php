@if (session()->has('alert'))
    <div class="alert alert-success my-3">
        {{ session()->get('alert') }}
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
