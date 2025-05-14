<template>
  <div style="height: 300px; width: 300px;">
    <Doughnut :data="data" :options="options" />
  </div>
</template>

<script>
import { Doughnut } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'

ChartJS.register(ArcElement, Tooltip, Legend)

export default {
  name: 'DoughnutChart',
  components: {
    Doughnut
  },
  data() {
    return {
      data: {
        labels: ['VueJs', 'ReactJs', 'Angular'],
        datasets: [{
          backgroundColor: ['#41B883', '#00D8FF', '#DD1B16'],
          data: [40, 30, 30]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    }
  }
}
</script>

<style scoped>
/* se quiser forçar altura, aqui também */
</style>
