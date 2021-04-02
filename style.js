var marksCanvas = document.getElementById("marksChart");

var marksData = {
  labels: ["Shooting", "Passing", "Dribbling", "Defence", "Physical", "Pace"],
  datasets: [{
    label: "Praveen Kumar",
    backgroundColor: "rgba(200,0,0,0.2)",
    data: [98, 90, 95, 73, 80, 92]
  }]
};

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});