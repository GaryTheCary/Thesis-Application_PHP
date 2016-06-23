@extends('Pages.master')

@section('scripts_stylesheets')
<script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
<link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
<link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
<link rel="stylesheet" type="text/css" href="/css/animation.css">
<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/datamenu.css">
@endsection

@section('content')
<div class="section_container">
	<div class="upspaceholder"></div>
	<div class="content_description">
		<a href="{!! url('/datamenu/ppd') !!}">
			<div class="row">
				<div class="icon_section"><img src="/assets/logo/PPD.svg"></div>
				<div class="line_section">
					<span class="helper"></span>
					<img src="/assets/logo/vertical_line.svg">
				</div>
				<div class="title_section">
					<p>P.P.D (Planar Pressure Distribution) Analysis</p>
				</div>
			</div>
		</a>
		<div class="section_spaceholder"></div>
		<a href="{!! url('datamenu/cop') !!}">
			<div class="row">
				<div class="icon_section"><img src="/assets/logo/COP.svg"></div>
				<div class="line_section">
					<span class="helper"></span>
					<img src="/assets/logo/vertical_line.svg">
				</div>
				<div class="title_section">
					<p>C.O.P (Center of Pressure) Analysis</p>
				</div>
			</div>
		</a>
		<div class="section_spaceholder"></div>
		<a href="{!! url('datamenu/ma') !!}">
			<div class="row">
				<div class="icon_section"><img src="/assets/logo/MA.svg"></div>
				<div class="line_section">
					<span class="helper"></span>
					<img src="/assets/logo/vertical_line.svg">
				</div>
				<div class="title_section">
					<p>M.A (Muscle Activity) Analysis</p>
				</div>
			</div>
		</a>
	</div>
</div>
@endsection
