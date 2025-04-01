<template>
    <div class="fullscreen flex flex-center">
        <q-card class="q-pa-lg shadow-2" style="width: 450px">
            <q-card-section>
                <div class="text-h6 text-center">Login</div>
            </q-card-section>

            <q-card-section>
                <q-input v-model="email" label="E-mail" filled type="email" lazy-rules
                    :rules="[val => val && val.includes('@') || 'Insira um e-mail válido']">
                    <template v-slot:prepend>
                        <q-icon name="person" />
                    </template>
                </q-input>
                <q-input v-model="password" label="Senha" filled :type="isPwd ? 'password' : 'text'" lazy-rules
                    :rules="[val => val && val.length >= 6 || 'A senha deve ter pelo menos 6 caracteres']">
                    <template v-slot:append>
                        <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer"
                            @click="isPwd = !isPwd" />
                    </template>
                    <template v-slot:prepend>
                        <q-icon name="lock" />
                    </template>
                </q-input>
            </q-card-section>

            <q-card-actions align="center">
                <q-btn label="Entrar" color="primary" @click="login" class="full-width" />
            </q-card-actions>
        </q-card>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useQuasar } from 'quasar';
import { useRouter } from 'vue-router';

const $q = useQuasar();
const router = useRouter();
const isPwd = ref(true)
const email = ref('');
const password = ref('');

const login = () => {
    if (email.value === "admin@email.com" && password.value === "123456") {
        $q.notify({ type: "positive", message: "Login bem-sucedido!" });
        router.push("/");
    } else {
        $q.notify({ type: "negative", message: "Credenciais inválidas!" });
    }
};
</script>

<style scoped>
.fullscreen {
    height: 100vh;
    background: #f5f5f5;
}
</style>
