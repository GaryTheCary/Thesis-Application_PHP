<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up confirmation</title>
</head>
<body>
    <h1>Thanks for signing up!</h1>
    <p>
        We just need you to <a href='{{url("register/confirm/{$user->email_token}")}}'>Confirm your email address</a> real quick!
    </p>
</body>
</html>