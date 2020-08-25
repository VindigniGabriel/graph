(function ($) {

  var units = "";
  var windowWidth;
  var windowHeight;
  var containerWidth;
  var activeCountry;
  var activeLevel;
  var activeLayer;
  var elapsed;
  var isDown;
  var timer;
  var initialLocation;
  var particlesDisplay;
  var pathsDisplay;
  var selectColor = true;
  let colorsHex = [];

  // format variables
  var formatNumber = d3.format(".2f");
  var format = function (d) { return formatNumber(d * 100) + '%'; }
  var optionsColors = ["#1ABC9C", "#2980B9", "#2ECC71", "#34495E", "#3B908F", "#4275BA", "#62626A", "#6463EF", "#64785D", "#7CB5B5", "#7EAAFF", "#8085E9", "#8F4561", "#90ED7D", "#95A5A6", "#9B59B6", "#ACD7B1", "#ACD5D5", "#CC0033", "#D35400", "#E4D354", "#F15C80", "#F1C40F", "#F1DEA3", "#F39C12", "#F7A35C",
    "#FBD2BC", "#FF8FB3", "#FFA347", "#FFD119"];
  var dataPath = 'jsonGrafico.php';

  /* d3.json('getJson.php', function (error, dd) {
    console.log(dd)
  }) */

  // load the data
  d3.json(dataPath, function (error, graphData) {

    function createSankey(graphData) {

      graphData.levels.forEach((level, i) => {
        jQuery(`.column-label.level${i + 1}`).text(() => level)
      });

      let identifiers = graphData.nodes.map(e => e['identifier'])
        .map((e, i, end) => end.indexOf(e) === i && i)
        .filter((e) => graphData.nodes[e]).map(e => graphData.nodes[e].identifier);

      if (selectColor) {
        colorsHex = identifiers.map(function (x) {
          console.log(x)
          return getRandomColor()
        });
        selectColor = false
      }


      var color = d3.scaleOrdinal()
        .domain(identifiers)
        .range(colorsHex);

      // remove any existing graph elements
      if (jQuery('#sankey-chart svg').length > 0) { jQuery('#sankey-chart svg').remove() }
      if (jQuery('#sankey-chart canvas').length > 0) { jQuery('#sankey-chart canvas').remove() }

      var windowWidth = window.innerWidth;
      var windowHeight = window.innerHeight;
      var containerWidth = document.getElementById('sankey-chart').clientWidth;
      var activeLayer = null;
      var particlesDisplay = "on";
      var pathsDisplay = "on";
      var freqCounter = 1;
      var minPathWidth = 3;

      // set the dimensions and margins of the graph
      var margin = { top: 10, right: 0, bottom: windowHeight / 25, left: 0 };
      var width = containerWidth - margin.left - margin.right;
      var height = windowHeight - margin.top - margin.bottom;

      if (windowWidth < 768) { height = height * 0.9; }

      var nodeWidth = (windowWidth > 500) ? 50 : 25;
      var nodePadding = (windowWidth > 500) ? 20 : 5;

      // set sankey properties
      var sankey = d3.sankey()
        .nodeWidth(nodeWidth)
        .nodePadding(nodePadding)
        .size([width, height - 5]);

      var path = sankey.link();


      // append the svg object
      var svg = d3.select("#sankey-chart").append("svg")
        .attr("class", "svg-element")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform",
          "translate(" + margin.left + "," + margin.top + ")")

      var cnvs = d3.select("#sankey-chart").append("canvas")
        .attr("class", "particle-container")
        .attr("width", width)
        .attr("height", height)
        .attr("style", "padding-left:" + margin.left + "px; padding-top:" + margin.top + "px; padding-right:" + margin.right + "px; padding-bottom:" + margin.bottom + "px;")

      sankey
        .nodes(graphData.nodes)
        .links(graphData.links)
        .layout(10);

      // add in the links
      var linkLayer = svg.append("g")
        .attr('class', 'link-layer')
        .selectAll(".link")
        .data(graphData.links)
        .enter().append("path")
        .attr("class", "link")
        .attr("d", path)
        .attr("data-tippy-content", function (d) {
          return popupText(d);
        })
        .attr('title', function (d) {
          return popupText(d);
        })
        .attr("data-source", function (d) {
          return d.source.name;
        })
        .attr("data-target", function (d) {
          return d.target.name;
        })
        .attr("id", function (d) {
          return d.id
        })
        .style("stroke-width", function (d) { return Math.max(minPathWidth, d.dy); })
      // .sort(function(a, b) { return b.dy - a.dy; });

      // set tooltip
      setTooltip('.link');

      // add in the nodes
      var nodeLayer = svg.append("g")
        .attr('class', 'node-layer')
        .selectAll(".node")
        .data(graphData.nodes)
        .enter().append("g")
        .attr('id', function (d) {
          return d.name;
        })
        .attr("class", "node")
        .attr("transform", function (d) {
          return "translate(" + d.x + "," + d.y + ")";
        })
        .on("click", handleCountryClick)

      // add the rectangles for the nodes
      nodeLayer.append("rect")
        .attr("height", function (d) { return d.dy; })
        .attr("width", sankey.nodeWidth())
        .style("fill", function (d) {
          return d.color = color(d.identifier)
        })
        .style("stroke", function (d) {
          return d3.rgb(d.color);
        })
        // .on('click', (d,i) => handleCountryClick(d,i))
        .append("title")
        .text(function (d) {
          return d.title + "\n" + d.level;
        });

      // add in the title for the nodes
      nodeLayer.append("text")
        .attr("x", -6)
        .attr("y", function (d) { return d.dy / 2; })
        .attr("dy", ".35em")
        .attr("text-anchor", "end")
        .attr("transform", null)
        .text(function (d) { return d.title; })
        .filter(function (d) { return d.x < width / 2; })
        .attr("x", 6 + sankey.nodeWidth())
        .attr("text-anchor", "start");

      // particle code
      var linkExtent = d3.extent(graphData.links, d => d.value);
      var frequencyScale = d3.scalePow().domain(linkExtent).range([0.01, 0.5]);
      var particleSize = d3.scaleLinear().domain(linkExtent).range([1, 5]);

      graphData.links.forEach((link) => {
        link.freq = frequencyScale(link.value);
        link.particleSize = (windowWidth > 768) ? 4 : 3;
        link.particleColor = d3.scaleLinear().domain([0, 1])
          .range([link.source.color, link.target.color]);
      });

      var t = d3.timer(tick, 1000);
      var particles = [];

      function tick(elapsed, time) {
        particles = particles.filter(d => d.current < d.path.getTotalLength());

        // start from scratch
        if (activeLayer == null) { // start from scratch
          d3.selectAll('path.link')
            .each(
              function (d) {
                // reset any frequency or color changes
                d.particleColor = d3.scaleLinear().domain([0, 1])
                  .range([d.source.color, d.target.color]);
                d.freq = frequencyScale(d.value);

                for (var x = 0; x < 1; x += 1) {
                  var offset = (Math.random() - 0.5) * (d.dy - 4);
                  if (Math.random() < d.freq) {
                    var length = this.getTotalLength();
                    particles.push({ link: d, time: elapsed, offset, path: this, length, animateTime: length, speed: 0.5 + (Math.random()) });
                  }
                }
              });
        } else { // start using the temp layer
          var tempLinks = graphData.links.filter(link => link[activeLayer.id])

          tempLinks.forEach((link) => {
            link.freq = frequencyScale(link[activeLayer.id]);
            link.particleColor = d3.scaleLinear().domain([0, 1])
              .range([color(activeLayer.identifier), color(activeLayer.identifier)]);
          })

          d3.selectAll('.temp-link')
            .each(
              function (d) {
                var offset = (Math.random() - 0.5) * (d.dy - 5);

                for (var x = 0; x < 1; x += 1) {
                  // give temp links a new path to reflect the percentage representing the 'u-g' or 'g-c' from that country
                  if (d[activeLayer.id] > 0) {
                    switch (activeLayer.l) {
                      case 'u':
                        var percentage = (d.class == 'ug') ? 1 : d[activeLayer.id] / activeLayer.gcCount;
                        break;
                      case 'g':
                        var percentage = (d.class == 'ug') ? 1 : d[activeLayer.id] / activeLayer.gcCount;
                        break;
                      case 'c':
                        var percentage = (d.class == 'ug') ? d[activeLayer.id] / activeLayer.ugCount : 1;
                        break;
                    }
                    offset = (Math.random() - 0.5) * percentage * (d.dy - 4);
                  }

                  if (Math.random() < d.freq) {
                    var length = this.getTotalLength();
                    particles.push({ link: d, class: "temp-" + activeLayer.id, time: elapsed, offset, path: this, length, animateTime: length, speed: 0.5 + (Math.random()) });
                  }
                }
              });

          particles = particles.filter(d => (d.class == "temp-" + activeLayer.id))
        }

        particleEdgeCanvasPath(elapsed);
      }

      function particleEdgeCanvasPath(elapsed) {
        var context = d3.select('canvas').node().getContext('2d');
        var particleAlpha = 0.3
        if (activeLayer != null) { particleAlpha = 0.6; }

        context.clearRect(0, 0, width, height);

        context.fillStyle = 'gray';
        context.lineWidth = '1px';
        for (var x in particles) {
          if ({}.hasOwnProperty.call(particles, x)) {
            var currentTime = elapsed - particles[x].time;
            // var currentPercent = currentTime / 1000 * particles[x].path.getTotalLength();
            particles[x].current = currentTime * 0.1 * particles[x].speed;
            var currentPos = particles[x].path.getPointAtLength(particles[x].current);
            context.beginPath();
            context.fillStyle = particles[x].link.particleColor(0);
            context.globalAlpha = particleAlpha;
            context.arc(currentPos.x, currentPos.y + particles[x].offset, particles[x].link.particleSize, 0, 2 * Math.PI);
            context.fill();
          }
        }
      }

      function handleCountryClick(node) {
        console.log('clicked: ' + node.identifier);
        console.log('level: ' + node.level);

        var allPaths = document.querySelectorAll('.link');
        var tempLayer = document.querySelector('.temp-layer');

        // get the first letter of the requested level (u, g, or c)
        var l = node.level.charAt(0).toLowerCase();

        // if active layer is the same as the requested layer, reset and return
        if (activeLayer && activeLayer.id == l + node.identifier) {
          allPaths.forEach(function (path) {
            path.classList.remove('hidden');
            path.classList.remove('active');
          })
          tempLayer.remove();
          activeLayer = null;
          return;
        }

        // remove temp layer and hide all paths so we can start over
        if (tempLayer) {
          tempLayer.remove();
        }
        document.querySelectorAll('.link').forEach(function (path) {
          path.classList.remove('active');
          path.classList.add('hidden');
        })

        // create a new temp layer
        var tempLinks = graphData.links.filter(link => link[l + node.identifier])

        // assign new active (temp) layer
        activeLayer = {
          'identifier': node.identifier,
          'title': node.title,
          'level': node.level,
          'l': l,
          'id': l + node.identifier,
          'ugCount': 0,
          'gcCount': 0
        }

        tempLinks.forEach(function (link) {
          if (link.class == 'ug') {
            activeLayer.ugCount = activeLayer.ugCount + link.value;
          } else {
            activeLayer.gcCount = activeLayer.gcCount + link.value;
          }
        })

        var tempLayer = svg.append('g')
          .attr('class', 'temp-layer')
          .attr('data-country', node.identifier)
          .attr('data-level', node.level)
          .attr('style', function () {
            if (pathsDisplay == 'off') { return 'opacity: 0' }
          })
          .selectAll('.temp-link')
          .data(tempLinks)
          .enter().append('path')
          .attr('d', path)
          .attr('class', 'temp-link active')
          .attr('id', function (d) {
            return d.source.identifier + d.source.level + '-' + d.target.identifier + d.target.level;
          })
          .attr('data-author-value', function (d) {
            return d.value;
          })
          .attr('data-counterpart-value', function (d) {
            return (d.class == 'ug') ? graphData.links.find(link => link.id == d.identifier + 'Grad-' + d.identifier + 'Current') : graphData.links.find(link => link.id == d.identifier + 'Undergrad-' + d.identifier + 'Grad')
          })
          .attr('data-' + l + node.identifier, function (d) {
            return d[l + node.identifier];
          })
          .attr("data-tippy-content", function (d) {
            return popupText(d)
          })
          .style("stroke-width", function (d) {
            switch (activeLayer.l) {
              case 'u':
                var percentage = (d.class == 'ug') ? 1 : d[activeLayer.id] / d.value;
                break;
              case 'g':
                var percentage = 1;
                break;
              case 'c':
                var percentage = (d.class == 'ug') ? d[activeLayer.id] / d.value : 1;
            }
            return Math.max(minPathWidth, d.dy * percentage)
          })

        // set tooltip
        setTooltip('.temp-link');

      } // end handleCountryClick

      // popup text function
      function popupText(d) {
        if (activeLayer != null) {
          switch (activeLayer.l) {
            case 'u':
              if (d.class == 'ug') {
                var percentage = d.value / activeLayer.ugCount;
                var str = " of researchers who got their undergraduate degree in " + styleCountryText(activeLayer) + " went to " + styleCountryText(d.target) + " for graduate school";
              } else {
                var percentage = d[activeLayer.id] / activeLayer.ugCount;
                var str = " of " + styleCountryText(activeLayer) + " undergrads went to " + styleCountryText(d.source) + " for grad school and now work in " + styleCountryText(d.target);
              }
              // percentage = d.value;
              break;
            case 'g':
              if (d.class == 'ug') {
                var percentage = d.value / activeLayer.ugCount;
                var str = " of researchers who went to grad school in " + styleCountryText(activeLayer) + " got their undergraduate degree in " + styleCountryText(d.source);
              } else {
                var percentage = d.value / activeLayer.gcCount;
                var str = " of researchers who went to grad school in " + styleCountryText(activeLayer) + " now work in " + styleCountryText(d.target);
              }
              // percentage = d.value;
              break;
            case 'c':
              if (d.class == 'ug') {
                var gcLink = graphData.links.find(link => link.id == (d.target.identifier + "Grad-" + activeLayer.identifier + "Current").toString());

                var percentage = d[activeLayer.id] / activeLayer.gcCount;
                var str = " of researchers currently employed in " + styleCountryText(activeLayer) + " went to graduate school in " + styleCountryText(d.target) + " and got their undergraduate degree in " + styleCountryText(d.source);
              } else {
                var percentage = d[activeLayer.id] / activeLayer.gcCount;
                var str = " of researchers currently employed in " + styleCountryText(activeLayer) + " went to graduate school in " + styleCountryText(d.source);
              }
              // percentage = d.value;
              break;
          }

          return "<span class='bold bigger'>" + format(percentage) + "</span>" + str;
        } else {
          var levelSrc = d.source.level;
          var levelTgt = d.target.level;

          if (d.source.level == 'Current') { levelSrc = 'Post-grad work'; }
          if (d.target.level == 'Current') { levelTgt = 'Post-grad work'; }

          var percentage = (d.class == 'ug') ? (d.value / graphData.ugTotalCount) : (d.value / graphData.gcTotalCount);
          var str = styleCountryText(d.source) + " " + levelSrc + " to " +
            styleCountryText(d.target) + " " + levelTgt + ":\n";
        }

        return str + "<span class='bold bigger'>" + format(percentage) + "</span>";
      }

      // graph controls
      jQuery('.control').click(function (e) {
        console.log(jQuery(this).text())
        if (jQuery(this).hasClass('particles')) {
          if (particlesDisplay == 'on') {
            jQuery('.particle-container').css('opacity', '0');
            jQuery('.control.particles span').text('off');
            particlesDisplay = 'off';
          } else {
            jQuery('.particle-container').css('opacity', '1')
            jQuery('.control.particles span').text('on');
            particlesDisplay = 'on';
          }
        } else if (jQuery(this).hasClass('paths')) {
          if (pathsDisplay == 'on') {
            jQuery('.link-layer').css('opacity', '0');
            jQuery('.temp-layer').css('opacity', '0');
            jQuery('.control.paths span').text('off');
            pathsDisplay = 'off';
          } else {
            jQuery('.link-layer').css('opacity', '1');
            jQuery('.temp-layer').css('opacity', '1');
            jQuery('.control.paths span').text('on');
            pathsDisplay = 'on';
          }
        }
      })


    } // end createSankey

    function styleCountryText(obj) {
      return "<span class='bold bigger'>" + obj.title + "</span>";
    }

    // drag function for nodes
    function dragmove(d) {
      console.log('dragmove')
      d3.select(this)
        .attr("transform",
          "translate("
          + d.x + ","
          + (d.y = Math.max(
            0, Math.min(height - d.dy, d3.event.y))
          ) + ")");
      sankey.relayout();
      link.attr("d", path);
    }

    // reset function
    function resetSankey() {
      jQuery('#sankey-chart svg').remove();
      jQuery('#sankey-chart svg').remove();
      jQuery('.control span').text('on');
      jQuery('.control').unbind('click');
      createSankey(graphData)
    }

    // tooltip call
    function setTooltip(selector) {
      var el = jQuery(selector);
      var elPos = el.offset();
      var elHeight = el.height();
      var elWidth = el.width();

      tippy(document.querySelectorAll(selector), {
        delay: [100, 0],
        duration: [0],
        allowHTML: true,
        flip: false,
        animation: 'scale',
      });
    }

    // resize function
    var resizeTimer;
    jQuery(window).resize(function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        resetSankey();
      }, 100);
    })

    // position column labels
    function positionLabels(topCountry) {
      var levelArray = ['Undergrad', 'Grad', 'Current'];

      for (var i = 0; i < levelArray.length; i++) {
        var levelUpper = levelArray[i];
        var level = levelUpper.toLowerCase();
        var label = jQuery('.column-label.' + level);
        var rect = jQuery('#' + topCountry + levelUpper + ' rect');
        var labelPos = label.offset();
        var rectPos = rect.offset();

        label.css('position', 'absolute');
        label.css('left', (rectPos.left + (rect.width() / 2)) - (label.width() / 2) + 'px');

        if (jQuery(window).width() > 768) {
          if (label.html().indexOf('<br>') != -1) {
            label.css('top', (rectPos.top - 70) + 'px');
          } else {
            label.css('top', (rectPos.top - 45) + 'px');
          }
        } else {
          label.css('top', (rectPos.top - 25) + 'px');
        }
      }

    }

    // init sankey graph
    createSankey(graphData);


  }); // end d3.json

  function getRandomColor() {
    let random = Math.floor(Math.random() * (optionsColors.length))
    let colorSelect = optionsColors[random]
    optionsColors.splice(random, 1)
    return colorSelect
  }

})(); 