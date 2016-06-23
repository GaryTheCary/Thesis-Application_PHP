
variable = {
	
	group: null,
	container: null,
	controls: null,
	stats: null,
	particlesData: [],
	camera: null,
	scene: null,
	renderer: null,
	positions: null,
	colors: null,
	particles: null,
	pointCloud: null,
	particlePositions: null,
	linesMesh: null,
	maxParticleCount: 500,
	particleCount: 300,
	r: 800,
	rHalf: 400,
}

effectController = {
	showDots: true,
	showLines: true,
	minDistance: 150,
	limitConnections: false,
	maxConnections: 20,
	particleCount: 500
}


init=-> 

	variable.container = document.getElementById( 'stack_graph' )


	variable.camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 4000 )
	variable.camera.position.z = 1750

	variable.controls = new THREE.OrbitControls( variable.camera, variable.container )

	variable.scene = new THREE.Scene()


	variable.group = new THREE.Group()
	variable.scene.add( variable.group )

	variable.r = Math.floor(window.innerHeight)
	helper = new THREE.BoxHelper( new THREE.Mesh( new THREE.BoxGeometry( variable.r, variable.r, variable.r ) ) )
	helper.material.color.setHex( 0x080808 )
	helper.material.blending = THREE.AdditiveBlending
	helper.material.transparent = true
	variable.group.add( helper )

	segments = variable.maxParticleCount * variable.maxParticleCount

	variable.positions = new Float32Array( segments * 3 )
	variable.colors = new Float32Array( segments * 3 )

	pMaterial = new THREE.PointsMaterial( {
		color: 0xFFFFFF,
		size: 3,
		blending: THREE.AdditiveBlending,
		transparent: true,
		sizeAttenuation: false
	} )

	variable.particles = new THREE.BufferGeometry()
	variable.particlePositions = new Float32Array( variable.maxParticleCount * 3 )

	for i in [0...variable.maxParticleCount]

		if i <= 200 

			x = Math.random() * variable.r - variable.r / 2 
			y = Math.random() * variable.r - variable.r / 2
			z = Math.random() * variable.r - variable.r / 2  
		else
			x = 0
			y = 0
			z = 0


		variable.particlePositions[ i * 3     ] = x
		variable.particlePositions[ i * 3 + 1 ] = y
		variable.particlePositions[ i * 3 + 2 ] = z

		
		variable.particlesData.push( {
			velocity: new THREE.Vector3( 0, 0, 0 ),
			numConnections: 0
		} )
	

	variable.particles.setDrawRange( 0, variable.particleCount )
	variable.particles.addAttribute( 'position', new THREE.BufferAttribute( variable.particlePositions, 3 ).setDynamic( true ) )

	
	variable.pointCloud = new THREE.Points( variable.particles, pMaterial )
	variable.group.add( variable.pointCloud )

	geometry = new THREE.BufferGeometry()

	geometry.addAttribute( 'position', new THREE.BufferAttribute( variable.positions, 3 ).setDynamic( true ) )
	geometry.addAttribute( 'color', new THREE.BufferAttribute( variable.colors, 3 ).setDynamic( true ) )

	geometry.computeBoundingSphere()

	geometry.setDrawRange( 0, 0 )

	material = new THREE.LineBasicMaterial( {
		vertexColors: THREE.VertexColors,
		blending: THREE.AdditiveBlending,
		transparent: true
	} )

	variable.linesMesh = new THREE.LineSegments( geometry, material )
	variable.group.add( variable.linesMesh )

	

	variable.renderer = new THREE.WebGLRenderer( { antialias: true, alpha: true } )
	variable.renderer.setPixelRatio( window.devicePixelRatio )
	variable.renderer.setSize( window.innerWidth, window.innerHeight )

	variable.renderer.gammaInput = true
	variable.renderer.gammaOutput = true

	variable.container.appendChild( variable.renderer.domElement )

	

	variable.stats = new Stats()
	variable.stats.domElement.style.position = 'absolute'
	variable.stats.domElement.style.top = '0px'
	variable.container.appendChild( variable.stats.domElement )
	offsetX = -1 * window.innerWidth / 2.5
	offsetY = window.innerHeight / 4.00
	console.log offsetY
	console.log offsetX
	variable.group.position.set(offsetX, offsetY, 0)


	window.addEventListener( 'resize', onWindowResize, false )



onWindowResize =-> 
	variable.camera.aspect = window.innerWidth / window.innerHeight



animate =-> 

	vertexpos = 0
	colorpos = 0
	numConnected = 0

	for i in [0...variable.particleCount]
		variable.particlesData[ i ].numConnections = 0

	for i in [0...variable.particleCount]

		particleData = variable.particlesData[i]

		variable.particlePositions[ i * 3     ] += particleData.velocity.x
		variable.particlePositions[ i * 3 + 1 ] += particleData.velocity.y
		variable.particlePositions[ i * 3 + 2 ] += particleData.velocity.z

		variable.rHalf = variable.r / 2

		if variable.particlePositions[ i * 3 + 1 ] < -variable.rHalf || variable.particlePositions[ i * 3 + 1 ] > variable.rHalf 
			particleData.velocity.y = -particleData.velocity.y

		if variable.particlePositions[ i * 3 ] < -variable.rHalf || variable.particlePositions[ i * 3 ] > variable.rHalf 
			particleData.velocity.x = -particleData.velocity.x

		if variable.particlePositions[ i * 3 + 2 ] < -variable.rHalf || variable.particlePositions[ i * 3 + 2 ] > variable.rHalf 
			particleData.velocity.z = -particleData.velocity.z

		if effectController.limitConnections && particleData.numConnections >= effectController.maxConnections
			continue


		j = i+1
		for j in [0...variable.particleCount]

			particleDataB = variable.particlesData[ j ]
			if effectController.limitConnections && particleDataB.numConnections >= effectController.maxConnections 
				continue

			dx = variable.particlePositions[ i * 3     ] - variable.particlePositions[ j * 3     ]
			dy = variable.particlePositions[ i * 3 + 1 ] - variable.particlePositions[ j * 3 + 1 ]
			dz = variable.particlePositions[ i * 3 + 2 ] - variable.particlePositions[ j * 3 + 2 ]
			dist = Math.sqrt( dx * dx + dy * dy + dz * dz )

			if dist < effectController.minDistance 

				particleData.numConnections++
				particleDataB.numConnections++

				alpha = 1.0 - dist / effectController.minDistance

				variable.positions[ vertexpos++ ] = variable.particlePositions[ i * 3     ]
				variable.positions[ vertexpos++ ] = variable.particlePositions[ i * 3 + 1 ]
				variable.positions[ vertexpos++ ] = variable.particlePositions[ i * 3 + 2 ]

				variable.positions[ vertexpos++ ] = variable.particlePositions[ j * 3     ]
				variable.positions[ vertexpos++ ] = variable.particlePositions[ j * 3 + 1 ]
				variable.positions[ vertexpos++ ] = variable.particlePositions[ j * 3 + 2 ]

				variable.colors[ colorpos++ ] = alpha
				variable.colors[ colorpos++ ] = alpha
				variable.colors[ colorpos++ ] = alpha

				variable.colors[ colorpos++ ] = alpha
				variable.colors[ colorpos++ ] = alpha
				variable.colors[ colorpos++ ] = alpha

				numConnected++
			
		
	


	variable.linesMesh.geometry.setDrawRange( 0, numConnected * 2 )
	variable.linesMesh.geometry.attributes.position.needsUpdate = true
	variable.linesMesh.geometry.attributes.color.needsUpdate = true

	variable.pointCloud.geometry.attributes.position.needsUpdate = true

	requestAnimationFrame( animate )

	variable.stats.update()
	render()



render =-> 

	time = Date.now() * 0.001

	variable.group.rotation.y = time * 0.1
	# console.log variable.group.position
	variable.renderer.render( variable.scene, variable.camera )



init()
animate()


