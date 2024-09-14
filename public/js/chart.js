const ctx = document.getElementById('genderChart').getContext('2d');
const genderChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'Statistik Jenis Kelamin',
            data: [60, 40], // Jumlah data Laki-laki dan Perempuan
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',  // Warna untuk Laki-laki
                'rgba(255, 99, 132, 0.7)'   // Warna untuk Perempuan
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',  // Letak legenda
            },
            tooltip: {
                enabled: true  // Tooltip saat hover
            }
        }
    }
});