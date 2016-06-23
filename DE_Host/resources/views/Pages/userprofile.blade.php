@extends('Pages.master')
@section('scripts_stylesheets')
	<script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
	<script type="text/javascript" src="/bower/three.js/build/three.min.js"></script>
	<script type="text/javascript" src="/bower/three.js/examples/js/Detector.js"></script>
	<script type="text/javascript" src="/bower/three.js/examples/js/libs/stats.min.js">   </script>
	<link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
	<link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
	<link rel="stylesheet" type="text/css" href="/css/animation.css">
  <link rel="stylesheet" type="text/css" href="/css/app.css">

@section('content')
<div class="spaceholder"></div>
<div class="userTitle"><img src="/assets/user/profile.png" id="userprofile_poll">
  <div class="poolnameholder">Max Diamegio</div>
</div>
<div class="mediumspaceholder"></div>
<div class="infopool">
  <div class="line"><img src="/assets/logo/line.svg"></div>
  <div class="infoTitle">
    <p>Basic Information</p>
  </div>
  <div class="smallspaceholder"> </div>
  <div class="basicInfo">
    <div id="userid">User ID: #150798AZ</div>
    <div id="email">Email: maxdiemegio98@gmail.com</div>
    <div id="phone">Phone: 416-xxx-xxxx</div>
    <div id="age">Age: 45</div>
    <div id="sex">Sex: Female</div>
  </div>
  <div class="linetwo"><img src="/assets/logo/line.svg"></div>
  <div class="infoTitle">
    <p>Prev Product Info</p>
  </div>
  <div class="smallspaceholder"></div>
  <div class="productInfo">
    <div id="color">Color: Fushion (Brown, White)</div>
    <div id="angel">Angel: 132.7</div>
    <div id="material">Material: Fushion (Leather, PCA)</div>
    <div id="height">Height: 17cm</div>
    <div id="length">Length: 21cm</div>
    <div id="width">Width: 7cm</div>
  </div>
  <div class="linetwo"> <img src="/assets/logo/line.svg"></div>
  <div class="editBTN">
    <button id="editbtn" class="ui mini olive button hvr-shutter-out-horizontal">EDIT</button>
  </div>
</div>
@endsection
@endsection	

	