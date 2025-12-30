<!DOCTYPE html>
<!-- <html lang="ar" dir="rtl"> -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <style>
            body{
                min-height:100vh;
                background:#f1f5f9;
                display:flex;
                align-items:center;
                justify-content:center;
            }
            .auth-card{
                width:100%;
                max-width:420px;
                border-radius:16px;
            }
            .form-control{
                border-radius:10px;
            }
        </style>
        @yield('css')
        
    </head>
    <body>

    <div class="card auth-card shadow-sm">
        @yield('content')
    </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('javascript')
    </body>
</html>
