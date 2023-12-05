<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> {{ config('app.name') }} Admin - @yield('title') </title>

        <link rel="stylesheet" href="/admin/dist/css/app.css" />
        @yield('css')

    </head>
{{-- @if( Auth::user()->is_super ) bg-blue-800 @else bg-blue-800 @endif  --}}
    <body class="app ">
        <div class="flex">
            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- JS Assets-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="/admin/dist/js/app.js"></script>
        @yield('javascript')
    </body>
</html>
