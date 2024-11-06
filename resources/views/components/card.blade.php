@if (session()->has('alert'))
    <div class="alert alert-success my-3">
        {{ session()->get('alert') }}
    </div>
@elseif(session()->has('alert2'))
    <div class="alert alert-danger my-3">
        {{ session()->get('alert2') }}
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
