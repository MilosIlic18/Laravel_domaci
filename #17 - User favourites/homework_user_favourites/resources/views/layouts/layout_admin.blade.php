<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>@yield('title')</title>
</head>
<body>
     @include('partials.navigation_admin')
    <div class="min-h-screen m-[10px]">
        @yield('contents')
    </div>
    @include('partials.footer')
</body>
</html>