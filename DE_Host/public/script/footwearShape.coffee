variable = {
	container: null,
	stats: null,
	camera: null,
	scene: null,
	renderer: null,
	controls: null,
}

GUIController = {
	Red: "X Axis",
	Green: "Y Axis",
	Blue: "Z Axis",
	Heel_Height: 17.5,
	Angle: 132.75,
	updateBtn: ()-> alert "data updated"
}

data = {}

# define an array that give offset value when it needed 
# this array will be updated when "Update Button clicked"
adjust = []

# retriveLiveData =->
# 	# get data from the database when requested 
# 	objBtn = document.getElementById "btnUpdate"
# 	if condition
# 	   # body... 

# provide a GUI to present information and update information 

initGUI =->

	gui = new dat.GUI()

	# container = document.getElementById "stack_graph"
	# element = document.createElement "div"
	# element.setAttribute("style", "position: fixed; z-index: 999")
	# element.appendChild gui.domElement
	# container.appendChild element
	description = gui.addFolder('Axis Description')
	description.add(GUIController, "Red")
	description.add(GUIController, "Green")
	description.add(GUIController, "Blue")
	controlFolder = gui.addFolder('Slide Control')
	heelsEvent = controlFolder.add(GUIController, "Heel_Height", 0, 35)
	angelEvent = controlFolder.add(GUIController, "Angle", 90, 180)
	btnFolder = gui.addFolder('Button Control')
	btnFolder.add(GUIController, "updateBtn")

	heelsEvent.onFinishChange((value)-> heelHeight(value))
	angelEvent.onFinishChange((value)-> angelOPen(value))

# heels change and calculation 
heelHeight = (value)->
	alert "the new value is : " + value
angelOPen = (value)->
	alert "the new value is : " + value

init =->

	variable.container = document.getElementById "stack_graph"
	variable.scene = new THREE.Scene()
	variable.camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1000)
	variable.controls = new THREE.OrbitControls( variable.camera, variable.container )
	variable.camera.position.set(14,34, -134)
	variable.camera.lookAt(new THREE.Vector3(0, 0, 0))
	variable.renderer = new THREE.WebGLRenderer({alpha: true, antialias: true})
	variable.renderer.setSize(window.innerWidth, window.innerHeight)
	variable.container.appendChild(variable.renderer.domElement)

	# drawModelOutline()
	drawShape(adjust)

	axes = buildAxes(1000)
	variable.scene.add axes

	variable.renderer.render(variable.scene, variable.camera)
	window.addEventListener( 'resize', onWindowResize, false )

onWindowResize =->
	variable.camera.aspect = (window.innerWidth / window.innerHeight)
	variable.camera.updateProjectionMatrix()
	variable.renderer.setSize( window.innerWidth, window.innerHeight )
	variable.controls.handleResize()
	render()	


animate =->
	# console.log variable.camera.position
	requestAnimationFrame( animate )
	variable.controls.update()
	render()

render =->
	variable.renderer.render(variable.scene, variable.camera)

drawShape = (adjust)->
	
	mShape = new THREE.Shape()
	mShape.moveTo(0, 0)
	mShape.bezierCurveTo(20.4,0,32.4,10.8,50.4,18)
	mShape.moveTo(50.4,18)
	mShape.bezierCurveTo(51, 22.2, 50.4, 25.2, 46.8, 33.6)
	mShape.moveTo(46.8, 33.6)
	mShape.bezierCurveTo(19.8, 12.6, 18, 12, 12, 13.8)
	mShape.moveTo(12, 13.8)
	mShape.bezierCurveTo(5.4, 7.2, 1.8, 3.6,0,0)
	mShape.moveTo(0,0)


	geometry = new THREE.ShapeGeometry(mShape)
	material = new THREE.LineBasicMaterial {color: 0xC3ADAC, linewidth: 1}
	line = new THREE.Line geometry, material
	variable.scene.add line

	mHeels = new THREE.Shape()
	mHeels.moveTo(41.2, 13.8)
	mHeels.bezierCurveTo(44.2, 15.2,47.2, 11.4, 47.8, 0)
	mHeels.moveTo(47.8, 0)
	mHeels.bezierCurveTo(49.2, 0, 49.2, 9, 50.4, 18)

	geometry_heel = new THREE.ShapeGeometry(mHeels)
	material_heel = new THREE.LineBasicMaterial {color: 0xC3ADAC, linewidth: 1}
	line_heel = new THREE.Line geometry_heel, material_heel

	variable.scene.add line_heel

	mFoot = new THREE.Shape()
	mFoot.moveTo(12, 13.8)
	mFoot.bezierCurveTo(19.8, 23.7, 24.9, 26.7, 27,31.2)
	mFoot.moveTo(27, 31.2)
	mFoot.bezierCurveTo(29 ,33.8, 26.5, 36.8, 23.8, 46.8)
	mFoot.moveTo(38.7, 46.8)
	mFoot.bezierCurveTo(40.5,43.2, 42.3,41.1, 46.8, 33.6)

	geometry_foot = new THREE.ShapeGeometry(mFoot)
	material_foot = new THREE.LineBasicMaterial {color: 0xC3ADAC, linewidth: 1}
	line_foot = new THREE.Line geometry_foot, material_foot
	variable.scene.add line_foot

# build an axis system that will help users to navigate through the application

buildAxes = (length)->
	axes = new THREE.Object3D()

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(length,0,0), 0xFF0000, false

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(-length,0,0), 0xFF0000, true

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(0,length,0), 0x00FF00, false

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(0,-length,0), 0x00FF00, true

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(0,0,length), 0x0000FF, false

	axes.add buildAxis new THREE.Vector3(0,0,0), new THREE.Vector3(0,0,-length), 0x0000FF, true

	axes 

buildAxis = (src, dst, colorHex, dashed)->
	
	geometry = new THREE.Geometry()

	material = null

	if dashed then material = new THREE.LineDashedMaterial {linewidth: 1, color: colorHex, dashSize: 1, gapSize: 3}
	else material = new THREE.LineBasicMaterial {linewidth: 1, color: colorHex}

	geometry.vertices.push src.clone()
	geometry.vertices.push dst.clone()

	geometry.computeLineDistances()

	axis = new THREE.Line(geometry, material, THREE.LinePieces)

	axis

initGUI()
init()
animate()
GUIUpdate()





