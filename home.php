
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<script type="text/javascript" src="https://cdn.bootcss.com/canvasjs/1.7.0/canvasjs.js"></script>

    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

    <title>Data line chart</title>

    <style>
        .chartContainer{
            width: 850px;
            height: 350px;
        }
        .canvasjs-chart-credit{
            display: none;
        }
    </style>
</head>
<body>
	<h1>Welcome to Environmental Monitor</h1>
	<?php 
			require_once('connection.php');
        	$query = 'select * from environment';
			$result = mysqli_query($conn, $query);
			$row_count = mysqli_num_rows($result);

			for($i = 0; $i < $row_count; $i++) 
			{    $row[$i] = mysqli_fetch_array($result);
			    
			}
			  
			
			foreach ($row as $next)
			{
			
			
				echo '<input type="hidden"'.'id=year'.$next['id'].' '.'value='.$next['year'].' '.'>';
				echo '<input type="hidden"'.'id=month'.$next['id'].' '.'value= '.$next['month'].' '.'>';
				echo '<input type="hidden"'.'id=day'.$next['id'].' '.'value='.$next['day'].' '.'>';
				echo '<input type="hidden"'.'id=y'.$next['id'].' '.'value='.$next['y'].' '.'>';
				echo '<input type="hidden"'.'id=indexLabel'.$next['id'].' '.'value='.$next['indexLabel'].' '.'>';
				echo '<input type="hidden"'.'id=markerType'.$next['id'].' '.'value='.$next['markerType'].' '.'>';
			
			}    
        ?>
	<div class="container">
		<div id="chartContainer" class="chartContainer"></div>
		
		<script type="text/javascript">
			// get value
			function getVal(id) {
				return document.getElementById(id).value;
			}
			var year1 = +getVal('year1');
			var year2 = +getVal('year2');
			var year3 = +getVal('year3');
			var year4 = +getVal('year4');
			var year5 = +getVal('year5');
			var year6 = +getVal('year6');
			var year7 = +getVal('year7');
			console.log(typeof year1)
			var month1 = +getVal('month1');
			var month2 = +getVal('month2');
			var month3 = +getVal('month3');
			var month4 = +getVal('month4');
			var month5 = +getVal('month5');
			var month6 = +getVal('month6');
			var month7 = +getVal('month7');

			var day1 = +getVal('day1');
			var day2 = +getVal('day2');
			var day3 = +getVal('day3');
			var day4 = +getVal('day4');
			var day5 = +getVal('day5');
			var day6 = +getVal('day6');
			var day7 = +getVal('day7');

			var y1 = +getVal('y1');
			var y2 = +getVal('y2');
			var y3 = +getVal('y3');
			var y4 = +getVal('y4');
			var y5 = +getVal('y5');
			var y6 = +getVal('y6');
			var y7 = +getVal('y7');

			var indexLabel1 = getVal('indexLabel1');
			var indexLabel2 = getVal('indexLabel2');
			var indexLabel3 = getVal('indexLabel3');
			var indexLabel4 = getVal('indexLabel4');
			var indexLabel5 = getVal('indexLabel5');
			var indexLabel6 = getVal('indexLabel6');
			var indexLabel7 = getVal('indexLabel7');

			var markerType1 = getVal('markerType1');
			var markerType2 = getVal('markerType2');
			var markerType3 = getVal('markerType3');
			var markerType4 = getVal('markerType4');
			var markerType5 = getVal('markerType5');
			var markerType6 = getVal('markerType6');
			var markerType7 = getVal('markerType7');

		    var chart = new CanvasJS.Chart("chartContainer",
		    {
		        theme: "theme4",
		        animationEnabled: true,
		        axisX: {
		            valueFormatString: "YYYY.M.DD"

		        },
		        axisY: {
		            title: "Data line chart"
		        },
		        data: [
		            {
		                type: "line",
		                color: "rgba(103, 148, 239, 1)",
		                markerColor: "rgba(103, 148, 239, 1)",
		                markerSize: 12,
		                dataPoints: [
		                
		                    { x: new Date(year1, month1, day1), y: y1, indexLabel: indexLabel1,markerType: markerType1},
		                    { x: new Date(year2, month2, day2) , y: y2, indexLabel: indexLabel2,markerType: markerType2},
		                    { x: new Date(year3, month3, day3) , y: y3, indexLabel: indexLabel3,markerType: markerType3},
		                    { x: new Date(year4, month4, day4) , y: y4, indexLabel: indexLabel4,markerType: markerType4},
		                    { x: new Date(year5, month5, day5) , y: y5, indexLabel: indexLabel5,markerType: markerType5},
		                    { x: new Date(year6, month6, day6) , y: y6, indexLabel: indexLabel6,markerType: markerType6},
		                    { x: new Date(year7, month7, day7) , y: y7, indexLabel: indexLabel7,markerType: markerType7}
		                ]
		            }
		        ]
		    });
		    chart.render();

		    var images = [];
		    addImages(chart);

		    function addImages(chart) {
		        for(var i = 0; i < chart.data[0].dataPoints.length; i++){
		            var dpsName = chart.data[0].dataPoints[i].markerType;
		            if(dpsName == "rainy"){
		                images.push(
		                    $('<img>').attr('src', "https://canvasjs.com/wp-content/uploads/images/gallery/gallery-overview/rainy.png")
		                );
		            }
		            else if(dpsName == "sunny"){
		                images.push(
		                    $('<img>').attr('src', "https://canvasjs.com/wp-content/uploads/images/gallery/gallery-overview/sunny.png")
		                );
		            }
		            images[i].attr("class", dpsName)
		                .appendTo($("#chartContainer>.canvasjs-chart-container"));
		            positionImage(images[i], i);
		        }
		    }

		    function positionImage(image, index) {
		        var imageCenter = chart.axisX[0].convertValueToPixel(chart.data[0].dataPoints[index].x);
		        var imageY = chart.axisY[0].convertValueToPixel(chart.data[0].dataPoints[index].y);
		        var imageTop =  chart.axisY[0].convertValueToPixel(chart.axisY[0].maximum);
		        image.width('20px')
		            .css({
		                    "position": "absolute",
		                    "left": imageCenter - 10 + "px",
		                    "top":  imageY - 10 + "px"
		                }
		            );
		    }

		    $( window ).resize(function() {
		        var rainyCounter = 0, sunnyCounter = 0;
		        var imageCenter = 0;
		        for(var i=0;i<chart.data[0].dataPoints.length;i++){
		            imageCenter = chart.axisX[0].convertValueToPixel(chart.data[0].dataPoints[i].x) - 20;

		            if(chart.data[0].dataPoints[i].name == "rainy"){
		                $(".rainy").eq(rainyCounter++).css({ "left": imageCenter});
		            }
		            else if(chart.data[0].dataPoints[i].name == "sunny"){
		                $(".sunny").eq(sunnyCounter++).css({ "left": imageCenter});
		            }
		        }
		    });

		    function formatter(e) {
		        if(e.index === 0 && e.dataPoint.x === 0) {
		            return " Low " + e.dataPoint.y[e.index];
		        }
		        if(e.index == 1 && e.dataPoint.x === 0) {
		            return " High " + e.dataPoint.y[e.index];
		        }
		        else{
		            return e.dataPoint.y[e.index];
		        }
		    }
		</script>
	</div>
</body>
</html>