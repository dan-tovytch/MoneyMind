<template>
    <q-layout view="hHh lpR fFf">
        <q-drawer v-model="drawer" show-if-above style="background-color: #0C0F12; color: #fff;" :width="200"
            :mini="miniState" mini-to-overlay :mini-width="64">
            <q-list>
                <q-item clickable v-ripple @click="miniState = !miniState">
                    <q-item-section avatar>
                        <q-icon name="menu" size="25px" />
                    </q-item-section>
                    <q-item-section v-if="!miniState">
                        <q-item-label>Menu</q-item-label>
                    </q-item-section>
                </q-item>
                <q-separator />

                <q-item v-for="(route, index) in menuRoutes" :key="index" clickable v-ripple :to="route.path"
                    @click="route.action">
                    <q-item-section avatar>
                        <q-icon :name="route.icon" :style="route.style" size="25px" />
                    </q-item-section>
                    <q-item-section v-if="!miniStore">
                        <q-item-label>{{ route.label }}</q-item-label>
                    </q-item-section>
                </q-item>
            </q-list>
        </q-drawer>

        <q-page-container>
            <router-view />
        </q-page-container>

    </q-layout>
</template>

<script setup>
import { ref } from 'vue';

const drawer = ref(true);
const miniState = ref(false);

const menuRoutes = ref([
    { label: "Home", path: "/login", icon: "home" },
    { label: "Perfil", path: "/profile", icon: "person" },
    { label: "Configurações", path: "/settings", icon: "settings" },
]);

</script>

<style scoped>
.q-drawer {
    transition: width 0.3s ease-in-out;
}

.bg-dark {
    background: #0C0F12 !important;
}
</style>