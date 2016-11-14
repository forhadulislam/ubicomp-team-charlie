<?php
    include_once("header.php");
?>

<style type="text/css">
  body{
    background: #ffffff;
  }
</style>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'Feedbacks from users',
                       'width':500,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<div class="col-md-6 col-md-offset-3">
  <h3>Status</h3>
  
  <table class="table status">
      <thead>
        <tr>
          <th>Restroom</th>
          <th>Toilet Paper</th>
          <th>handwash</th>
          <th>Wet floor</th>
        </tr>
      </thead>
      <tbody>
        <!--<tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
          <td>Doe</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Moe</td>
          <td>mary@example.com</td>
          <td>Doe</td>
        </tr>
        <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com</td>
          <td>Doe</td>
        </tr>-->
      </tbody>
    </table>
    
    <div id="chart_div"></div>
</div>



<?php
    include_once("footer.php");
?> 