# # # # # # # # # # # # # # #
#							#
#	Visulization for COP	#
#							# 
# # # # # # # # # # # # # # #

# This visulization utlize the heat map module
margin = {

	top: 20,
	right: 20,
	bottom: 30,
	left: 30
}

container_onj = document.getElementById "stack_graph"

width = container_onj.offsetWidth - margin.left - margin.right

height = container_onj.offsetHeight - margin.top - margin.bottom

gridSize = Math.floor(width/24)

# 
# param: level indicator
#

legendElementWidth = gridSize * 2

buckets = 6

colors = [

	"#ffffd9",
	"#f27521",
	"#6fc382",
	"#f4e12d"
]

# Horzontol Data X axis

days = [
	
	"Mo",
	"Tu",
	"We",
	"Th",
	"Fr",
	"Sa",
	"Su"
]

times = [

	"1a", 
	"2a", 
	"3a", 
	"4a", 
	"5a", 
	"6a", 
	"7a", 
	"8a", 
	"9a", 
	"10a", 
	"11a", 
	"12a", 
	"1p", 
	"2p", 
	"3p", 
	"4p", 
	"5p", 
	"6p", 
	"7p", 
	"8p", "9p", "10p", "11p", "12p"
]

data_map = "/assets/data/data2.tsv"

svg = d3.select("#stack_graph").append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
		.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")")

dayLayers = svg.selectAll(".dayLayer").data(days)
				.enter().append("text")
				.text((d)-> d)
				.attr("x", 0)
				.attr("y", (d, i)-> i * gridSize)
				.style("text-anchor", "end")
				.attr("transform", "translate(" + -10 + "," + gridSize/1.5 + ")")
				.attr("class", (d, i)-> ( if i >= 0 and i <= 4 then "dayLabel mono axis axis-workweek" else "dayLabel mono axis"))

timeLabels = svg.selectAll(".timeLabel").data(times).enter()
				.append("text").text((d)-> d)
				.attr("x", (d, i)-> i * gridSize)
				.attr("y", 0)
				.style("text-anchor", "middle")
				.attr("transform", "translate(" + gridSize/2 + ", -6)")
				.attr("class", (d, i)-> if i >= 7 and i <= 16 then "timeLabel mono axis axis-worktime" else "timeLabel mono axis")

heatmapChart = (tsvFile)->
	d3.tsv(tsvFile, (d)->
		console.log d.zone
		{
			day: +d.day,
			hour: +d.hour,
			zone: +d.zone
		}
	,(error, data)->
		if error then throw error 
		colorScale = d3.scale.quantile()
								.domain([0, buckets-1, d3.max(data, (d)-> d.zone)])
								.range(colors)


		cards = svg.selectAll(".hour").data(data, (d)-> d.day + ":" + d.hour)

		cards.append("title")

		cards.enter().append("rect")
						.attr("x", (d)-> (d.hour - 1)*gridSize)
						.attr("y", (d)-> (d.day - 1)*gridSize)
						.attr("rx", 1)
						.attr("ry", 1)
						.attr("class", "hour bordered")
						.attr("width", gridSize)
						.attr("height", gridSize)
						.style("fill", colors[0])

		cards.transition().duration(1000).style("fill", (d)-> colorScale(d.zone))

		cards.select("title").text((d)-> d.zone)

		cards.exit().remove()

		legend = svg.selectAll(".legend").data([0].concat(colorScale.quantiles()), (d)-> d)

		legend.enter().append("g").attr("class", "legend")

		offset = 70	

		legend.append("rect").attr("x", (d, i)-> legendElementWidth * i)
								.attr("y", height - offset)
								.attr("width", legendElementWidth)
								.attr("height", gridSize/2)
								.style("fill", (d, i)-> colors[i])

		legend.append("text").attr("class", "mono")
								.text((d)-> "≥ " + Math.round(d))
								.attr("x", (d, i)-> legendElementWidth * i)
								.attr("y", height - offset + gridSize)

		legend.exit().remove()																							

	)

heatmapChart(data_map)

updateBtn = document.getElementById('BTNUpdate')
updateBtn.onclick = -> document.location.reload(true)
normalToggle = document.getElementById('normal')
normalToggle.checked = true
document.getElementById('Expectation').disabled = true





