document.addEventListener('DOMContentLoaded', function(){
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
            securityText: "Ang inyong login credentials ay protektado ng CSRF at encryption. Huwag ibahagi ang inyong detalye."
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

    window.toggleLanguage = toggleLanguage;

    const passwordInput = document.getElementById('passwordInput');
    const passwordToggle = document.getElementById('passwordToggle');

    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        this.textContent = type === 'password' ? '👁️' : '🙈';
        
        this.setAttribute('aria-label', type === 'password' ? 'Show password' : 'Hide password');
    });
});