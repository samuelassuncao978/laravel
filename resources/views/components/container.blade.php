<!doctype html>
<html class="h-full">

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#3d81f6">
    <meta name="theme-color" content="#3d81f6">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="turbolinks-cache-control" content="no-cache">

    <script defer src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js"></script>
 
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script src="https://unpkg.com/imask"></script>


    <script src="https://cdn.jsdelivr.net/npm/moment@2.26.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-timezone@0.5.31/builds/moment-timezone-with-data.min.js"></script>




    <script src="https://js.stripe.com/v3/"></script>

    <script src="https://sdk.twilio.com/js/video/releases/2.15.2/twilio-video.min.js"></script>



    <link href="https://unpkg.com/trix@1.2.3/dist/trix.css" rel="stylesheet">
    <script src="https://unpkg.com/trix@1.2.3/dist/trix.js" crossorigin="anonymous"></script>

    @if (!empty(env('SENTRY_DSN')))
        <script src="https://js.sentry-cdn.com/{{ env('SENTRY_DSN') }}.min.js" crossorigin="anonymous"></script>
    @endif
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
        body {
            touch-action: pan-y;
        }
      
    </style>
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">

    @livewireStyles
    @bukStyles()


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">


</head>

<body class="h-full bg-gray-600 scrollbar text-sm">
    {{ $slot ?? '' }}



    @livewireScripts
     @stack('scripts')
    <script src="{{ mix('js/app.js') }}" data-turbolinks-eval="false" data-turbo-eval="false"></script>

    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js" data-turbolinks-eval="false" data-turbo-eval="false">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js"
        integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('scripts')
</body>

</html>
