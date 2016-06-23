//---------------------------------------------------------------
//
// 3D background
//
//
//---------------------------------------------------------------

(function(){
	
	if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
	var container, stats;
	var camera, scene, renderer, particles, geometry, materials = [], parameters, i, h, color, size;
	var composer;
	var particleTexture;
	var light;
	// get the shader of glitching
	var glitchPass;

	var mouseX = 0, mouseY = 0;

	var windowHalfX = $(window).width() / 2;
	var windowHalfY = $(window).height() / 2;

	init();
	animate();

	function updateOptions(){

		return glitchPass.goWild = true;
	}

	function init() {

		container = document.createElement('div');
		container.className = "threeDbg";
		document.body.appendChild( container );

		camera = new THREE.PerspectiveCamera( 75, $(window).width() / $(window).height(), 5, 1000);
		camera.position.z = 1000;

		scene = new THREE.Scene();
		scene.fog = new THREE.FogExp2(0x404040, 0.0012);
		scene.add(new THREE.AmbientLight(0x404040));

		geometry = new THREE.Geometry(1,4,4);

		// add light

		light = new THREE.DirectionalLight(0xffffff);
		light.position.set(1,1,1);
		scene.add(light);


		particleTexture = THREE.ImageUtils.loadTexture('/assets/logo/particle.png');


		for ( i = 0; i < 2000; i ++ ) {

			var vertex = new THREE.Vector3();
			vertex.x = Math.random() * 3000 - 1000;
			vertex.y = Math.random() * 2500 - 1000;
			vertex.z = Math.random() * 2000 - 1000;

			geometry.vertices.push( vertex );

		}


		parameters = [
			[ [1, 1, 0.5], 5 ],
			[ [0.95, 1, 0.5], 4 ],
			[ [0.85, 1, 0.5], 3 ],
			[ [0.75, 1, 0.5], 2 ],
			[ [0.65, 1, 0.5], 1 ]
		];
		for ( i = 0; i < parameters.length; i ++ ) {
			color = parameters[i][0];
			size  = parameters[i][1];
			console.log(color);
			materials[i] = new THREE.PointsMaterial( { size: size * Math.random(0,0.25)} );
			particles = new THREE.Points( geometry, materials[i] );
			particles.rotation.x = Math.random() * 16;
			particles.rotation.y = Math.random() * 6;
			particles.rotation.z = Math.random() * 6;

			scene.add( particles );

		}

		renderer = new THREE.WebGLRenderer({alpha: true});
		renderer.setPixelRatio( window.devicePixelRatio );
		renderer.setSize( $(window).width(), $(window).height() );
		container.appendChild( renderer.domElement );

		// add post processing

		composer = new THREE.EffectComposer(renderer);
		composer.addPass( new THREE.RenderPass( scene, camera ) );

		glitchPass = new THREE.GlitchPass();
		glitchPass.renderToScreen = true;
		composer.addPass( glitchPass );

		// end of the post processing 

		stats = new Stats();
		stats.domElement.style.position = 'absolute';
		stats.domElement.style.top = '0px';
		container.appendChild( stats.domElement );

		document.addEventListener( 'mousemove', onDocumentMouseMove, false );
		document.addEventListener( 'touchstart', onDocumentTouchStart, false );
		document.addEventListener( 'touchmove', onDocumentTouchMove, false );


		window.addEventListener( 'resize', onWindowResize, false );

	}

	function onWindowResize() {

		windowHalfX = $(window).width() / 2;
		windowHalfY = $(window).height() / 2;

		camera.aspect = $(window).width() / $(window).height();
		camera.updateProjectionMatrix();

		renderer.setSize( $(window).width(), $(window).height() );

	}

	function onDocumentMouseMove( event ) {

		mouseX = event.clientX - windowHalfX;
		mouseY = event.clientY - windowHalfY;

	}

	function onDocumentTouchStart( event ) {

		if ( event.touches.length === 1 ) {

			vent.preventDefault();

			mouseX = event.touches[ 0 ].pageX - windowHalfX;
			mouseY = event.touches[ 0 ].pageY - windowHalfY;

		}

	}

	function onDocumentTouchMove( event ) {

		if ( event.touches.length === 1 ) {

			event.preventDefault();

			mouseX = event.touches[ 0 ].pageX - windowHalfX;
			mouseY = event.touches[ 0 ].pageY - windowHalfY;

		}

	}


	function animate() {
		var time = Date.now() * 0.00005;
		requestAnimationFrame( animate );
		camera.position.x += ( mouseX - camera.position.x ) * 0.05;
		camera.position.y += ( - mouseY - camera.position.y ) * 0.05;

		camera.lookAt( scene.position );

		for ( i = 0; i < scene.children.length; i ++ ) {

			var object = scene.children[ i ];

			if ( object instanceof THREE.Points ) {

				object.rotation.y = time * ( i < 4 ? i + 1 : - ( i + 1 ) );
			}	

		}


		for ( i = 0; i < materials.length; i ++ ) {

			color = parameters[i][0];

			h = ( 360 * ( color[0] + time ) % 360 ) / 360;
			materials[i].color.setHSL( h, color[1], color[2]);

		}

		renderer.render( scene, camera );
		composer.render();
		stats.update();

	}

}).call(this);
