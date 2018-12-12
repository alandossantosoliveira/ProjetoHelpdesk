function geraGrafico(jsonobj, titulo, id){

google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          jsonobj[0],
          jsonobj[1],
          jsonobj[2],
          jsonobj[3],
          jsonobj[4],
          jsonobj[5],
          jsonobj[6],
        ]);

        var options = {
          width: 400,
	  height: 300,
          title: titulo,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById(id));
        chart.draw(data, options);
  }

}
