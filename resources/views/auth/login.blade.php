{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-base-layout>

    <!--main area-->
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                <x-jet-validation-errors class="mb-4" />
                                <form name="frm-login" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Log in to your account</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-uname">Email Address:</label>
                                        <input type="email" id="frm-login-uname" name="email"
                                            placeholder="Type your email address" :value="old('email')" required
                                            autofocus>
                                    </fieldset>
                                    
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">Password:</label>
                                        <input type="password" id="frm-login-pass" name="password"
                                            placeholder="************" required autocomplete="current-password">
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                            <a class="link-function right-position" href="{{ route('register') }}"
                                                title="Forgotten password?">Don't have account?</a>
                                            <a class="link-function left-position" href="{{ route('password.request') }}"
                                                title="Forgotten password?">Forgotten password?</a>
                                        <div class="form-group mt-5">
                                            {!! NoCaptcha::renderJs('in', false, 'recaptchaCallback') !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                    {!! NoCaptcha::renderJs('en', false, 'onloadCallback') !!}
                                    {!! NoCaptcha::display() !!}
                                    </fieldset>

                                    <input type="submit" class="btn btn-submit" value="Login" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end main products area-->
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <!--main area-->

</x-base-layout>

<<<<<<< HEAD
<script type="text/javascript">
    var onloadCallback = function() {
      alert("grecaptcha is ready!");
    };

    $('#frm-login-pass').keypress(function(e) { 
    var s = String.fromCharCode( e.which );
    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
        alert('The Capslock is on Bro');
    }
    });
=======
<script>
    document.querySelector("#frm-login-pass").addEventListener('keyup', checkCapsLock);
    document.querySelector("#frm-login-pass").addEventListener('mousedown', checkCapsLock);

    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }

    function checkCapsLock(e) {
        if (e.getModifierState('CapsLock'))
            alert('Caps Lock is turned on');
    }
>>>>>>> 52eb8bf53a9844fd1906d8ee2cfc2455f7efbfb3
</script>
