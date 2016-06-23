<html>
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <h1>Login</h1>

    @if(session()->has('message'))
        <div class="alert alert-info">
            {{session('message')}}
        </div>
    @endif

    <form action="/test/login" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="email">email address: </label>
            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="password">password: </label>
            <input type="text" name="password" id="password" class="form-control" value="{{old('password')}}">
        </div>

        <div class="form-group">
           <button type="submit">sign in</button>
        </div>

    </form>
</body>
</html>