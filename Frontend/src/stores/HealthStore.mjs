import { defineStore } from 'pinia'
import { http } from "@utils/http.mjs";
import { useUser } from './UserStore.mjs';

export const useHealth = defineStore('health-store', {
  state() {
    return {
      healths: []
    }
  },
  actions: {
    async getHealths() {
        const response = await http.get("/healths", {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        this.healths = response.data.data;
      },
      async getHealth(id) {
        const response = await http.get(`/healths`, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        let datas = response.data.data;
        let data = datas.find(x => x.user.id == id);
        return data;
      },
      async createHealth(HealthData) {
        const response = await http.post("/healths", HealthData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        this.healths.push(response.data);
      },
      async updateHealth(HealthData, id) {
        const response = await http.put(`/healths/${id}`, HealthData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        const index = this.healths.findIndex((x) => x.id === id);
        this.healths.splice(index, 1, response.data);
      },
      async deleteHealth(id) {
        await http.delete(`/healths/${id}`, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        const index = this.healths.findIndex((x) => x.id === id);
        this.healths.splice(index, 1);
      }
  }
})