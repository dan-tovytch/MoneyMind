<template>
    <div class="fullscreen flex flex-center">
        <q-card class="q-pa-lg shadow-2 card" style="width: 450px;">
            <q-card-section>
                <div class="text-h6 text-center">Login</div>
            </q-card-section>

            <q-card-section>
                <q-input v-model="email" label="E-mail" filled type="email" lazy-rules
                    :rules="[val => val && val.includes('@') || 'Insira um e-mail válido']" bg-color="transparent"
                    color="white" label-color="white" input-class="text-white">
                    <template v-slot:prepend>
                        <q-icon name="person" color="white" />
                    </template>
                </q-input>
                <q-input v-model="password" label="Senha" filled :type="isPwd ? 'password' : 'text'" lazy-rules
                    color="white"
                    bg-color="transparent" label-color="white" input-class="text-white">
                    <template v-slot:append>
                        <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer"
                            @click="isPwd = !isPwd" color="white" />
                    </template>
                    <template v-slot:prepend>
                        <q-icon name="lock" color="white" />
                    </template>
                </q-input>
            </q-card-section>

            <q-card-actions align="center">
                <q-btn label="Entrar" style="background-color: #4242f5;" @click="login" class="full-width" />
            </q-card-actions>
        </q-card>
    </div>
</template>

<script setup>
import { useAuthStore } from '@/store/modules/auth';
import { useQuasar } from 'quasar';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const $q = useQuasar()
const router = useRouter()
const isPwd = ref(true)
const store = useAuthStore()
let email = ref('');
let password = ref('');

const login = () => {
    const formData =
    {
        email: email.value,
        password: password.value,
    }
    store.login(formData);

    $q.notify({ type: 'positive', message: 'Login realizado com sucesso!' })
    router.push('/')
};
</script>

<style scoped>
.fullscreen {
    height: 100vh;
}

.card {
    background-color: #0C0F12;
    color: white;
}
</style>
