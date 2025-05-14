import { defineStore } from 'pinia'
import axios from 'axios'

export const useCounterStore = defineStore('counter', {
  state: () => ({
    list: []
  }),

  actions: {
    async showTable() {
      const response = await axios.get("http")
      console.log(response)
    }
  },
})
