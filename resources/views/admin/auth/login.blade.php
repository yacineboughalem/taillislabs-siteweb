<!DOCTYPE html>

<html lang="fr">
<!-- Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') }} - {{ __('Login') }} </title>
    <!-- CSS Assets-->
   <!-- [Favicon] icon -->
   <link rel="icon" href="/admin/images/favicon.svg" type="image/x-icon">
   <!-- [Font] Family -->
   <link rel="stylesheet" href="/admin/fonts/inter/inter.css" id="main-font-link" />

   <!-- [Tabler Icons] https://tablericons.com -->
   <link rel="stylesheet" href="/admin/fonts/tabler-icons.min.css" />
   <!-- [Feather Icons] https://feathericons.com -->
   <link rel="stylesheet" href="/admin/fonts/feather.css" />
   <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
   <link rel="stylesheet" href="/admin/fonts/fontawesome.css" />
   <!-- [Material Icons] https://fonts.google.com/icons -->
   <link rel="stylesheet" href="/admin/fonts/material.css" />
   <!-- [Template CSS Files] -->
   <link rel="stylesheet" href="/admin/css/style.css" id="main-style-link" />
   <link rel="stylesheet" href="/admin/css/style-preset.css" />

</head>

<body class="login">
    {{-- <div class="container sm:px-10">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="#" class="-intro-x flex items-center pt-5">
                        <span class="text-white text-lg ml-3"> Azrou DESIGN </span>
                    </a>
                    <div class="my-auto">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Encore quelques clics pour
                            <br>
                            vous connecter à votre compte.
                        </div>
                    </div>
                </div>
                <!-- Login Form -->

                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                        @if ($errors->any())
                            <div class="text-red-700">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> <strong> {{ $error }} </strong> </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            {{ __('Login') }}
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Encore quelques clics pour vous
                            connecter à votre compte.</div>
                        <div class="intro-x mt-8">
                            <input name="email" type="text"
                                class="intro-x login__input input input--lg border border-gray-300 block @error('email') border border-theme-6 @enderror"
                                placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-red-700" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input name="password" type="password"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('password') border border-theme-6 @enderror"
                                placeholder="{{ __('Password') }}" name="password">

                            @error('password')
                                <span class="text-red-700" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" name="remember" id="remember-me"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none"
                                    for="remember-me">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit"
                                class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                                {{ __('Login') }} </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div> --}}


    <div class="auth-main">
        <div class="auth-wrapper v2">
            <div class="auth-sidecontent" style="width: 40%">
                <img src="/animation.gif" alt="images"
                    class="img-fluid img-auth-side" style="object-fit: cover;">
            </div>
            <form method="POST"  class="auth-form" action="{{ route('admin.login') }}">
                @csrf
                <div class="card my-5">
                    @if ($errors->any())
                    <div class="text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> <strong> {{ $error }} </strong> </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group mb-3 has-validation">
                            <input type="email" class="form-control @error('email')  @enderror" id="floatingInput" placeholder="Email Address" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-red-700" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3 has-validation">
                            <input type="password" class="form-control" id="floatingInput1" placeholder="Password"  name="password" >
                            @error('password')
                                <span class="text-red-700" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" name="remember" id="remember-me"
                                {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember-me">Remember me?</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>


        <!-- [Page Specific JS] start -->
        <script src="/admin/js/plugins/apexcharts.min.js"></script>
        <script src="/admin/js/pages/dashboard-default.js"></script>
        <!-- [Page Specific JS] end -->
        <!-- Required Js -->
        <script src="/admin/js/plugins/popper.min.js"></script>
        <script src="/admin/js/plugins/simplebar.min.js"></script>
        <script src="/admin/js/plugins/bootstrap.min.js"></script>
        <script src="/admin/js/fonts/custom-font.js"></script>
        <script src="/admin/js/config.js"></script>
        <script src="/admin/js/pcoded.js"></script>
        <script src="/admin/js/plugins/feather.min.js"></script>
</body>

</html>
