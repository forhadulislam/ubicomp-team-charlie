<?php
    //include_once("header.php");
?>

    <h3>Status</h3>


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
   
    // Load the Visualization API.
    google.load('visualization', '1', {'packages':['corechart']});
    
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
     function getData() {
     	 var jsonData = $.ajax({
     	    type: 'GET',
          data: { func: "getRestroomStat"},
          url: "ajax-calls.php",
          dataType:"json",
          async: false
          }).responseText;
          
          return jsonData;
     }
     function updateData() {
     	var jsonData = getData();
	    console.log(jsonData);         
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable();
    	data.addColumn('string', 'restroom');
    	data.addColumn('number', 'toilet-paper');
    	data.addColumn('number', 'handwash');
    	data.addColumn('number', 'paper-towel');
    	data.addColumn('number', 'wet-floor');
    	data.addRows(JSON.parse(jsonData));
	
	    return data;
     }
	
    function drawChart(chart) {
    var jsonData = getData();
	console.log(jsonData);         
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable();
	data.addColumn('string', 'restroom');
	data.addColumn('number', 'toilet-paper');
	data.addColumn('number', 'handwash');
	data.addColumn('number', 'paper-towel');
	data.addColumn('number', 'wet-floor');
	data.addRows(JSON.parse(jsonData));
	
	var screenWidth = window.innerWidth;
	
	var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, {width: screenWidth, height: 800, hAxis: { viewWindowMode:'explicit', viewWindow:{max:5,min:0}}});
	console.log("Chart is updated!");
    }
	setInterval(drawChart,2500);
    </script>

<div id="chart_div"></div>


<?php
    include_once("footer.php");
?> 