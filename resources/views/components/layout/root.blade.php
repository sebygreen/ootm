<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OotM Switzerland – {{ $title }}</title>
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="ootm.ch" />
        <link rel="manifest" href="/site.webmanifest" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        @font-face {
            font-family: Inter;
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url("{{ Vite::asset("resources/fonts/Inter.woff2") }}") format("woff2");
        }
    </style>
    {{ $slot }}
    <script async src="https://plausible.smkg.me/js/pa--awlQ9znbk2xZ8mZyxqGm.js"></script>
    <script>
        window.plausible=window.plausible||function(){(plausible.q=plausible.q||[]).push(arguments)},plausible.init=plausible.init||function(i){plausible.o=i||{}};
        plausible.init()
    </script>
</html>
