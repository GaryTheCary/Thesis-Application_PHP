<!DOCTYPE html>
<html>
  <head>
    <title>DE</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
    <script type="text/javascript" src="/bower/Snap.svg/dist/snap.svg.js"></script>
    <script type="text/javascript" src="/bower/three.js/build/three.min.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/Detector.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/libs/stats.min.js"> </script>
    <script type="text/javascript" src="/bower/three.js/examples/js/shaders/CopyShader.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/shaders/DigitalGlitch.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/postprocessing/EffectComposer.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/postprocessing/RenderPass.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/postprocessing/MaskPass.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/postprocessing/ShaderPass.js"></script>
    <script type="text/javascript" src="/bower/three.js/examples/js/postprocessing/GlitchPass.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
  </head>
  <body>
    <script type="text/javascript" src="/script/background.js"> </script>
    <div class="navigation"> </div>
    <svg class="logoholder animated fadeInDown"></svg>
    <script type="text/javascript" src="/script/svg.js"> </script>
    <div class="loginholder animated fadeInDown">
      <p>DESIGNER LOGIN</p>
    </div>
    <div class="formfield animated fadeInDown">
      {!! Form::open(['url' => '/loginProcess', 'class' => 'ui form', 'name' => 'login_form']) !!}
      {{--{!! csrf_field() !!}--}}
      @if($errors->has('userID_email'))
        <div id="formcell" class="field animated fadeInDown merror">
          {!! Form::text('email', null, ['placeholder' => 'EMAIL']) !!}
        </div>
      @else
        <div id="formcell" class="field animated fadeInDown">
          {!! Form::text('email', null, ['placeholder' => 'EMAIL']) !!}
        </div>
      @endif

      @if($errors->has('password'))
        <div id="formcell" class="field animated fadeInDown merror">
          {!! Form::password('password', ['placeholder' => 'PASSWORD']) !!}
        </div>
      @else
        <div id="formcell" class="field animated fadeInDown">
          {!! Form::password('password', ['placeholder' => 'PASSWORD']) !!}
        </div>
      @endif
        <div id="formcell" class="field animated fadeInDown">
          {!! Form::submit('LOGIN',['id' => 'loginBTN', 'class' => 'ui olive button hvr-shutter-out-horizontal']) !!}
        </div>
      {!! Form::close() !!}
    </div>
    <div class="optionsfield animated fadeInDown">
      <div id="forgotpassword" class="animated fadeInDown"><a href="{!! URL::to('forgetPassword') !!}">FORGOT PASSWORD?</a></div>
      <div id="signup" class="animated fadeInDown"><a href="{!! URL::to('designer') !!}">SIGN UP?</a></div>
    </div>
    @if($errors->any())
      @foreach($errors->all() as $error)
        <div class="sSpaceholder"></div>
        <div class="optionsfield animated fadeInDown">
          <div class="merror_list animated fadeInDown">
            {{$error}}
          </div>
        </div>
      @endforeach
    @endif
  </body>
</html>