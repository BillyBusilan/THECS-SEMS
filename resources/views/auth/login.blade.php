@vite('resources/js/app.js')
@extends('layout.layout')

@section('content')
    <div class="login-page">
        <form class="login-form" method="POST" action="{{route('logincontroller')}}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-form__language-toggle" onclick="toggleLanguage()">
                <span id="currentLang">EN</span> 🌐
            </div>
            
            <div class="login-form__logo-container">
                <img class="login-form__logo" src="{{ asset('images/University of Baguio Logo.png') }}" alt="University of Baguio Logo">
            </div>
            
            <div class="login-form__header-container">
                <h1 class="login-form__title" id="systemTitle">Sports Equipment Management System</h1>
            </div>

            <div class="login-form__header-container">
                <h2 class="login-form__subtitle" id="systemSubtitle">Please login using your UB portal account</h2>
            </div>

            <div class="login-form__input-container">
                <input class="login-form__input" type="text" required="" name="idNumber">
                <label class="login-form__label">🪪 ID Number</label>
                @error('idNumber')
                    <span class="error-message">{{$message}}</span>
                @enderror
            </div>

            <div class="login-form__input-container">
                <input class="login-form__input" type="password" required="" name="password" placeholder=" ">
                <label class="login-form__label">🔒 Password </label>
                @error('password')
                    <span class="error-message">{{$message}}</span>
                @enderror
            </div>

            <div class="login-form__checkbox-container">
                <input class="login-form__checkbox" type="checkbox" id="rememberMe">
                <label for="rememberMe" id="rememberLabel">Remember me on this device</label>
            </div>

            <div class="login-form__link-container">
                <button class="primary__button" type="submit" id="loginText">Login</button>
            </div>

            <div class="link__container">
                <a class="link" href="#" id="registerLink">Register</a>
                <a class="link" href="#" id="forgotLink">Forgot Password?</a>
            </div>

            <div class="info__container">
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