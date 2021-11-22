<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FormEditor') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/auth.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href=" {{ asset('logo/FormEditor.png') }} "/>
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('favicon.ico') }} "/>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- password check strength -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- password eye -->
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- ErrorMessage -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    
    <!-- ErrorMessageBanner -->
    @yield('error')
    
    <!-- Container Panel : Connexion & Inscription -->
    <div class="container @yield('mode')">
        <div class="forms-container">
            <div class="signin-signup">

                @yield('content')

            </div>
        </div>
    
        <!-- Container Panel : Gauche & Droite -->
        <div class="panels-container">

            <div class="panel left-panel">
                <div class="content">
                    <h3>Vous êtes nouveau ?</h3>
                    <p>
                        Vous pouvez visiter en tant qu'invité ou bien vous inscrire pour avoir accès à plus de fonctionnalitées !
                    </p>
                    <div class="centred">
                    <button class="btn transparent">
                        <a class="soft-link" href="{{ url('/') }}">
                            {{ __("Visiter en tant qu'invité") }}
                        </a>
                    </button>
                    <button class="btn transparent">
                        <a class="soft-link" href="{{ url('/register') }}">
                            {{ __("S'inscrire") }}
                        </a>
                    </button>
                    </div>
                </div>
                <img src="{{ asset('svg/office.svg') }}" class="image" alt="" />
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Vous avez déjà un compte ?</h3>
                    <p>
                        Connectez-vous sans plus attendre !
                    </p>
                    <button class="btn transparent">
                        <a class="soft-link" href="{{ url('/login') }}">
                            {{ __("Se connecter") }}
                        </a>
                    </button>
                </div>
                <img src="{{ asset('svg/secure_login.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

</body>
</html>