@vite('resources/js/app.js')
@extends('Layout.layout')

@section('content')
    <div class="login-form">
        <form class="login-form__form" method="POST" action="{{route('logincontroller')}}">
            @csrf

            <div class="login-form__language-selector" onclick="toggleLanguage()">
                <span id="currentLang">EN</span> 🌐
            </div>
            
            <div class="login-form__image">
                <img class="login-form__logo" src="{{ asset('images/University of Baguio Logo.png') }}" alt="University of Baguio Logo">
            </div>
            
            <div class="login-form__header">
                <h1 class="login-form__title" id="systemTitle">UB PE Sports Equipment Management System</h1>
            </div>

            <div class="login-form__header">
                <h2 class="login-form__subtitle" id="systemSubtitle">Please login using your UB portal accounts</h2>
            </div>

            <div class="login-form__input-group">
                <input class="login-form__input" type="email" required="" name="email">
                <label class="login-form__label">🪪 ID Number</label>
            </div>

            <div class="login-form__input-group">
                <input class="login-form__input" type="password" required="" name="password" placeholder=" ">
                <label class="login-form__label">🔒 Password </label>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe" id="rememberLabel">Remember me on this device</label>
            </div>

            <div class="login-form__link-group">
                <button class="primary__button" type="submit" id="loginText">Login</button>
            </div>

            <div class="login-form__link-group">
                <a class="login-form__link" href="#" id="registerLink">Register</a>
                <a class="login-form__link" href="#" id="forgotLink">Forgot Password?</a>
            </div>

            <div class="security-info">
                <h4 id="securityHeader">👮 Security Notice</h4>
                <p id="securityText">Your login is protected by 2FA and encryption. Never share your credentials with anyone.</p>
            </div>
        </form>
    </div>
@endsection

@yield('script')
    <script>
        let currentLang = 'en';
        const translations = {
            en: {
                systemTitle: "UB PE Sports Equipment Management System",
                systemSubtitle: "Please login using your UB portal accounts",
                rememberLabel: "Remember me on this device",
                loginText: "Login",
                registerLink: "Register",
                forgotLink: "Forgot Password?",
                securityHeader: "👮 Security Notice",
                securityText: "Your login credentials are protected by 2FA and encryption. Never share your credentials with anyone."
            },
            fil: {
                systemTitle: "UB PE Sports Equipment Management System",
                systemSubtitle: "Mangyaring mag-login gamit ang inyong UB portal account",
                rememberLabel: "Tandaan ako sa device na ito",
                loginText: "Mag-login",
                registerLink: "Mag-rehistro",
                forgotLink: "Nakalimutan ang Password?",
                securityHeader:  "👮 Paalalang Pangseguridad",
                securityText: "Ang inyong login credentials ay protektado ng 2FA at encryption. Huwag ibahagi ang inyong detalye."
            }
        }

        function toggleLanguage() {
            currentLang = currentLang === 'en' ? 'fil' : 'en';
            document.getElementById('currentLang').textContent = currentLang.toUpperCase();
            updateLanguage();
        }

        function updateLanguage() {
            const t = translations[currentLang];
            document.getElementById('systemTitle').textContent = t.systemTitle;
            document.getElementById('systemSubtitle').textContent = t.systemSubtitle;
            document.getElementById('rememberLabel').textContent = t.rememberLabel;
            document.getElementById('loginText').textContent = t.loginText;
            document.getElementById('registerLink').textContent = t.registerLink;
            document.getElementById('forgotLink').textContent = t.forgotLink;
            document.getElementById('securityHeader').textContent = t.securityHeader
            document.getElementById('securityText').textContent = t.securityText;
        }
    </script>