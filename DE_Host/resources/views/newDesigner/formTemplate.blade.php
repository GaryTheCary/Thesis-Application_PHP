<!DOCTYPE html>
<html>
<head>
    @yield('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Script file and stylesheets goes here -->
    <script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
    @yield('script_stylesheet')
</head>
<body>
    @yield('form')
</body>
</html>