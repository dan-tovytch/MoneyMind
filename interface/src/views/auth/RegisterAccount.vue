<template>
  <div class="fullscreen flex flex-center">
    <q-card class="q-pa-lg shadow-2 card" style="width: 500px">
      <q-card-section>
        <div class="text-h6 text-center">Register</div>
      </q-card-section>

      <q-card-section>
        <q-form>
          <div class="q-gutter-md row">
            <q-input v-model="firstName" label="First Name" filled type="text" class="col" color="white"
              label-color="white" input-class="text-white" />
            <q-input v-model="lastName" label="Last Name" filled type="text" class="col" color="white"
              label-color="white" input-class="text-white" />
          </div>

          <div class="q-gutter-md row q-mt-md">
            <q-input v-model="email" label="E-mail" filled type="email" class="col" color="white" label-color="white"
              input-class="text-white" />
            <q-input v-model="phone" label="Phone Number" filled type="tel" class="col" color="white"
              label-color="white" input-class="text-white" />
          </div>

          <div class="q-gutter-md row q-mt-md">
            <q-input v-model="password" label="Password" filled :type="isPwd ? 'password' : 'text'" class="col"
              :rules="[val => val && val.length >= 3 || 'A senha deve ter pelo menos 3 caracteres']" color="white"
              label-color="white" input-class="text-white">
              <template v-slot:append>
                <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer" @click="isPwd = !isPwd"
                  color="white" />
              </template>
            </q-input>

            <q-input v-model="confirmPassword" label="Confirm Password" filled :type="isPwd ? 'password' : 'text'"
              class="col" :rules="[val => val && val.length >= 3 || 'A senha deve ter pelo menos 3 caracteres']"
              color="white" label-color="white" input-class="text-white">
              <template v-slot:append>
                <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer" @click="isPwd = !isPwd"
                  color="white" />
              </template>
            </q-input>
          </div>
        </q-form>
      </q-card-section>

      <q-card-actions align="center">
        <q-btn label="Create Account" style="background-color: #4242f5;" @click="register" class="full-width" />
      </q-card-actions>
    </q-card>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useQuasar } from 'quasar'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/store/modules/auth';

const store = useAuthStore();
const $q = useQuasar()
const router = useRouter()
const isPwd = ref(true)
const firstName = ref('')
const lastName = ref('')
const email = ref('')
const phone = ref('')
const password = ref('')
const confirmPassword = ref('')

const register = () => {
  if (password.value !== confirmPassword.value) {
    $q.notify({ type: 'negative', message: 'As senhas não coincidem!' })
    return
  }

  const formData = {
    firstName: firstName.value,
    lastName: lastName.value,
    email: email.value,
    phoneNumber: phone.value,
    confirmPassword: confirmPassword.value
  }

  store.registerAccount(formData)

  $q.notify({ type: 'positive', message: 'Cadastro realizado com sucesso!' })
  router.push('/login')
}
</script>

<style scoped>
.fullscreen {
  height: 100vh;
  background: #000000;
}

.card {
  background-color: #0C0F12;
  color: white;
}
</style>