<x-guest-layout>

    <div class="login-scene">

        <!-- Lamp -->
        <div class="lamp-area">
            <div class="lamp-light" id="lampLight"></div>

            <div class="lamp-stick"></div>

            <button type="button" class="lamp-button" id="lampButton">
                <span></span>
            </button>

            <p>Click the Lamp</p>
        </div>

        <!-- Login Form -->
        <div class="login-form" id="loginForm">

            <h2>Member Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="login-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="login-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
                </div>

                <!-- Remember -->
                <div class="remember-area">
                    <label for="remember_me">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Remember me</span>
                    </label>
                </div>

                <!-- Login -->
                <button type="submit" class="login-button">
                    Sign in
                </button>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <a
                        class="login-link"
                        href="{{ route('password.request') }}"
                    >
                        Forgot your password?
                    </a>
                @endif

                <!-- Register -->
                @if (Route::has('register'))
                    <a
                        class="login-link"
                        href="{{ route('register') }}"
                    >
                        Create an Account
                    </a>
                @endif

            </form>

        </div>

    </div>

    <script>
        const lampButton = document.getElementById('lampButton');
        const lampLight = document.getElementById('lampLight');
        const loginForm = document.getElementById('loginForm');

        lampButton.addEventListener('click', function () {

            document.body.classList.toggle('lamp-on');

            lampLight.classList.toggle('on');

            loginForm.classList.toggle('visible');

        });
    </script>

</x-guest-layout>