const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
  type: "pie",
  data: {
    labels: ["Used", "Unused"],
    datasets: [
      {
        label: "# of Votes",
        data: [39, 61],
        backgroundColor: ["#044A8B", "#F98901"],
      },
    ],
  },
  options: {
    plugins: {
      legend: {
        position: "right",
      },
    },
    responsive: true,
    aspectRatio: 2,
  },
});
