<template>
  <div style="height: 400px; width: 800px;">
    <Bar :options="chartOptions" :data="chartData" />
  </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: { Bar },
  data() {
  return {
    chartData: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Monthly Revenue',
          data: [40, 20, 12, 20, 52, 33, 44, 24, 43, 77, 63, 88],
          backgroundColor: '#4242f5', // cor da barra
          borderColor: '#4242f5',     // borda da barra
          borderWidth: 2,
          borderRadius: 5, // bordas arredondadas
          barThickness: 30 // largura da barra
        }
      ]
    },
    chartOptions: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Financial Performance in 2025',
          color: '#fff',
          font: {
            size: 20,
            weight: 'bold',
            family: 'Arial'
          }
        },
        legend: {
          display: true,
          labels: {
            color: '#fff',
            font: {
              size: 14
            }
          }
        },
        tooltip: {
          backgroundColor: '#333',
          titleColor: '#fff',
          bodyColor: '#ccc'
        }
      },
      scales: {
        x: {
          ticks: {
            color: '#ccc',
            font: {
              size: 12
            }
          },
          grid: {
            color: 'rgba(255,255,255,0.1)'
          }
        },
        y: {
          beginAtZero: true,
          ticks: {
            color: '#ccc',
            font: {
              size: 12
            }
          },
          grid: {
            color: 'rgba(255,255,255,0.1)'
          }
        }
      }
    }
  }
}

}
</script>