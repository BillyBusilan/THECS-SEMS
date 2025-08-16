@extends('landing')
@vite([
        'resources/css/components/navbar.css',
    ])
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="nav-logo">
            <span class="logo-text">UB <span class="logo-highlight">Sports</span></span>
        </a>
        
        <div class="nav-buttons">
            <a href="{{route('login')}}" class="nav-btn btn-login" >Login</a>
            <a href="#" class="nav-btn btn-register" onclick="showLogin">Register</a>
        </div>
    </div>
</nav>
