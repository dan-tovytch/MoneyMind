import axios from "axios";

console.log("API BASE URL:", process.env.VUE_APP_API_URL); // debug


const api = axios.create({
  baseURL: import.meta.env.VUE_APP_API_URL,
});

export default api;
