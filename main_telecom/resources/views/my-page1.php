
<?php
$connect = mysqli_connect("localhost", "root", "", "vtiger");
$query = "SELECT `vtiger_products`.`productname` as ProductName, COUNT(`vtiger_troubletickets`.`ticketid`) as NumberOfTroubles FROM `vtiger_products` LEFT OUTER JOIN `vtiger_troubletickets` ON `vtiger_products`.`productid`=`vtiger_troubletickets`.`product_id` group by `vtiger_products`.`productname`";
$result = mysqli_query($connect, $query);
$connect1 = mysqli_connect("192.168.1.90", "seif@localhost", "123456789", "speech");
$query1 = "SELECT name,tf FROM `products`";
$result1 = mysqli_query($connect1, $query1);
$query2 = "SELECT name,df FROM `products`";
$result2 = mysqli_query($connect1, $query2);
$query3 = "SELECT name,tf,df FROM `products`";
$result3 = mysqli_query($connect1, $query3);

?>




<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Product', 'NumberOfTroubles'],
          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["ProductName"]."', ".$row['NumberOfTroubles']."],";
                          }
                          ?>
        ]);

        var options = {
          title : 'Number of troubles per product',
          vAxis: {title: 'NumberOfTroubles'},
          hAxis: {title: 'Product'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Product', 'NumberOfRepetitionInCalls'],
          <?php
                          while($row = mysqli_fetch_array($result1))
                          {
                               echo "['".$row["name"]."', ".$row['tf']."],";
                          }
                          ?>
        ]);

        var options = {
          title : 'Number of Repetition in All Calls',
          vAxis: {title: 'Number of Repetition'},
          hAxis: {title: 'Product'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Number of Calls Mentioned In'],
          <?php
                          while($row = mysqli_fetch_array($result2))
                          {
                               echo "['".$row["name"]."', ".$row['df']."],";
                          }
                          ?>
        ]);

        var options = {
          title : 'Number of Calls Mentioned In',
          vAxis: {title: 'Number of Calls'},
          hAxis: {title: 'Product'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Average Repetition in a Call'],
          <?php
                          while($row = mysqli_fetch_array($result3))
                          {
                               echo "['".$row["name"]."', ".(int)$row['tf']/(int)$row['df']."],";
                          }
                          ?>
        ]);

        var options = {
          title : 'Average Repetition in a Call',
          vAxis: {title: 'Number of Repetition'},
          hAxis: {title: 'Product'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>

  </head>
  <body>
    <div id="chart_div" style="width: auto; height: 600px;"></div>
    <div id="chart_div1" style="width: auto; height: 600px;"></div>
    <div id="chart_div2" style="width: auto; height: 600px;"></div>
    <div id="chart_div3" style="width: auto; height: 600px;"></div>
  </body>

</html>
