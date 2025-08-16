<div class="header-container">
    <div class="header-content">
        @if($icon)
            <span class="header-icon {{ $icon }}"></span>
        @endif
        <div class="header-text">
            <h1>{{ $title }}</h1>
            @if($subtitle)
                <p class="subtitle">{{ $subtitle }}</p>
            @endif
        </div>
    </div>

    @if($breadcrumbs)
        <nav class="breadcrumb">
            @foreach($breadcrumbs as $crumb)
                <span>{{ $crumb }}</span>
            @endforeach
        </nav>
    @endif

</div>