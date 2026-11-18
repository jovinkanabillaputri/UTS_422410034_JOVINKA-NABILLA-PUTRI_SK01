<div class="content-card">
    @if (isset($title))
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</div>