<!DOCTYPE html>

<?php
$connect = mysqli_connect("localhost", "root", "", "vtiger");

$query5 = "SELECT `vtiger_products`.`productname` as ProductName,`vtiger_products`.`qtyinstock` as quantity, COUNT(`vtiger_troubletickets`.`ticketid`) as NumberOfTroubles FROM `vtiger_products` LEFT OUTER JOIN `vtiger_troubletickets` ON `vtiger_products`.`productid`=`vtiger_troubletickets`.`product_id` group by `vtiger_products`.`productname` limit 10";
$result5 = mysqli_query($connect, $query5);
?>

<html>
<head>
	<style>
	h1{
		text-align: center;
		font-size: 60px;
	}
	.bubble
{
    text-align: center;
    display: flex;
    width: 1000px;
    height: 1000px;
    margin-top: 100px;
    margin-left: 400px;
    color : black;

}

body {
	height: 100%;
  background-color: #fff;
	background-image: url("https://media-public.canva.com/MABf-33gEgo/1/screen_2x.jpg");
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
h2{
	text-align: center;
	color: white;
}
ul {
  margin: 20px auto;
  text-align: center;
  width: 80%;
  height: 100%;
  display: block;
  color: #333;
  position: relative;
}
ul li {
  width: 120px;
  height: 120px;
  border: none;
  overflow: hidden;
  position: relative;
	text-align: center;
  float: left;
   background-image: linear-gradient(to right,#06d4d4,#FFFDE4);
  margin-left: 5%;
  -webkit-box-shadow: 0px 3px 6px black;
  -moz-box-shadow: 0px 3px 6px black;
  box-shadow: 0px 3px 6px black;
  -webkit-border-radius: 90px;
  -moz-border-radius: 90px;
  border-radius: 100px;
  -webkit-transition: all 400ms linear;
  -moz-transition: all 400ms linear;
  -o-transition: all 400ms linear;
  -ms-transition: all 400ms linear;
  transition: all 400ms linear;

}
ul li:hover {
  border-color: #f6f6f6;
  z-index: 999;
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -o-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}
ul li:hover h3 {
  color: #2d2d2d;
  -webkit-animation: moveFromBottom 250ms ease;
  -moz-animation: moveFromBottom 250ms ease;
  -ms-animation: moveFromBottom 250ms ease;
}
ul li a {
  text-align: center;
  width: 100%;
  height: 100%;
  display: block;
	margin-top: 35%;
  color: #333;
  position: relative;
  text-decoration: none;
}

@-webkit-keyframes moveFromBottom {
  from {
    -webkit-transform: translateY(200%) scale(0.5);
    opacity: 0;
  }
  to {
    -webkit-transform: translateY(0%) scale(1);
    opacity: 1;
  }
}
@-moz-keyframes moveFromBottom {
  from {
    -moz-transform: translateY(200%) scale(0.5);
    opacity: 0;
  }
  to {
    -moz-transform: translateY(0%) scale(1);
    opacity: 1;
  }
}
@-ms-keyframes moveFromBottom {
  from {
    -ms-transform: translateY(200%) scale(0.5);
    opacity: 0;
  }
  to {
    -ms-transform: translateY(0%) scale(1);
    opacity: 1;
  }
}


section {
  display: block;
  margin: 3rem auto;
  width: 100%;
	margin-top: 10%;
  text-align: center;
}
section hr {
  margin-top: 2rem;
  width: 40%;
}



.colors div[class^='bg'],
.colors div[class*=' bg'] {
  float: left;
  height: 200px;
  position: relative;
  width: 100%;
}
@media (min-width: 800px) {
  .colors div[class^='bg'],
  .colors div[class*=' bg'] {
    width: 33.33%;
  }
}
@media (min-width: 1000px) {
  .colors div[class^='bg'],
  .colors div[class*=' bg'] {
    width: 11.11%;
  }
}
.colors div[class^='bg']:before, .colors div[class^='bg']:after,
.colors div[class*=' bg']:before,
.colors div[class*=' bg']:after {
  background: rgba(0, 0, 0, 0.4);
  display: block;
  line-height: 1.75;
  position: absolute;
  width: 100%;
}
.colors div[class^='bg']:before,
.colors div[class*=' bg']:before {
  bottom: 28px;
}
.colors div[class^='bg']:after,
.colors div[class*=' bg']:after {
  bottom: 0;
}


.container{
	color: black;

}
.node{
    transform:translate(597.4706592545806,1225.30098268603828);
}
	</style>

</head>
<body>
	 <h1>Main Telecom 7 P's</h1>
	<div>

		 <section class="colors">
				   <ul>
				     <li class="bg-coral">
				       <a href="#">
				         <h3>people</h3>
				       </a>
				     </li>
				     <li class="bg-yellow">
				       <a href="#">
				         <h3>prices</h3>
				       </a>
				     </li>
				     <li class="bg-green">
				       <a href="#">
				         <h3>product</h3>
				       </a>
				     </li>
				     <li class="bg-pink">
				       <a href="#">
				         <h3>places</h3>
				       </a>
				     </li>
						 <li class="bg-pink">
				       <a href="#">
				         <h3>process</h3>
				       </a>
				     </li>
						 <li class="bg-pink">
				       <a href="#">
				         <h3>promotions</h3>
				       </a>
				     </li>
				   </ul>
   </section>
</div>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/4.13.0/d3.min.js'></script>
			<script type="text/javascript">



			function getblueColor() {

				var colors = ["#06d4d4"];
				return colors[Math.floor(Math.random() * colors.length)];
			}
			function getredColor() {
				var colors = ["#FF0000"];
				return colors[Math.floor(Math.random() * colors.length)];
			}


			var dataset = {
				children: [
					<?php

					while($row = mysqli_fetch_array($result5))
						{
								$x=$row['NumberOfTroubles'];
								 echo "{ name: '" .$row["ProductName"]. "', level: " .$x. ", count: " .$row['quantity']. ", color: ";
								if ($x>0) {
									echo "getredColor() },";

								}
								else {
									echo "getblueColor() },";
								}


						}
					 ?>
				]
			};

			var diameter = 500;
			// var color = d3.scaleOrdinal(d3.schemeCategory20);

			var bubble = d3
				.pack(dataset)
				.size([diameter, diameter])
				.padding(10);

			var svg = d3
				.select("body")
				.append("svg")
				.attr("width", diameter)
				.attr("height", diameter)
				.attr("class", "bubble");

			var nodes = d3.hierarchy(dataset).sum(function(d) {
				return d.count;
			});

			var node = svg
				.selectAll(".node")
				.data(bubble(nodes).descendants())
				.enter()
				.filter(function(d) {
					return !d.children;
				})
				.append("g")
				.attr("class", "node")
				.attr("transform", function(d) {
					return "translate(" + d.x + "," + d.y + ")";
				});

			// Adds a tooltip
			node.append("title").text(function(d) {
				return d.data.name + " " + d.data.level + ": " + d.data.count;
			});

			// Add circles of set radius and fill color
			node
				.append("circle")
				.attr("r", function(d) {
					return d.r;
				})
				.style("fill", function(d, i) {
					// return color(i);
					return d.data.color;
				});

			// Top text
			node
				.append("text")
				.attr("dy", "-1.2em")
				.style("text-anchor", "middle")
				.text(function(d) {
					return d.data.name;
				})
				.attr("font-family", "sans-serif")
				.attr("font-size", function(d) {
					return d.r / 4;
				})
				.attr("fill", "white");

			// Middle text
			node
				.append("text")
				.attr("dy", "0.4em")
				.style("text-anchor", "middle")
				.text(function(d) {
					return d.data.level;
				})
				.attr("font-family", "Arial", "sans-serif")
				.attr("font-weight", "bold")
				.attr("font-size", function(d) {
					return d.r / 2;
				})
				.attr("fill", "white");

			// Bottom text
			node
				.append("text")
				.attr("dy", "2em")
				.style("text-anchor", "middle")
				.text(function(d) {
					return d.data.count;
				})
				.attr("font-family", "Arial", "sans-serif")
				.attr("font-weight", "normal")
				.attr("font-size", function(d) {
					return d.r / 4;
				})
				.attr("fill", "white");
		</script>

</body>
</html>
