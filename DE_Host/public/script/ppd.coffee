# 
# Main visulization method #
#
# # # # # # # # # # # # # # #

# Defining the graph visulization 

# Get height and width of the graph section

normal_input = document.getElementById "normal"
rear_input = document.getElementById "rear"
hinder_input = document.getElementById "hinder"
medial_input = document.getElementById "medial"
expectation_input = document.getElementById "expectation"

margin = {
	
	top: 20,
	right: 20,
	bottom: 30,
	left: 30
}

width = (document.getElementById("stack_graph").offsetWidth - margin.right - margin.left)

height = (document.getElementById("stack_graph").offsetHeight - margin.top - margin.bottom)

parseData = d3.time.format("%y-%b-%d").parse

formatPercent = d3.format(".0%")

x = d3.time.scale().range([0, width])

y = d3.scale.linear().range([height, 0])

color = d3.scale.category20()

xAxis = d3.svg.axis().scale(x).orient("bottom")

yAxis = d3.svg.axis().scale(y).orient("left").tickFormat(formatPercent)

area = d3.svg.area().x((d)-> x(d.date)).y0((d)-> y(d.y0)).y1((d)-> y(d.y0 + d.y))

stack = d3.layout.stack().values((d)-> d.values)

svg = d3.select("#stack_graph").append("svg").attr("width", width + margin.left + margin.right).attr("height", height + margin.top + margin.bottom).append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")")

# visualization for the line style of graph
# here is what is important for establishing multiple line series
line = d3.svg.area().interpolate("basis").x((d)-> x(d.date)).y0((d)-> y(d.y)).y1((d)-> y(d.y))  

multi_line_graph =->
	
	d3.tsv("/assets/data/data.tsv", (error, data)->

		if error then throw error

		color.domain(d3.keys(data[0]).filter((key)-> key != "date"))

		data.forEach((d)->
			d.date = parseData(d.date)
		)

		browsers = stack(color.domain().map((name)->
			{
				name: name,
				values: data.map((d)-> {date: d.date, y: d[name] / 100})
			}
		))

		x.domain(d3.extent(data, (d)-> d.date))

		if rear_input.checked == true
			

			normal_input.disabled = true 
			hinder_input.disabled = true
			medial_input.disabled = true
			expectation_input.disabled = true


			svg.append("g").attr("class", "x axis visualpart").attr("transform", "translate(0," + height + ")").call(xAxis)

			svg.append("g").attr("class", "y axis visualpart").call(yAxis)

			
			browser = svg.selectAll(".browser").data(browsers).enter().append("g").attr("class", "data_graph")

			browser.append("path").attr("class", "area").attr("d", (d)-> line(d.values)).style("stroke", (d)-> 
																												switch d.name
																													when "IE" then "#f27521"
																													when "Chrome" then "#6fc382"
																													when "Firefox" then "#f4e12d"
																													when "Safari" then "#f27521"
																													else  "#6fc382"
																											)

			browser.append("text").datum((d)->
				{
					# for attaching 
					name: "",
					value: d.values[d.values.length - 1]
				}
			).attr("transform", (d)->
				"translate(" + x(d.value.date) + "," + y(d.value.y0 + d.value.y / 2) + ")"
			).attr("x", -6).attr("dy", ".35em").text((d)-> d.name)

		else
			normal_input.disabled = false
			hinder_input.disabled = false
			medial_input.disabled = false
			expectation_input.disabled = false
			svg.selectAll("*").remove()		


			
	)	

# visulization for the stack_grapg

stack_data_graph =-> 
		d3.tsv("/assets/data/data.tsv", (error, data)->

			if error then throw error

			color.domain(d3.keys(data[0]).filter((key)-> key != "date"))

			data.forEach((d)->
				d.date = parseData(d.date)
			)

			browsers = stack(color.domain().map((name)->
				{
					name: name,
					values: data.map((d)-> {date: d.date, y: d[name] / 100})
				}
			))

			x.domain(d3.extent(data, (d)-> d.date))

			if normal_input.checked == true

				rear_input.disabled = true 
				hinder_input.disabled = true
				medial_input.disabled = true
				expectation_input.disabled = true

				
				new_height = height + 5

				svg.append("g").attr("class", "x axis visualpart").attr("transform", "translate(0," + new_height + ")").call(xAxis)

				svg.append("g").attr("class", "y axis visualpart").attr("transform", "translate(0," + 5 + ")").call(yAxis)

				browser = svg.selectAll(".browser").data(browsers).enter().append("g").attr("d", (d)-> area(d.values)).style("fill", (d)-> color(d.name)).attr("transform", "translate(0," + 5 + ")").attr("class", "data_graph")

				browser.append("path").attr("class", "area").attr("d", (d)-> area(d.values)).style("fill", (d)-> 
																												switch d.name
																													when "IE" then "#f27521"
																													when "Chrome" then "#6fc382"
																													when "Firefox" then "#f4e12d"
																													when "Safari" then "#f27521"
																													else  "#6fc382"
																											)

				browser.append("text").datum((d)->
					{
						# for attaching 
						name: "",
						value: d.values[d.values.length - 1]
					}
				).attr("transform", (d)->
					"translate(" + x(d.value.date) + "," + y(d.value.y0 + d.value.y / 2) + ")"
				).attr("x", -6).attr("dy", ".35em").text((d)-> d.name)

			else
				rear_input.disabled = false
				hinder_input.disabled = false
				medial_input.disabled = false
				expectation_input.disabled = false
				svg.selectAll("*").remove()		
			
		)

normal_input.onclick = ->
	stack_data_graph()

rear_input.onclick = ->
	multi_line_graph()