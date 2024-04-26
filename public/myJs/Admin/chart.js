

const ctx = document.getElementById('salesCountChart').getContext('2d');

// Create the chart
const salesCountChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Sales Count by Products',
            data: salesCounts,
            backgroundColor: 'rgb(60,63,246,0.5)',
        }]
    },
    options: {
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Sales Count'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Products'
                }
            }
        }
    }
});
