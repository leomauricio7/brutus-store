@extends('admin.templates.template')

@section('content')
<blockquote>
      <h5>Graficos demonstrativos das vendas </h5>
</blockquote>
<hr>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Canivete', 'Alicate', 'Serrote', 'Pistola', 'Mochila', 'Pal de Self'],
          ['10/2018',  165,      938,         522,             998,           450,      614.6],
          ['11/2018',  135,      1120,        599,             1268,          288,      682],
          ['12/2018',  157,      1167,        587,             807,           397,      623],
          ['01/2019',  139,      1110,        615,             968,           215,      609.4],
          ['02/2019',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Produtos Vendidos',
          vAxis: {title: 'Cups'},
          hAxis: {title: 'Mês'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
@endsection
