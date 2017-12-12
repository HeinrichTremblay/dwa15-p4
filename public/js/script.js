scatter(items);

function scatter(data) {
  var width = 510;
  var height = 300;
  var padding = 25;

  var svg = d3.select("#scatter_graph")
    .append("svg")
    .attr("width", width-padding+1)
    .attr("height", height)

  svg.append("rect")
    .attr("class", "scatter_wrap")
    .attr("fill", "#1A98D8")
    .attr("rx", 4)
    .attr("ry", 4)
    .attr("width", width-padding*2)
    .attr("transform", "translate("+ (padding) +","+ (padding) +")")
    .attr("height", height-padding*2);

  svg.append("rect")
    .attr("class", "scatter_top_left")
    .attr("class", "map")
    .attr("fill", "#1CC9A5")
    .attr("rx", 4)
    .attr("ry", 4)
    .attr("width", width/2-padding-2)
    .attr("transform", "translate("+ (padding+1) +","+ (padding+1) +")")
    .attr("height", height/2-padding-2);

  svg.append("rect")
    .attr("class", "scatter_bottom_right")
    .attr("class", "map")
    .attr("fill", "#915470")
    .attr("rx", 4)
    .attr("ry", 4)
    .attr("width", (width/2)-padding-2)
    .attr("transform", "translate("+ (width/2+1) +","+ (height/2+1) +")")
    .attr("height", (height/2)-padding-2);

  svg.append("rect")
    .attr("class", "scatter_top_right")
    .attr("class", "map")
    .attr("fill", "#1BB8B6")
    .attr("rx", 4)
    .attr("ry", 4)
    .attr("width", (width/2)-padding-2)
    .attr("transform", "translate("+ (width/2+1) +","+ (padding+1) +")")
    .attr("height", (height/2)-padding-2);

  svg.append("rect")
    .attr("class", "scatter_top_right")
    .attr("class", "map")
    .attr("fill", "#1BB6BA")
    .attr("rx", 4)
    .attr("ry", 4)
    .attr("width", (width/2)-padding-2)
    .attr("transform", "translate("+ (padding+1) +","+ (height/2+1) +")")
    .attr("height", (height/2)-padding-2);

  var elements = svg.selectAll("g element")
    .data(items)
    .enter()

  var x = d3.scaleLinear()
    .domain([0,10])
    .range([padding+20,width-padding-20]);

  var y = d3.scaleLinear()
    .domain([0,10])
    .range([height-padding-20,padding+20]);

  svg.append("line")
    .style("stroke", "#75C1E7")
    .attr("x1", (width/2))
    .attr("x2", (width/2))
    .attr("y1", padding)
    .attr("y2", height-padding)

  svg.append("line")
    .style("stroke", "#75C1E7")
    .attr("x1", (padding))
    .attr("x2", (width-padding))
    .attr("y1", (height/2))
    .attr("y2", (height/2))

  elements.append("circle")
  .attr("fill", "white")
  .attr("opacity",0.8)
  .attr("cx", function(d) {
    return x(d["complexity"]);
  })
  .attr("cy", function(d) {
    return y(d["value"]);
  })
  .attr("r", 16);

  elements.append("text")
    .style("text-anchor", "middle")
    .attr("dx", function(d) {
      return x(d["complexity"]);
    })
    .attr("dy", function(d) {
      return y(d["value"])+6;
    })
    .text(function (d, i) {
      return i+1;
    });

  svg.append("text")
    .attr("transform", "translate(" + (width/2) + " ," + (height-5) + ")")
    .attr("fill","#D2EEFC")
    .style("text-anchor", "middle")
    .text("Complexity");

  svg.append("text")
    .attr("y", 15)
    .attr("x",0-(height/2))
    .attr("transform", "rotate(-90)")
    .attr("fill","#D2EEFC")
    .style("text-anchor", "middle")
    .text("Value");
}
