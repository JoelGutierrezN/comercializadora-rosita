@if (session('info'))
    <div class="alert alert-success" role="alert">
        {{ session('info') }}
    </div>
@endif
