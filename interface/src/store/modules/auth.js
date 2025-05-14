import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: [],
    }),

    actions: {
        async login(formData) {
            const response = await axios.post('http://localhost:8000/api/auth/login', formData);

            if(response.data.token) {
                sessionStorage.setItem('MM_SECURE_TOKEN', response.data.token);
                this.getUserAuthenticated();
            }
            console.log(response.data.token);
            
            console.log(response.data)

        },

        async registerAccount(formData) {
            const response = await axios.post('http://localhost:8000/api/auth/register', formData);
            console.log(response.data);
        },

        async getUserAuthenticated() {
            const response = await axios.get('http://localhost:8000/api/auth/get', {
                headers: {
                    Authorization: `Bearer ${sessionStorage.getItem('MM_SECURE_TOKEN')}`
                }
            });

            if(response.data.data) {
                this.user = response.data.data
                console.log(this.user)
            }
            console.log(response.data)
        }
    }
})