@extends('Pages.homepagemaster')

@section('scripts_stylesheets')
<script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
<link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
<link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
<link rel="stylesheet" type="text/css" href="/css/animation.css">
<link rel="stylesheet" type="text/css" href="/css/homepage.css">

@endsection

@section('content')
<div class="container">
	<div class="upspaceholder"></div>
	<div class="supervisor">
		<div class="supervisor_img">
			<img src="/assets/user/supervisor.png">
		</div>
		<div class="description">
			<p>Welcome, <span id="nameholder">Nina</span></p>
		</div>
	</div>
	<div class="smallspaceholder"></div>
	<div class="function_section">
		<button class="ui compact pink icon button changecolor"><i class="add circle icon"></i></button>
		<button class="ui compact pink icon button changecolor"><i class="minus circle icon"></i></button>
	</div>
	<div class="smallspaceholder"></div>
	<div class="client_section">
		<div class="row">
			<a href="{!! url($redirect) !!}">
				<div class="coloumI">
					<div class="userIMG">
						<span class="helper"></span><img src="{{$userImage}}" id="profile_pic">
					</div>
					<div class="username">
						<p id="nameplacement">{{$userName}}</p>
					</div>
				</div>
			</a>
			<div class="coloumII"></div>
			<div class="coloumIII"></div>
			<div class="coloumIV"></div>
		</div>
		<div class="row">
			<div class="coloumIV"></div>
			<div class="coloumIII"></div>
			<div class="coloumII"></div>
			<div class="coloumI"></div>
		</div>
		<div class="row">
			<div class="coloumI"></div>
			<div class="coloumII"></div>
			<div class="coloumIII"></div>
			<div class="coloumIV"></div>
		</div>
	</div>
</div>
@endsection