<template>
  <div class="q-pa-md row q-gutter-md cards">

    <!-- Coluna com os 3 cards empilhados -->
    <div class="column q-gutter-md">
      <q-card class="my-card tall-card">
        <q-card-section class="row items-center q-gutter-sm">
          <div style="background-color: #1976D2; border-radius: 8px; width: 30px; height: 30px; text-align: center;">
            <q-icon name="payments" size="24px" color="white" />
          </div>
          <div class="text-h6">Current Balance</div>
        </q-card-section>
        <q-card-actions vertical align="center">
          <q-popup-edit v-model="formattedBalance" v-slot="scope" style="background-color: #0C0F12; color: white;">
            <q-input color="white" label-color="white" input-class="text-white" type="text" v-model="scope.value" dense autofocus />
          </q-popup-edit>
          <div class="card-value">{{ formattedBalance }}</div>
        </q-card-actions>
      </q-card>

      <q-card class="my-card tall-card">
        <q-card-section class="row items-center q-gutter-sm">
          <div style="background-color: #fc4242; border-radius: 8px; width: 30px; height: 30px; text-align: center;">
            <q-icon name="trending_down" size="24px" color="color" />
          </div>
          <div class="text-h6">Monthly Expenses</div>
        </q-card-section>
        <q-card-actions vertical align="center">
          <div class="card-value text-negative">{{ formattedBalance }}</div>
        </q-card-actions>
      </q-card>

      <q-card class="my-card tall-card">
        <q-card-section class="row items-center q-gutter-sm">
          <div style="background-color: #21a339; border-radius: 8px; width: 30px; height: 30px; text-align: center;">
            <q-icon name="savings" size="24px" color="white" />
          </div>
          <div class="text-h6">Monthly Savings</div>
        </q-card-section>
        <q-card-actions vertical align="center">
          <div class="card-value text-positive">{{ formattedBalance }}</div>
        </q-card-actions>
      </q-card>
    </div>

    <!-- Gráfico ao lado, alinhado com topo -->
    <q-card class="my-card dash-card self-start">
      <q-card-section class="row items-center q-gutter-sm">
        <div style="background-color: #4242f5; border-radius: 8px;">
          <q-icon name="show_chart" size="30px" color="white" />
        </div>
        <div class="text-h6">Dashboard:</div>
      </q-card-section>
      <q-card-actions class="" vertical align="center">
        <BarCharComponent />
      </q-card-actions>
    </q-card>
    <q-card class="my-card graphic-card self-start">
      <q-card-section class="row items-center q-gutter-sm">
        <div style="background-color: #f5bc42; border-radius: 8px;">
          <q-icon name="incomplete_circle" size="30px" color="white" />
        </div>
        <div class="text-h6">Graphic:</div>
        <q-space />
        <q-btn icon="filter_alt" round />
      </q-card-section>
      <q-card-actions class="graphic" vertical align="center">
        <DoughnutChart />
      </q-card-actions>
    </q-card>

  </div>

</template>


<script setup>
import { computed } from "vue";
import { toRefs } from "vue";
import DoughnutChart from "./Dashboard/DoughnutChart.vue";
import { defineProps } from "vue";
import BarCharComponent from "./Dashboard/BarCharComponent.vue";

const props = defineProps({
  balance: {
    type: Number,
    required: true,
    default: 0,
  }
});

const { balance } = toRefs(props);

const formattedBalance = computed(() =>
  new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
  }).format(balance.value)
);
</script>

<style scoped>
.card-value {
  font-size: 2rem;
  font-weight: bold;
  color: white;
}

.my-card {
  background-color: #0C0F12;
  color: white;
  font-size: larger;
  font-weight: 400;
  width: 350px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.cards {
  justify-content: center;
}

.tall-card {
  min-height: 150px;
}

.graphic-card {
  min-height: 520px;
  width: 400px;
}

.dash-card {
  min-height: 520px;
  width: 840px;
}
</style>