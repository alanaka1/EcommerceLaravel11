<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>404 | Not Found</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('Backend/assets/PageNotFound.css') }}">
    </head>

    <body class="d-flex align-items-center justify-content-center">

        <div class="shape one"></div>
        <div class="shape two"></div>

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center glass-card">
                    <div class="error">404</div>
                    <h2 class="mb-3">Sorry! Page not found</h2>
                    <p class="opacity-75 mb-4">The page may have been deleted or its link changed, check the title or go back to the homepage. </p>

                    <a href="/" class="btn btn-glow me-2">Home</a>
                    <a href="javascript:history.back()" class="btn btn-outline-light">Return Back</a>
                </div>
            </div>
        </div>

    </body>
</html>