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
@endsection

@section('content')
<div class="spaceholder"></div>
<div class="userTitle"><img src="/assets/user/shoes.png" id="userprofile_poll">
  <div class="poolnameholder">"Flamingo Ver.II"</div>
</div>
<div class="mediumspaceholder"></div>
<div class="infopool">
  <div class="line"><img src="/assets/logo/line.svg"></div>
  <div class="infoTitle">
    <p>Firmware Info</p>
  </div>
  <div class="smallspaceholder"> </div>
  <div class="basicInfo">
    <div id="userid">FirmWare Version: v0.2.5</div>
    <div id="email">Stortage Capacity: 64GB</div>
    <div id="phone">Layers: Cushion(2) Sensing Matrix(1-8) Supporting(3)</div>
    <div id="age">Developer: Mio Nitakachi</div>
    <div id="sex">Maintain History: 2015-11-20</div>
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
    <div id="height">Height: 5cm</div>
    <div id="length">size: US - 7</div>
    <div id="width">Designer: Nara Chimota</div>
  </div>
  <div class="linetwo"> <img src="/assets/logo/line.svg"></div>
  <div class="editBTN">
    <button id="editbtn" class="ui mini olive button hvr-shutter-out-horizontal">EDIT</button>
  </div>
</div>
@endsection	