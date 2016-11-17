<?php
    include_once("header.php");
?>

<style type="text/css">
  body{
    background: #ffffff;
  }
</style>

<div>

    
<div class="status col-md-6">
  <h2>Status</h2>
  
  <table class="table status">
      <thead>
        <tr>
          <th>Restroom</th>
          <th>Toilet Paper</th>
          <th>Handwash</th>
          <th>Wet floor</th>
          <th>Paper Towel</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
</div>

<div class="stat col-md-6">
    <h2>Stats</h2>
  
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
      	
      	var screenWidth = $(".stat").width();
      	
      	var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, {width: screenWidth, height: 800, hAxis: { viewWindowMode:'explicit', viewWindow:{max:5,min:0}}});
      	console.log("Chart is updated!");
      }
      setInterval(drawChart,2500);
    </script>
    
    <div id="chart_div"></div>
</div>



<?php
    include_once("footer.php");
?> 