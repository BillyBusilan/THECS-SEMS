@extends('borrower.navbar')
@section('content')
    <head>
        @vite([
            'resources/css/components/sidebar.css',
            'resources/css/components/main.css',
        ])
    </head>
    <body class="admin-body">

        <main class="main-content">
            <div class="welcome-card">
                <h1 class="welcome-title">Home Page</h1>
                <p class="welcome-subtitle">
                    Welcome to University of Baguio's Sports Equipment Management System
                </p>
            </div>
        </main>
    </body>
@endsection

<script>
    // Add smooth scrolling and animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate navbar on scroll
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            const currentScroll = window.pageYOffset;
            
            if (currentScroll <= 0) {
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.15)';
            }
            
            lastScroll = currentScroll;
        });

        // Add entrance animation
        const homeCard = document.querySelector('.home-card');
        homeCard.style.opacity = '0';
        homeCard.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            homeCard.style.transition = 'all 0.8s ease';
            homeCard.style.opacity = '1';
            homeCard.style.transform = 'translateY(0)';
        }, 300);
    });
</script>