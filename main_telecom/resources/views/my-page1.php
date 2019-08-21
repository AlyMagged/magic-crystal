
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
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap_min.css') }}" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Quantity');
        data.addColumn('number', 'Troubles');
        data.addColumn('number', 'Calls');
        data.addColumn('number', 'Invoice');

        data.addRows([
        <?php
        $row1 = mysqli_fetch_array($result1);
        while($row = mysqli_fetch_array($result5))
          {

               echo "['".$row["ProductName"]."', ".$row['quantity'].",".$row['NumberOfTroubles'].",".$row1['df'].",50],";
               $row1 = mysqli_fetch_array($result1);

          }?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>


        //////////////////////////////

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawVisualization);

          function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Product', 'Quantity'],
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



        //////////////////////////////

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawVisualization);

          function drawVisualization() {

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

        /////////////////////////////



        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawVisualization);

          function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['Product', 'NumberOfRepetitionInCalls','Number of Calls Mentioned In','Average Repetition in a Call'],
              <?php
                              $result1 = mysqli_query($connect1, $query1);
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


        ////////////////////

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Quantity'],
          <?php
                          while($row = mysqli_fetch_array($result4))
                          {
                               echo "['".$row["ProductName"]."', ".$row['quantity']."],";
                          }
                          ?>
        ]);

        var options = {
          title: 'Quantity'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    ////////////////////////////////

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Product', 'Troubles'],
          <?php
          $result = mysqli_query($connect, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["ProductName"]."', ".$row['NumberOfTroubles']."],";
                          }
                          ?>
        ]);

        var options = {
          title: 'Troubles'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>




  </head>
  <body>



    <div id ="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
  </ul>
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
  </div>
  <div id="table_div" style="width: auto; height: 200px;"></div>
      <table style="width:100%">
        <tr>
          <th>


            <div id="chart_div4" style="width: 700px; height: 300px;"></div>


          </th>
          <th>

            <div id="chart_div" style="width: 700px; height: 300px;"></div>
            </th>
        </tr>
        <tr>
          <th>
            <div id="chart_div1" style="width: 700px; height: 300px;"></div>
          </th>
          <th>
            <!--<div id="piechart1" style="width: 700px; height: 300px;"></div>-->
          </th>

        </tr>
        <th>
        </th>
        <th>
        </th>
        <tr>

        </tr>




      </div>
    </div>

  </body>

</html>
