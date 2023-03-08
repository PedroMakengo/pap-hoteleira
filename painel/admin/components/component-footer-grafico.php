<?php require '../../public/admin_graphic/index.php' ?>

<script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../../assets/libs/js/main-js.js"></script>
<script src="../../assets/libs/js/dashboard-ecommerce.js"></script>
<script src="../../assets/js/template/Chart.min.js"></script>

    <script>
      $(function () {
        var lineChart = document.getElementById('mychart').getContext('2d')
        var myLineChart = new Chart(lineChart, {
          type: 'line',
          data: {
            labels: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec',
            ],
            datasets: [
              {
                label: 'Gráfico de usuário',
                borderColor: '#704828',
                pointBorderColor: '#704828',
                pointBackgroundColor: '#704828',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: <?= json_encode($mensalHospede) ?>,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: 'bottom',
              labels: {
                padding: 10,
                fontColor: '#1f6feb',
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: 'nearest',
              intersect: 0,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        })

        var lineChart = document.getElementById('saida').getContext('2d')
        var myLineChart = new Chart(lineChart, {
          type: 'bar',
          data: {
            labels: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec',
            ],
            datasets: [
              {
                label: 'Gráfico Geral de Saída',
                borderColor: '#704828',
                pointBorderColor: '#704828',
                pointBackgroundColor: '#704828',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: <?= json_encode($mensalHotel) ?>,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: 'bottom',
              labels: {
                padding: 10,
                fontColor: '#1f6feb',
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: 'nearest',
              intersect: 0,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        })

        var lineChart = document.getElementById('genero').getContext('2d')
        var myLineChart = new Chart(lineChart, {
          type: 'pie',
          data: {
            labels: ['Masculino', 'Feminino'],
            datasets: [
              {
                label: 'Gráfico Geral de Saída',
                borderColor: '#fff',
                pointBorderColor: '#704828',
                pointBackgroundColor: '#704828',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: ['#1f6feb', '#704828'],
                fill: true,
                borderWidth: 2,
                data: <?= json_encode($dataHospedeGenero) ?>,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: 'bottom',
              labels: {
                padding: 10,
                fontColor: '#1f6feb',
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: 'nearest',
              intersect: 0,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        })

        var lineChart = document.getElementById('fronteira').getContext('2d')
        var myLineChart = new Chart(lineChart, {
          type: 'line',
          data: {
            labels: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec',
            ],
            datasets: [
              {
                label: 'Gráfico de usuário',
                borderColor: '#704828',
                pointBorderColor: '#704828',
                pointBackgroundColor: '#704828',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: <?= json_encode($mensalReservas) ?>,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              position: 'bottom',
              labels: {
                padding: 10,
                fontColor: '#1f6feb',
              },
            },
            tooltips: {
              bodySpacing: 4,
              mode: 'nearest',
              intersect: 0,
              position: 'nearest',
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
            },
            layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
            },
          },
        })
      })
    </script>
  </body>
</html>
