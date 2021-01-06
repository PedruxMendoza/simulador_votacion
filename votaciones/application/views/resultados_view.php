	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Partido Politico', 'Votos'],
          <?php foreach ($result as $r) { ?>
          ['<?php echo $r->nombre_partido ?>', <?php echo $r->Votos ?>],
          <?php } ?>
        ]);

        var options = {
          title: 'Resultados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Partido Politico', 'Votos'],
          <?php foreach ($result as $r) { ?>
          ['<?php echo $r->nombre_partido ?>', <?php echo $r->Votos ?>],
          <?php } ?>
        ]);

        var options = {
          title: 'Resultados',
          width: '100%',
          legend: { position: 'none' },
          chart: { title: 'Resultados',
                   subtitle: 'Por Votos' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Votos'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
    <script type="text/javascript">
    	$(window).resize(function(){
  		drawChart();
  		drawStuff();
	});
    </script>
    <style type="text/css">
    	.chart {
  width: 100%;
  min-height: 450px;
}
    </style>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view('templates/navbar') ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('welcome/index') ?>">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Resultados</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-pie"></i>
            Porcentajes de Votos Obtenidos</div>
          <div class="card-body">
            <div id="piechart" class="chart"></div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <div class="card mb-3">
         <div class="card-header">
            <i class="fas fa-chart-bar"></i>
            Votos Obtenidos</div>
         <div class="card-body">
            <div id="top_x_div" class="chart"></div>
         </div>
         <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Votaciones 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->