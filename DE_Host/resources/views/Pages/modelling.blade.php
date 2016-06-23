@extends('Pages.master')

@section('scripts_stylesheets')
<script type="text/javascript" src="{{asset('/bower/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower/bootstrap/dist/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower/semantic/dist/semantic.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower/d3/d3.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/bower/semantic/dist/semantic.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/bower/animate.css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/animation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/modelling.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/dataanalysis_sub.css')}}">

<!-- load thress.js for modelling support -->
<script type="text/javascript" src="/bower/three.js/build/three.min.js"></script>
<script type="text/javascript" src="/bower/three.js/examples/js/libs/stats.min.js"></script>
<script type="text/javascript" src="/bower/three.js/examples/js/libs/dat.gui.min.js"></script>
<script type="text/javascript" src="/bower/three.js/examples/js/controls/OrbitControls.js"></script>
<script type="text/javascript" src="/bower/three.js/examples/js/Detector.js"></script>
<script type="text/javascript" src="/bower/three.js/examples/js/controls/TrackballControls.js"></script>
<script type="text/javascript" src="{{ asset('/bower/three.js/examples/js/loaders/OBJLoader.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>
@endsection

@section('content')

<div class="analysis_area">
	<div class="upspaceholder"></div>
	<div class="bar_title">
		<table>
			<tr>
				<td>Recommendation Changes in its Current Shape &nbsp; &nbsp;</td>
				<td>
					<button class="ui mini button inverted orange" id="btnUpdate">Update</button>
				</td>
			</tr>
		</table>
	</div>
	<div class="spaceholder"></div>
	<div class="graph_section" id="stack_graph"></div>
</div>
<script type="text/javascript" src="/script/footwearShape.js"></script>
	<script type="text/javascript">
		var socket = io('http://192.168.10.10:3000');
		socket.on('data', function(message){
			console.log(message);
		});
	</script>
@endsection
