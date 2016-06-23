<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/registCompanion.css">
    <script type="text/javascript" src="{{asset('/bower/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/bower/bower_components/sweetalert/dist/sweetalert.css')}}">
</head>
<body>
    <div class="navigation"></div>
    <div class="logoholder">
        <img src="/assets/logo/logo.svg" alt="">
    </div>
    <div class="nSpaceholder"></div>
    <div class="description">
        <p>Please Type in Your Register Email Address</p>
    </div>
    <div class="nSpaceholder"></div>
    <div class="verify">
        {!! Form::open(['url'=>'forgetPassword/redirect', 'id'=>'email_verify', 'name'=>'email_verify']) !!}
            <div class="line"></div>
            <div class="nSpaceholder"></div>
            @if($errors->has('email'))
            <div class="section">
                <div class="tag">
                    <p>&nbsp; Email: &nbsp;</p>
                </div>
                <div class="ui mini input col error">
                    {!! Form::email('email') !!}
                </div>
            </div>
            @else
            <div class="section">
                <div class="tag">
                    <p>&nbsp; Email: &nbsp;</p>
                </div>
                <div class="ui mini input col">
                    {!! Form::email('email') !!}
                </div>
            </div>
            @endif
            <div class="nSpaceholder"></div>
            <div class="line"></div>
            <div class="nSpaceholder"></div>
            <div id="submitsection">
                <div class="ui input mini wcol">
                    <span class="helper"></span>
                    {!! Form::submit('submit', ['name' => 'submit', 'id' => 'sumbitBtn']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    @if($errors->has('email'))
        {{--<div class="error_list">--}}
            {{--<p>{!! $errors->first('email') !!}</p>--}}
        {{--</div>--}}
        <script type="text/javascript">
            swal({
                title: "Error!",
                text: "You Email Is Not Valid, Please Try Again",
                type: "error",
                confirmButtonText: "Cool"
            })
        </script>
    @endif
</body>
</html>