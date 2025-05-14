<template>
    <div class="card-table">
        <div class="q-pa-md table">
            <!-- Botão para exportar para CSV -->
            <q-btn icon="archive" label="Export to csv" no-caps @click="exportTable"
                style="margin-left: 15px; background-color: #21a339; color: white;" />
            <q-btn icon="add" label="Add" no-caps @click="openDialog"
                style="margin-left: 20px; background-color: #4242f5; color: white;" />

            <q-table class="custom-table" flat bordered title="Expenses" :rows="rows" :columns="columns" row-key="name"
                :loading="loading" binary-state-sort>
                <template v-slot:top-right="props">
                    <div class="row items-center no-wrap q-gutter-sm">
                        <q-input class="custom-input" dense debounce="300" v-model="filter" label="Search" filled
                            color="white" dark>
                            <template v-slot:append>
                                <q-icon name="search" color="white" />
                                <q-icon v-if="filter" name="backspace" size="15px" color="red"
                                    class="cursor-pointer q-ml-sm" @click="clearFilter" />
                            </template>
                        </q-input>
                        <q-btn flat round dense :icon="props.inFullscreen ? 'fullscreen_exit' : 'fullscreen'"
                            @click="props.toggleFullscreen" class="q-ml-md" />
                    </div>
                </template>

                <template v-slot:body="props">
                    <q-tr :props="props">
                        <q-td key="name" :props="props">
                            {{ props.row.name }}
                            <q-popup-edit v-model="props.row.name" v-slot="scope">
                                <q-input v-model="scope.value" dense autofocus counter @keyup.enter="scope.set" />
                            </q-popup-edit>
                        </q-td>

                        <q-td key="calories" :props="props">
                            {{ props.row.calories }}
                            <q-popup-edit v-model="props.row.calories" title="Update calories" buttons v-slot="scope">
                                <q-input type="number" v-model="scope.value" dense autofocus />
                            </q-popup-edit>
                        </q-td>

                        <q-td key="fat" :props="props">
                            <div class="text-pre-wrap">{{ props.row.fat }}</div>
                            <q-popup-edit v-model="props.row.fat" v-slot="scope">
                                <q-input type="textarea" v-model="scope.value" dense autofocus />
                            </q-popup-edit>
                        </q-td>

                        <q-td key="carbs" :props="props">
                            {{ props.row.carbs }}
                            <q-popup-edit v-model="props.row.carbs" title="Update carbs" buttons persistent
                                v-slot="scope">
                                <q-input type="number" v-model="scope.value" dense autofocus
                                    hint="Use buttons to close" />
                            </q-popup-edit>
                        </q-td>

                        <q-td key="protein" :props="props">{{ props.row.protein }}</q-td>
                        <q-td key="sodium" :props="props">{{ props.row.sodium }}</q-td>
                        <q-td key="calcium" :props="props">{{ props.row.calcium }}</q-td>
                        <q-td key="iron" :props="props">{{ props.row.iron }}</q-td>
                    </q-tr>
                </template>
            </q-table>
        </div>
    </div>
</template>

<script setup>
// import { useQuasar } from 'quasar'
import { ref } from 'vue'
import { useAddRegisterStore } from '@/store/modules/dialogs/addRegister';

const columns = ref([
    {
        name: 'name',
        required: true,
        label: 'Dessert (100g serving)',
        align: 'left',
        field: row => row.name,
        format: val => `${val}`,
        sortable: true
    },
    { name: 'calories', align: 'center', label: 'Calories', field: 'calories', sortable: true },
    { name: 'fat', label: 'Fat (g)', field: 'fat', sortable: true, style: 'width: 10px' },
    { name: 'carbs', label: 'Carbs (g)', field: 'carbs' },
    { name: 'protein', label: 'Protein (g)', field: 'protein' },
    { name: 'sodium', label: 'Sodium (mg)', field: 'sodium' },
    { name: 'calcium', label: 'Calcium (%)', field: 'calcium', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) },
    { name: 'iron', label: 'Iron (%)', field: 'iron', sortable: true, sort: (a, b) => parseInt(a, 10) - parseInt(b, 10) }
])

const rows = ref([
    {
        name: 'Frozen Yogurt',
        calories: 159,
        fat: 6.0,
        carbs: 24,
        protein: 4.0,
        sodium: 87,
        calcium: '14%',
        iron: '1%'
    },
    {
        name: 'Ice cream sandwich',
        calories: 237,
        fat: 9.0,
        carbs: 37,
        protein: 4.3,
        sodium: 129,
        calcium: '8%',
        iron: '1%'
    },
    {
        name: 'Eclair',
        calories: 262,
        fat: 16.0,
        carbs: 23,
        protein: 6.0,
        sodium: 337,
        calcium: '6%',
        iron: '7%'
    },
    {
        name: 'Cupcake',
        calories: 305,
        fat: 3.7,
        carbs: 67,
        protein: 4.3,
        sodium: 413,
        calcium: '3%',
        iron: '8%'
    },
    {
        name: 'Gingerbread',
        calories: 356,
        fat: 16.0,
        carbs: 49,
        protein: 3.9,
        sodium: 327,
        calcium: '7%',
        iron: '16%'
    },
    {
        name: 'Jelly bean',
        calories: 375,
        fat: 0.0,
        carbs: 94,
        protein: 0.0,
        sodium: 50,
        calcium: '0%',
        iron: '0%'
    },
    {
        name: 'Lollipop',
        calories: 392,
        fat: 0.2,
        carbs: 98,
        protein: 0,
        sodium: 38,
        calcium: '0%',
        iron: '2%'
    },
    {
        name: 'Honeycomb',
        calories: 408,
        fat: 3.2,
        carbs: 87,
        protein: 6.5,
        sodium: 562,
        calcium: '0%',
        iron: '45%'
    },
    {
        name: 'Donut',
        calories: 452,
        fat: 25.0,
        carbs: 51,
        protein: 4.9,
        sodium: 326,
        calcium: '2%',
        iron: '22%'
    },
    {
        name: 'KitKat',
        calories: 518,
        fat: 26.0,
        carbs: 65,
        protein: 7,
        sodium: 54,
        calcium: '12%',
        iron: '6%'
    }
])

// const $q = useQuasar();
const dialogStore = useAddRegisterStore();


const filter = ref('')
const loading = ref(false)
const openDialog = () => {
    dialogStore.openDialog();
}

// Função para exportar a tabela para CSV
const exportTable = () => {

    // Verificando se 'columns' e 'rows' estão definidos corretamente
    if (!columns.value || !rows.value) {
        console.error('Columns or rows are undefined');
        return;
    }

    const headers = columns.value.map(col => col.label).join(',') + '\n';
    const rowsData = rows.value.map(row => columns.value.map(col => row[col.name]).join(',')).join('\n');
    const csvContent = headers + rowsData;

    // Criando o arquivo CSV e acionando o download
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', 'tabela.csv');
    link.click();
    URL.revokeObjectURL(url);
}

const clearFilter = () => {
    filter.value = ''
}


</script>
<style scoped>
.card-table {
    margin: 20px auto;
    padding-top: 10px;
    background-color: #0C0F12;
    width: 94%;
    border-radius: 10px;
}

.custom-table {
    background-color: #0C0F12;
    color: #ffffff;
}

.custom-table .q-tr {
    background-color: #0C0F12;
}

.custom-table .q-td,
.custom-table .q-th {
    border-color: #0C0F12;
}

.custom-table .q-tr:nth-child(even) {
    background-color: #1A1E24;
}
</style>
