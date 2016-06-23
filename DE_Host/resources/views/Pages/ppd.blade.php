@extends('Pages.master')

@section('scripts_stylesheets')

<script type="text/javascript" src="/bower/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/bower/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/bower/semantic/dist/semantic.js"></script>
<script type="text/javascript" src="/bower/d3/d3.min.js"></script>
<link rel="stylesheet" type="text/css" href="/bower/semantic/dist/semantic.css">
<link rel="stylesheet" type="text/css" href="/bower/animate.css/animate.css">
<link rel="stylesheet" type="text/css" href="/css/animation.css">
<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/dataanalysis_sub.css">

@endsection

@section('content')
<div class="analysis_area">
	<div class="visulization_section">
		<div class="upspaceholder"></div>
		<div class="bar_title">
			<div class="title"><p> R.(Rear)M.(Medial)H.(Hinder) Curve Graph</p></div>
			<div class="checkbox_panel">
				<div class="checkbox_field">
					<div class="ui checkbox">
						<input type="checkbox" name="normal" id="normal">
						<label>Normal</label>
					</div>
				</div>

				<div class="checkbox_field">
					<div class="ui checkbox">
						<input type="checkbox" name="rear" id="rear">
						<label>Rear</label>
					</div>
				</div>

				<div class="checkbox_field">
					<div class="ui checkbox">
						<input type="checkbox" name="medial" id="medial">
						<label>Medial</label>
					</div>
				</div>

				<div class="checkbox_field">
					<div class="ui checkbox">
						<input type="checkbox" name="hinder" id="hinder">
						<label>Hinder</label>
					</div>
				</div>

				<div class="checkbox_field">
					<div class="ui checkbox">
						<input type="checkbox" name="expectation" id="expectation">
						<label>Expect</label>
					</div>
				</div>

				<div class="vertical_line_holder">
					<img src="/assets/logo/vertical_line_2.png">
				</div>

				<div class="info_field">
					<div class="vertical_section">
						<img src="/assets/logo/yellow.png">
						<label>Rear</label>
					</div>

					<div class="vertical_section">
						<img src="/assets/logo/green.png">
						<label>Medial</label>	
					</div>

					<div class="vertical_section">
						<img src="/assets/logo/orange.png">
						<label>Hinder</label>
					</div>
				</div>
			</div>
		</div>
		<div class="spaceholder"></div>
		<div class="graph_section" id="stack_graph"></div>
	</div>

	<div class="information_section">
		<div class="description_pool">
			<div class="col">
				<div class="wrapper">
					<div>Active:<span id="active">22D</span></div>
					
					<div>Inacive:<span id="inactive">5D</span></div>
					
					<div>Rear Average: <span id="avgrear">350.7N</span></div>
					
					<div>Medial Average: <span id="avgmedial">195.7N</span></div>
					
					<div>Hinder Average: <span id="avghinder">78.3N</span></div>
				</div>
			</div>

			<div class="col">
				<div class="wrapper">
					<div>Rear Stable:<span id="starear">375.8N</span></div>
					
					<div>Medial Stable:<span id="stamedial">197.6N</span></div>
					
					<div>Hinder Stable: <span id="stahinder">82.5N</span></div>
					
					<div>Rear Expectation: <span id="exprear">366.2N</span></div>
					
					<div>Medial Expectation: <span id="expmedial">178.3N</span></div>
				</div>
			</div>

			<div class="col">
				<div class="wrapper">
					<div>Hinder Expectation:<span id="exphinder">102.8N</span></div>
					
					<div>Statisfaction Avergae:<span id="avgstatisfaction">67</span></div>
					
					<div>Staisfaction Expectation: <span id="expstatisfaction">72</span></div>
					
					<div>Statisfaction Trend: <span id="exprear">-</span></div>
					
					<div>Accuracy Level: <span id="expmedial">3</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/script/ppd.js"></script>
@endsection