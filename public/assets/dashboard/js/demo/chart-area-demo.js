  const ctx = document.getElementById('myChart');
  


  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Maquillaje', 'Accesorios'],
      datasets: [{
        label: 'Numero de productos por categoría',
        data: [10,15],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const barraLateral = document.getElementById('barChart');

  let barraChart = {
    label: 'Cantidad de productos en Stock',
    data: [10,5,8,6,3,4,7],
    backgroundColor: [
      'rgba(0, 99, 132, 0.6)',
      'rgba(30, 99, 132, 0.6)',
      'rgba(60, 99, 132, 0.6)',
      'rgba(90, 99, 132, 0.6)',
      'rgba(120, 99, 132, 0.6)',
      'rgba(150, 99, 132, 0.6)',
      'rgba(180, 99, 132, 0.6)',
      'rgba(210, 99, 132, 0.6)',
      'rgba(240, 99, 132, 0.6)'
    ],
    borderColor: [
      'rgba(0, 99, 132, 1)',
      'rgba(30, 99, 132, 1)',
      'rgba(60, 99, 132, 1)',
      'rgba(90, 99, 132, 1)',
      'rgba(120, 99, 132, 1)',
      'rgba(150, 99, 132, 1)',
      'rgba(180, 99, 132, 1)',
      'rgba(210, 99, 132, 1)',
      'rgba(240, 99, 132, 1)'
    ],
    borderWidth: 2,
    hoverBorderWidth: 0
  };

  let chartOptions = {
    scales: {
      yAxes: [{
        barPercentage: 0.5
      }]
    },
    elements: {
      rectangle: {
        borderSkipped: 'left',
      }
    }
  };
new Chart(barraLateral, {
    type: 'bar',
    data: {
      labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus"],
      datasets: [barraChart],
    },
    options: chartOptions
  });