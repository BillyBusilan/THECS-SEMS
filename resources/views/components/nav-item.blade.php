@props(['href' => '#', 'active' => false, 'icon' => null])

<div class="nav-item">
    <a href="{{ $href }}" class="nav-link {{ $active ? 'active' : '' }}">
        <span class="nav-icon">{{ $icon }}</span>
        {{ $slot }}
    </a>
</div>