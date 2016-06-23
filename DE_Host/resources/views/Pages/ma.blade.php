@extends('Pages.homepagemaster')

@section('scripts_stylesheets')
<script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
<link rel="stylesheet" type="text/css" href="/css/animation.css">
<link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
<link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
<link rel="stylesheet" type="text/css" href="/css/main.css">
@endsection

@section('content')
    <div class="navigation"></div>
    <div class="logoholder animated fadeInDown">
        <img src="{!! asset('/assets/logo/sorry.svg') !!}" alt="">
    </div>
    <div class="sSpaceholder"></div>
    <div class="messageHolder animated fadeInDown">
        <p>{{$message}}</p>
    </div>
    <div class="sSpaceholder"></div>
    <a href="{{url('/datamenu')}}">
        <div class="messageHolder animated fadeInDown">
            <p>{{$redirect}}</p>
        </div>
    </a>
@endsection