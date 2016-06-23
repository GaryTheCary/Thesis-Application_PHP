
var normal_input = document.getElementById("normal");
var rear_input = document.getElementById("rear");
var hinder_input = document.getElementById("hinder");
var medial_input = document.getElementById("medial");
var expectation_input = document.getElementById("expectation");

var margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = (document.getElementById("stack_graph").offsetWidth - margin.right - margin.left),
    height = (document.getElementById("stack_graph").offsetHeight - margin.top - margin.bottom);

var parseDate = d3.time.format("%y-%b-%d").parse,
    formatPercent = d3.format(".0%");

var x = d3.time.scale()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var color = d3.scale.category20();

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .tickFormat(formatPercent);

var area = d3.svg.area()
    .x(function(d) { return x(d.date); })
    .y0(function(d) { return y(d.y0); })
    .y1(function(d) { return y(d.y0 + d.y); });

var stack = d3.layout.stack()
    .values(function(d) { return d.values; });

var svg = d3.select("#stack_graph").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var line = d3.svg.area()
    .interpolate("basis")
    .x(function(d) { return x(d.date); })
    .y0(function(d) { return y(d.y); })
    .y1(function(d) { return y(d.y); });

function multiple_line_graph()
{
    d3.tsv("/assets/data/data.tsv", function(error, data) {

        color.domain(d3.keys(data[0]).filter(function(key) { return key !== "date"; }));
        data.forEach(function(d) {
            d.date = parseDate(d.date);
        });

        var browsers = stack(color.domain().map(function(name) {
            return {
                name: name,
                values: data.map(function(d) {
                    return {date: d.date, y: d[name] / 100};
                })
            };
        }));

        x.domain(d3.extent(data, function(d) { return d.date; }));

        if(rear_input.checked == true) {
            normal_input.disabled = true;
            hinder_input.disabled = true;
            medial_input.disabled = true;
            expectation_input.disabled = true;


            var browser = svg.selectAll(".browser")
                .data(browsers)
                .enter().append("g")
                .attr("class", "browser");

            browser.append("path")
                .attr("class", "area")
                .attr("d", function (d) {
                    return line(d.values);
                })
                .style("stroke", function (d) {
                    return color(d.name);
                })
                .style("fill", function (d) {
                    return color(d.name);
                })

            browser.append("text")
                .datum(function (d) {
                    return {name: d.name, value: d.values[d.values.length - 1]};
                })
                .attr("transform", function (d) {
                    return "translate(" + x(d.value.date) + "," + y(d.value.y) + ")";
                })
                .attr("x", 3)
                .attr("dy", ".35em")
                .style("fill", function (d) {
                    if (d.name == "SensorOne")
                        return "#f27521";
                    if (d.name == "SensorTwo")
                        return "#6fc382";
                    if (d.name == "SensorThree")
                        return "#f4e12d";
                    if (d.name == "SensorFour")
                        return "#f27521";
                    if (d.name == "SensorFive")
                        return "#6fc382";
                })
                .text(function (d) {
                    return d.name;
                });
            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis);
        }else{
            normal_input.disabled = false;
            hinder_input.disabled = false;
            medial_input.disabled = false;
            expectation_input.disabled = false;
            svg.selectAll("*").remove();
        }
    });
}

function stack_area_graph() {
    d3.tsv("/assets/data/data.tsv", function (error, data) {
        if (error) throw error;

        color.domain(d3.keys(data[0]).filter(function (key) {
            return key !== "date";
        }));

        data.forEach(function (d) {
            d.date = parseDate(d.date);
        });

        var browsers = stack(color.domain().map(function (name) {
            return {
                name: name,
                values: data.map(function (d) {
                    return {date: d.date, y: d[name] / 100};
                })
            };
        }));

        x.domain(d3.extent(data, function (d) {
            return d.date;
        }));

        if (normal_input.checked == true) {

            rear_input.disabled = true;
            hinder_input.disabled = true;
            medial_input.disabled = true;
            expectation_input.disabled = true;

            var browser = svg.selectAll(".browser")
                .data(browsers)
                .enter().append("g")
                .attr("class", "browser");

            browser.append("path")
                .attr("class", "area")
                .attr("d", function (d) {
                    return area(d.values);
                })
                .style("fill", function (d) {
                    if (d.name == "SensorOne")
                        return "#f27521";
                    if (d.name == "SensorTwo")
                        return "#6fc382";
                    if (d.name == "SensorThree")
                        return "#f4e12d";
                    if (d.name == "SensorFour")
                        return "#f27521";
                    if (d.name == "SensorFive")
                        return "#6fc382";
                });

            browser.append("text")
                .datum(function (d) {
                    return {name: d.name, value: d.values[d.values.length - 1]};
                })
                .attr("transform", function (d) {
                    return "translate(" + x(d.value.date) + "," + y(d.value.y0 + d.value.y / 2) + ")";
                })
                .attr("x", -6)
                .attr("dy", ".35em")
                .text(function (d) {
                    return d.name;
                });

            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis);
        }
        else {
            rear_input.disabled = false;
            hinder_input.disabled = false;
            medial_input.disabled = false;
            expectation_input.disabled = false;
            svg.selectAll("*").remove();
        }
    });
};

normal_input.onclick = function (){
    stack_area_graph();
}

rear_input.onclick = function(){
    multiple_line_graph();
}
