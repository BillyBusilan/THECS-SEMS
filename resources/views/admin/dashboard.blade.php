@extends('layout.layout')
@section('content')
    <head>
        <link href="{{ asset('css/components/sidebar.css') }}" rel="stylesheet">
    </head>
    <body class="admin-body">
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo"></div>
                <h2 class="system-title">Sport Equipment</h2>
                <p class="system-subtitle">Management System</p>
            </div>

            <div class="nav-menu">
                <div class="nav-section">
                    <h3 class="nav-section-title">Main</h3>
                    <div class="nav-item">
                        <a href="#" class="nav-link active">
                            <span class="nav-icon">📊</span>
                            Dashboard
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">📋</span>
                            Overview 
                        </a>
                    </div>
                </div>
                <div class="nav-section">
                    <h3 class="nav-section-title">Equipment</h3>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">🏀</span>
                            Equipment List
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">➕</span>
                            Add Equipment
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">🔄</span>
                            Equipment Status
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">📦</span>
                            Categories 
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                </div>
                <div class="nav-section">
                    <h3 class="nav-section-title"></h3>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">📅</span>
                            Reservations
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">👥</span>
                            Users
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">📈</span>
                            Reports
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">🔧</span>
                            Maintenance
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                </div>
                <div class="nav-section">
                    <h3 class="nav-section-title">System</h3>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">⚙️</span>
                            Settings
                            <span class="nav-badge"></span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">💬</span>
                            Support
                            <span class="nav-badge"></span>
                        </a>
                    </div>
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
                <button class="logout-btn">Logout</button>
            </div>
        </nav>

        <main class="main-content">
            <div class="welcome-card">
                <h1 class="welcome-title">Welcome Back!</h1>
                <p class="welcome-subtitle">
                    Your sports equipment management system is ready. Use the navigation sidebar to access different sections and manage your equipment efficiently.
                </p>
            </div>
        </main>
    </body>
@endsection

@yield('script')
<script>
    document.querySelectorAll('.nav-link').forEach(link=> {
        link.addEventListener('click',function(e){
            e.preventDefault();

            documnet.querySelectorAll('nav-link').forEach(l=>l.classList.remove('active'));

            this.classList.add('active');
        });
    });

    document.querySelectorAll('.nav-item').forEach(item=>{
        item.addEventListener('mouseenter', function(){
            this.style.transform = 'scale(1.02)';
        });

        item.addEventListener('mouseleave',function(){
            this.style.transform = 'scale(1)';
        });
    });

    document.querySelector('.logout-btn').addEventListener('click', function(){
        if(confirm('Are you sure you want to logout'){
            alert('Logging out...')
        });
    });
</script>