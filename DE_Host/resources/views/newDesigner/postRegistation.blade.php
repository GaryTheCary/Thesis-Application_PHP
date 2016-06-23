<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/registCompanion.css">
</head>
<body>

    {{--Master Layout for Designer Related Files--}}
    <div class="navigation"></div>
    <div class="logoholder">
        <img src="/assets/logo/logo.svg" alt="">
    </div>
    <div class="spaceholder"></div>
    <div class="description">
        <p>{{$description}}</p>
    </div>
    <div class="spaceholder"></div>
    <div id="link">
        <a href="{{$url}}">CLICK HERE PLEASE !!</a>
    </div>
</body>
</html>