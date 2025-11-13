document.addEventListener('DOMContentLoaded', function() {
    const barEl = document.getElementById('barChart');
    if (barEl) {
        const barData = barEl.getAttribute('data-chart') || '[]';
        window.renderChart(barEl, {
            series: JSON.parse(barData),
            chart: {
                type: "bar",
                height: 350,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0
                },
            },
            title: {
                text: 'Votes Per Batch Session',
                align: 'left',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#10B981", "#EF4444"],
            xaxis: {
                categories: ["2020", "2021", "2022", "2023", "2024", "2025"],
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "12px",
                        fontFamily: "inherit",
                        fontWeight: 400,
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: "#616161ff",
                        fontSize: "12px",
                        fontFamily: "inherit",
                        fontWeight: 400,
                    },
                },
            },
            grid: {
                show: true,
                borderColor: "#dddddd",
                strokeDashArray: 5,
                padding: {
                    top: 5,
                    right: 20,
                },
            },
            legend: {
                position: 'top'
            },
            tooltip: {
                theme: "dark"
            },
        });
    }

    const pieEl = document.getElementById('pieChart');
    if (pieEl) {
        const pieData = JSON.parse(pieEl.getAttribute('data-chart') || '{}');
        window.renderChart(pieEl, {
            chart: {
                type: 'pie',
                height: 350,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0
                },
            },
            title: {
                text: 'Overall Voting Status',
                align: 'left',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            },
            series: [pieData.hasVoted, pieData.notVoted],
            labels: ['Has Voted', 'Not Voted'],
            colors: ['#10B981', '#EF4444'],
            legend: {
                position: 'bottom',
            },
        });
    }
});
