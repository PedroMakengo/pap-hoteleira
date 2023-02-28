var lineChart = document.getElementById("mycompra-chart").getContext("2d");
var myLineChart = new Chart(lineChart, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Empresas registadas",
        borderColor: "#212121",
        pointBorderColor: "#212121",
        pointBackgroundColor: "#212121",
        pointBorderWidth: 2,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 1,
        pointRadius: 4,
        backgroundColor: "#212121",
        fill: true,
        borderWidth: 2,
        data: [10, 20, 40, 10, 30, 10, 20, 30, 60, 20, 10, 20],
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: "bottom",
      labels: {
        padding: 10,
        fontColor: "#1d7af3",
      },
    },
    tooltips: {
      bodySpacing: 4,
      mode: "nearest",
      intersect: 0,
      position: "nearest",
      xPadding: 10,
      yPadding: 10,
      caretPadding: 10,
    },
    layout: {
      padding: { left: 15, right: 15, top: 15, bottom: 15 },
    },
  },
});

var lineChart = document.getElementById("databases-chart").getContext("2d");
var myLineChart = new Chart(lineChart, {
  type: "pie",
  data: {
    labels: ["Database 1", "Database 2", "Database 3", "Database 4"],
    datasets: [
      {
        label: "Empresas registadas",
        borderColor: "#fff",
        pointBorderColor: "#212121",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 2,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 1,
        pointRadius: 4,
        backgroundColor: [
          "#1E4FC7",
          "#212121",
          "#1E4FC7",
          "#212121",
          "#1E4FC7",
        ],
        fill: true,
        borderWidth: 2,
        data: [10, 20, 40, 10, 30],
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: "bottom",
      labels: {
        padding: 10,
        fontColor: "#1d7af3",
      },
    },
    tooltips: {
      bodySpacing: 4,
      mode: "nearest",
      intersect: 0,
      position: "nearest",
      xPadding: 10,
      yPadding: 10,
      caretPadding: 10,
    },
    layout: {
      padding: { left: 15, right: 15, top: 15, bottom: 15 },
    },
  },
});
