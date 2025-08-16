@php
    $dashboardIcon = '📊';
    $overviewIcon = '📋';
    $equipmentListIcon = '🏀' ;
    $addEequipmentIcon = '➕' ;
    $equipmentStatusIcon = '🔄';
    $categoriesIcon = '📦' ; 
    $reservationsIcon = '📅' ;
    $usersIcon = '👥' ;
    $reportsIcon = '📈';
    $maintenanceIcon = '🔧';
    $settingsIcon = '⚙️';
    $supportIcon = '💬';
@endphp

<nav class="sidebar">

    <div class="sidebar-header">
        <div class="logo"></div>
        <h2 class="system-title">Sport Equipment</h2>
        <p class="system-subtitle">Management System</p>
    </div>

    <div class="nav-menu">
        <div class="nav-section">
            <h3 class="nav-section-title">Main</h3>
            <x-nav-item href="#" icon="📊">
                Dashboard
            </x-nav-item>
            <x-nav-item href="#" :icon="$overviewIcon">
                Overview
            </x-nav-item>
        </div>

        <div class="nav-section">
            <h3 class="nav-section-title">Equipment</h3>
            <x-nav-item href="{{route('admin/equipment/index')}}" :icon="$equipmentListIcon">
                Equipment List
            </x-nav-item>
            <x-nav-item href="{{route('admin/equipment/create')}}" :icon="$addEequipmentIcon">
                Add Equipment
            </x-nav-item>
            <x-nav-item href="#" :icon="$equipmentStatusIcon">
                Equipment Status
            </x-nav-item>
            <x-nav-item href="#" :icon="$categoriesIcon">
                Categories
            </x-nav-item>
        </div>

        <div class="nav-section">
            <h3 class="nav-section-title"></h3>
            <x-nav-item href="#" :icon="$reservationsIcon">
                Reservations
            </x-nav-item>
            <x-nav-item href="#" :icon="$reservationsIcon">
                Users
            </x-nav-item>
            <x-nav-item href="#" :icon="$reservationsIcon">
                Reports
            </x-nav-item>
            <x-nav-item href="#" :icon="$maintenanceIcon">
                Maintenance
            </x-nav-item>
        </div>

        <div class="nav-section">
            <h3 class="nav-section-title">System</h3>
            <x-nav-item href="#" :icon="$settingsIcon">
                Settings
            </x-nav-item>
            <x-nav-item href="#" :icon="$supportIcon">
                Support
            </x-nav-item>
        </div>
    </div>

    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">JD</div>
            <div class="user-info">
                <div class="user-name">John Doe</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <form method="POST" action="{{route('logout')}}" style="display: inline;"> 
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</nav>




