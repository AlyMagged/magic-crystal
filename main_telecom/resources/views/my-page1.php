
<?php
$connect = mysqli_connect("localhost", "root", "", "vtiger");
$query = "SELECT `vtiger_products`.`productname` as ProductName, COUNT(`vtiger_troubletickets`.`ticketid`) as NumberOfTroubles FROM `vtiger_products` LEFT OUTER JOIN `vtiger_troubletickets` ON `vtiger_products`.`productid`=`vtiger_troubletickets`.`product_id` group by `vtiger_products`.`productname`";
$result = mysqli_query($connect, $query);
$connect1 = mysqli_connect("192.168.1.90", "seif@localhost", "123456789", "speech");
$query1 = "SELECT name,tf,df FROM `products`";
$result1 = mysqli_query($connect1, $query1);

$query4 = "SELECT  `vtiger_products`.`productname` as ProductName,`vtiger_products`.`qtyinstock` as quantity FROM `vtiger_products` ORDER by quantity DESC limit 10";
$result4 = mysqli_query($connect, $query4);
$query5 = "SELECT `vtiger_products`.`productname` as ProductName,`vtiger_products`.`qtyinstock` as quantity, COUNT(`vtiger_troubletickets`.`ticketid`) as NumberOfTroubles FROM `vtiger_products` LEFT OUTER JOIN `vtiger_troubletickets` ON `vtiger_products`.`productid`=`vtiger_troubletickets`.`product_id` group by `vtiger_products`.`productname` limit 10";
$result5 = mysqli_query($connect, $query5);
?>


<html>
  <head>
    <meta charset="utf-8">
    <style>


    </style>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Product name');
        data.addColumn('number', 'Quantity');
        data.addColumn('number', 'troubles');
        data.addColumn('number', 'Invoices');
        data.addColumn('number', 'Calls');

        data.addRows([
          <?php
                          $row1=mysqli_fetch_array($result1);
                          while($row = mysqli_fetch_array($result5))
                          {

                               echo "['".$row["ProductName"]."', ".$row['quantity'].",".$row['NumberOfTroubles'].",".$row1['df'].",50,40],";
                               $row1=mysqli_fetch_array($result1);
                          }
                          $result1 = mysqli_query($connect1, $query1);

                          ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Product', 'NumberOfTroubles'],
          <?php
                          while($row = mysqli_fetch_array($result4))
                          {
                               echo "['".$row["ProductName"]."', ".$row['quantity']."],";
                          }
                          ?>
        ]);

        var options = {
          title : 'quantity per product',
          vAxis: {title: 'quantity'},
          hAxis: {title: 'Product'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
    </script>




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
          ['Product', 'NumberOfRepetitionInCalls','Number of Calls Mentioned In','Average Repetition in a Call'],
          <?php
                          while($row = mysqli_fetch_array($result1))
                          {
                               echo "['".$row["name"]."', ".$row['tf'].", ".$row['df'].", ".(int)$row['tf']/(int)$row['df']."],";
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



  </head>
  <body>
    <div id ="container">
      <div id ="inner">
          <div id="table_div" style="width: auto; height: 200px;"></div>
          <div id="chart_div4" style="width: 700px; height: 300px;"></div>
          <div id="chart_div" style="width: 700px; height: 300px;"></div>
          <div id="chart_div1" style="width: 700px; height: 300px;"></div>

      </div>
    </div>

  </body>

</html>
