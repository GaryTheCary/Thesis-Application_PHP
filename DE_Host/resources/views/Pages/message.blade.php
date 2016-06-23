@extends('Pages.master')

@section('scripts_stylesheets')
    <script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/message.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower/bower_components/sweetalert/dist/sweetalert.css">
@endsection

@section('content')
    <div class="spaceHolder"></div>
    <div class="logoholder animated fadeInDown">
        <img src="{!! asset('/assets/logo/logo.svg') !!}" alt="">
    </div>
    <div class="sSpaceholder"></div>
    <div class="messageContainer">
        {!! Form::open(['url' => 'message', 'id' => 'message', 'name' => 'message']) !!}
            @if($errors->has('user'))
                <div class="form-group has-error">
                    {!! Form::label('user', 'User') !!}
                    {!! Form::select('user', ['Max Diamegio' => 'Max Diamegio'], null, array('class' => 'form-control', 'id' => 'user')) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('user', 'User') !!}
                    {!! Form::select('user', ['Max Diamegio' => 'Max Diamegio'], null, array('class' => 'form-control', 'id' => 'user')) !!}
                </div>
            @endif

            @if($errors->has('title'))
                <div class="form-group has-error">
                    {!! Form::label('title', 'Topic') !!}
                    {!! Form::text('title',null, ['class' => 'form-control', 'id' => 'title']) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('title', 'Topic') !!}
                    {!! Form::text('title',null, ['class' => 'form-control', 'id' => 'title']) !!}
                </div>
            @endif

            @if($errors->has('body'))
                <div class="form-group has-error">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '3', 'placeholder' => 'content goes here']) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '3', 'placeholder' => 'content goes here']) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::submit('Send Message', ['id'=>'sumbitBtn', 'name'=>'submit', 'class' => 'form-control']) !!}
            </div>
        {!! Form::close() !!}

        <div class="sSpaceholder"></div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Errors:</span>
                    {{$error}}
                </div>
            @endforeach
        @endif
    </div>

    <script type="text/javascript" src="/bower/bower_components/sweetalert/dist/sweetalert.min.js"></script>

    @include('flash')
@endsection