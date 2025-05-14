import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { Quasar } from 'quasar'
import quasarUserOptions from './quasar-user-options'
import { createPinia } from 'pinia'

createApp(App).use(createPinia()).use(Quasar, quasarUserOptions).use(router).mount('#app')
