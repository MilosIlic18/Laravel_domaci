<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>
<body>
    @include('partials.navigation')
    
        <section class="min-h-screen p-[10px] bg-gray-100">
            @yield('contents')
        </section>

    @include('partials.footer')
    
</body>
</html>