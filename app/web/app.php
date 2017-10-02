<?php
function get_tags() {
  $db = mysqli_connect("db", "logger", "password", "log_activities")
  or die('Error connecting to MySQL server.');
  $query = "SELECT * FROM logs";
  mysqli_query($db, $query) or die('Error querying database.');

  $result = mysqli_query($db, $query);
  $rows = [];
  while($r = mysqli_fetch_assoc($result)) {
      $rows[] = [$r['task_ref'],$r['tag'],$r['task_name'],$r['start'],$r['end'],(int)$r['duration'],50,$r['dependencies']];
      }
  mysqli_close($db);
  return json_encode($rows);
}
?>


<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function toMilliseconds(minutes) {
      return minutes * 60 * 1000;
    }

    function drawChart() {
      var jsonarray = <?php print get_tags(); ?>;
      console.log(jsonarray)
      for(var i = 0; i<jsonarray.length; i++) {
          console.log(jsonarray)
          if jsonarray[i][3] !== null {
            jsonarray[i][3] = new Date(jsonarray[i][3]);
            console.log(jsonarray)
          }
      }

      var otherData = new google.visualization.DataTable();
      otherData.addColumn('string', 'Task ID');
      otherData.addColumn('string', 'Tag');
      otherData.addColumn('string', 'Task Name');
      otherData.addColumn('date', 'Start');
      otherData.addColumn('date', 'End');
      otherData.addColumn('number', 'Duration');
      otherData.addColumn('number', 'Percent Complete');
      otherData.addColumn('string', 'Dependencies');

      otherData.addRows(jsonarray)
      var options = {
        height: 500,
        gantt: {
          defaultStartDateMillis: new Date(2017, 9, 29)
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(otherData, options);
    }

  </script>
</head>
<body>
  <div id="chart_div"></div>
</body>
</html>
