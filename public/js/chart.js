function createBarChart(selector = "#barChart", data, barOptions = options) {
  var barChartCanvas = $(selector).get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas, {
    type: "bar",
    data: data,
    options: barOptions,
  });
}

function createLineChart(selector = "#lineChart", data, lineOptions = options) {
  var lineChartCanvas = $(selector).get(0).getContext("2d");
  var lineChart = new Chart(lineChartCanvas, {
    type: "line",
    data: data,
    options: lineOptions,
  });
}

function createDoughnutChart(
  selector = "#doughnutChart",
  data,
  doughnutOptions = optionDoughnut
) {
  var doughnutChartCanvas = $(selector).get(0).getContext("2d");
  var doughnutChart = new Chart(doughnutChartCanvas, {
    type: "doughnut",
    data: data,
    options: doughnutOptions,
  });
}

var options = {
  scales: {
    yAxes: [
      {
        ticks: {
          beginAtZero: true,
        },
      },
    ],
  },
  elements: {
    point: {
      radius: 0,
    },
  },
  plugins: {
    legend: {
      display: false,
    },
    datalabels: {
      display: true,
      color: "white",
      align: "top",
      anchor: "end",
      clamp: true,
      formatter: function (value, ctx) {
        return ctx.chart.data.labels[ctx.dataIndex] + ": " + value;
      },
    },
  },
};

var optionDoughnut = {
  aspectRatio: 1,
  cutoutPercentage: 60,
  responsive: true,
  maintainAspectRatio: false,
  legend: {
    display: false,
  },
  animation: {
    animateScale: true,
  },
  plugins: {
    datalabels: {
      display: true,
      color: "white",
      align: "top",
      anchor: "end",
      clamp: true,
      formatter: function (value, ctx) {
        return ctx.chart.data.labels[ctx.dataIndex] + ": " + value;
      },
    },
  },
};
