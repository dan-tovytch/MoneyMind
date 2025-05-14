<template>
    <div class="q-pa-md q-gutter-y-sm toolbar">
        <q-toolbar class="text-primary toolbar-fixed">
            <q-img round dense
                :src="'https://lastfm.freetls.fastly.net/i/u/avatar170s/432e6d9a11964288c2c43911e722e00e.png'"
                style="width: 40px; height: 40px; border-radius: 25px;" />
            <div style="margin-left: 10px; display: flex; flex-direction: column;">
                <span style="color: white; font-size: medium;">{{ store.user.first_name }} {{ store.user.last_name
                }}</span>
                <span v-if="store.user?.role?.name" style="font-size: 12px; color: gray;">
                    {{ store.user.role.name.toUpperCase() }}
                </span>
            </div>
            <q-space />
            <q-tabs v-model="tab" shrink>
                <q-btn round icon="wallet" style="margin-right: 25px; color: white; font-size: 15px;"><q-tooltip>
                    Portfolio
                </q-tooltip></q-btn>
                <q-btn flat round name="tab2" icon="power_settings_new" color="white" style="background-color: red;">
                    <q-tooltip>
                        Logout
                    </q-tooltip>
                </q-btn>
            </q-tabs>
        </q-toolbar>
    </div>
</template>
<script setup>
import { useAuthStore } from '@/store/modules/auth';
import { onMounted, ref } from 'vue'

const tab = ref('')
const store = useAuthStore();


onMounted(() => {
    store.getUserAuthenticated()
})

</script>

<style scoped>
.toolbar {
    margin: auto;
    margin-top: 20px;
    width: 95%;
}
</style>