<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-info">
                {{session('message')}}
            </div>
        @endif

        <form action="/test" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
            </div>

            <div class="form-group">
                <label for="firstname">First Name: </label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name: </label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}">
            </div>

            <div class="form-group">
                <label for="phonenumber">Phone Number: </label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="{{old('phonenumber')}}">
            </div>

            <div class="form-group">
                <label for="imagefilepath">Image Path: </label>
                <input type="text" name="imagefilepath" id="imagefilepath" class="form-control" value="{{old('imagefilepath')}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </form>
    </div>
</body>
</html>