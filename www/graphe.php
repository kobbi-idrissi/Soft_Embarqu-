  <?php
 
$dataPoints = array();

    $db= new PDO("sqlite:/home/pi/www/tempbase.db");
    $sql = "SELECT * FROM temps ORDER BY timestamp DESC LIMIT 20  "; 
    $i=1;
   foreach($db->query($sql) as $row){
   	$date = new DateTime($row [timestamp]);
		//strtotime(JSON_NUMERIC_CHECKDD-MMM-YY-hh:mm:ss
       array_push($dataPoints , array("x"=>strtotime($row [timestamp])*1000 ,"y"=>$row[temp]));
    	$i=$i+1;
    }
	$db = null;
 $i=1;

$datadistance = array();

    $db2= new PDO("sqlite:/home/pi/www/distance-BD.db");
    $sql2 = "SELECT * FROM distance ORDER BY rowid DESC LIMIT 20  "; 
    $j=1;
   foreach($db2->query($sql2) as $row){
   	 	array_push($datadistance , array("x"=>$j ,"y"=>$row[distance]));
    	$j=$j+1;
    }
	$db2 = null;
 $j=1;
?>


<!DOCTYPE HTML>
<html>
<title>graphe</title>
<head>  

<script>

window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "the last 20 value of the temperature with °C"
	},
	axisX:{
        title: "timeline" },
        axisY:{
        title: "temperature" },
	data: [{
	 	interval : 1,
	 	        intervalType: "minute",
        
		xValueType: "dateTime",
		xValueFormatString: "MMM-YY-hh:mm:ss",
		type: "area", //change type to bar, line, area, pie,column etc  
		dataPoints: <?php echo json_encode($dataPoints,JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
 
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "the last 20 value of the distance cm"
	},
	
        axisY:{
        title: "Distance" },
	data: [{
	 	interval : 1,
	 	      
        
		
		type: "column", //change type to bar, line, area, pie,column etc  
		dataPoints: <?php echo json_encode($datadistance,JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 
}

</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<div id="chartContainer2" style="height: 370px; width: 100%;margin-top:50px"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<button onclick="history.go(-1);">Back To index page</button>
</body>
</html> 


