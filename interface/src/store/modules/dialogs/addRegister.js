import { defineStore } from "pinia";
import api from "@/services/api";

export const useAddRegisterStore = defineStore("addRegister", {
  state: () => ({
    isDialogVisible: false,
    name: "",
    email: "",
    phone: "",
  }),
  actions: {
    openDialog() {
      this.isDialogVisible = true;
    },
    async saveData(formData) {
      const response = await api.post("/register", formData, {
        headers: {
          Authorization: `Bearer ${sessionStorage.getItem("MM_SECURE_TOKEN")}`,
        },
      });

      console.log(response.data);
    },
    clear() {
      this.name = "";
      this.email = "";
      this.phone = "";
    },
    closeDialog() {
      this.isDialogVisible = false;
    },
  },
});
