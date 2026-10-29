<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Login · Golden Pride</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main class="login-page">
        <section class="login-art">
            <a class="brand" href="{{ route('login') }}">
                <img src="{{ asset('uploads/logo.png') }}" alt="G" width="15%">
                <span>Golden Pride<small>ASSET MANAGEMENT</small></span>
            </a>

            <div>
                <div class="eyebrow" style="color: #adc1ff">
                    INVENTORY CONTROL, SIMPLIFIED
                </div>
                <h1>Every asset.<br>One clear view.</h1>
                <p>
                    Manage company equipment, software licenses, employee
                    assignments and maintenance records in one practical workspace.
                </p>
            </div>

            <small style="color: #9db0d1">
                Golden Pride Inventory Management · Demo edition
            </small>
        </section>

        <section class="login-card-wrap">
            <form class="login-card" id="loginForm" action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div class="eyebrow">Welcome back</div>
                <h2>Sign in to Asset Management</h2>
                <p style="color: #949494;">Enter your account details to access the management workspace.</p>
                @if (session('success'))
                    <div class="footer-note" style="color: #198754" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @error('login')
                    <div class="footer-note" id="login-error" style="color: #b83333" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <div class="field">
                    <label for="user_name">Username</label>
                    <input autocomplete="username" id="user_name" name="user_name" placeholder="Enter username"
                        type="text" value="{{ old('user_name') }}" autofocus required>
                    @error('user_name')
                        <div class="footer-note" style="color: #b83333" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input autocomplete="current-password" id="password" name="password" placeholder="Enter password"
                        type="password" required>
                    @error('password')
                        <div class="footer-note" style="color: #b83333" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn primary" id="loginButton" style="width: 100%; padding: 12px" type="submit">
                    Sign In →
                </button>

            </form>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const button = document.getElementById('loginButton');

            if (!form || !button) return;

            form.addEventListener('submit', function() {
                if (!form.checkValidity()) return;
                button.disabled = true;
                button.textContent = 'Signing In...';
            });
        });
    </script>
</body>

</html>
