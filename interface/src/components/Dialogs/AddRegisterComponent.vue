<template>
  <q-dialog v-model="store.isDialogVisible">
    <q-card style="min-width: 450px; background-color: #0C0F12; color: white;">
      <q-card-section>
        <div class="text-h6">Register</div>
      </q-card-section>

      <q-card-section>
        <q-card-section>
          <q-input dark v-model="form.name" label="Name" filled color="white" label-color="white" input-class="text-white" />
        </q-card-section>
        <q-card-section>
          <q-input dark v-model="form.value" label="Value" type="number" filled class="q-mt-sm" color="white" label-color="white"
            input-class="text-white" />
        </q-card-section>
        <q-card-section>
          <q-select dark v-model="form.pay_type" emit-value map-options :options="optionsPayment" label="Pay Type" filled class="q-mt-sm" color="white"
            label-color="white" input-class="text-white" />
        </q-card-section>
        <q-card-section>
          <q-select dark v-model="form.installments" emit-value map-options :options="InstallmentsOptions" label="Installments" filled class="q-mt-sm"
            color="white" label-color="white" input-class="text-white" />
        </q-card-section>
        <q-card-section>
          <q-select dark v-model="form.pay_status" emit-value map-options :options="['pending', 'paid', 'overdue']" label="Payment Status" filled
            class="q-mt-sm" color="white" label-color="white" input-class="text-white" />
        </q-card-section>
        <q-card-section>
          <q-input dark v-model="form.pay_with" label="Pay with" type="text" filled class="q-mt-sm" color="white"
            label-color="white" input-class="text-white" />
        </q-card-section>
      </q-card-section>

      <q-card-actions align="right">
        <q-btn label="Cancelar" style="background-color: #fc4242; color: white;" @click="closeDialog" />
        <q-btn label="Salvar" style="background-color: #21a339; color: white;" @click="onSave" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script setup>
import { ref } from 'vue';
import { useAddRegisterStore } from '@/store/modules/dialogs/addRegister';

const store = useAddRegisterStore();
const form = ref({
  name: '',
  value: '',
  pay_type: '',
  installments: '',
  pay_with: '',
})

const optionsPayment = [
  {
    label: "Pix",
    value: 1,
  },
  {
    label: "Credit Card",
    value: 2,
  },
  {
    label: "Direct Debit",
    value: 3,
  },
  {
    label: "Money",
    value: 4,
  }
]

const InstallmentsOptions = Array.from({ length: 48 }, (_, i) => {
  const value = i + 1;
  return {
    label: `${value}x`,
    value: value
  };
});

const onSave = () => {
  store.saveData(form.value);
  closeDialog();
};

const closeDialog = () => {
  store.closeDialog();
};
</script>

<style scoped>



</style>