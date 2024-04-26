const ct = document.getElementById('ordersRateChart').getContext('2d');

const ordersRateChart = new Chart(ct, {
    type: 'line',
    data: {
        labels: ['Total Orders'],
        datasets: [{
            label: 'Orders Rate',
            data: [totalOrdersCount],
            backgroundColor: 'rgb(60,63,246,0.5)',

        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Orders'
                }
            }
        }
    }
});
