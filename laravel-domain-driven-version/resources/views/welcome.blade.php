<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posyandu Data Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/swagger-ui.css" />
    <link rel="icon" type="image/svg+xml" href="/laravel.svg" />
</head>

<body>
    <div id="swagger-ui"></div>

    <script src="/swagger-ui-bundle.js"></script>
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: "openapi.yml",
                dom_id: "#swagger-ui",
            });
        };
    </script>
</body>

</html>
