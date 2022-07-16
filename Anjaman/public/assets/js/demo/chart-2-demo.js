
var xValues = ["Keranjang", "Tas", "Topi", "Pot",];
var barColors = [
  "#4e73df",
  "#1cc88a",
  "#36b9cc",
  "#FADA5E",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});

