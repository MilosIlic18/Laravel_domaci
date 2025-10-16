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
    <div class="min-h-screen bg-[rgb(16,24,40)]">
      @include('partials.navigation')
    
      <div class="container mx-auto py-[10px]">
        @yield('contents')
      </div>
    </div>
</body>
</html>