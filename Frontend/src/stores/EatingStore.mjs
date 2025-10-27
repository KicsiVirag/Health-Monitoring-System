import { defineStore } from "pinia";
import { http } from "@utils/http.mjs";
import { useUser } from "./UserStore.mjs";

export const useEat = defineStore("eats-store", {
  state() {
    return {
      eating: [],
    };
  },
  actions: {
    async getEats() {
      const response = await http.get("/eats", {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.eating = response.data.data;
      return this.eating;
    },
    async getEat(id) {
      const response = await http.get(`/eats`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data === undefined) {
        return {
          event_id: undefined,
          calories_morning: "",
          calories_noon: "",
          calories_evening: "",
          medicine: "",
          amount_of_liquid: "",
        };
      }
      return data;
    },
    async createEat(EatData) {
      const response = await http.post("/eats", EatData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.eating.push(response.data);
    },
    async updateEat(EatData, id) {
      const response = await http.get(`/eats`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data !== undefined) {
        const response = await http.put(`/eats/${data.id}`, EatData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`,
          },
        });
        const index = this.eating.findIndex((x) => x.id === id);
        this.eating.splice(index, 1, response.data);
      }
    },    
    async deleteEat(id) {
      await http.delete(`/eats/${id}`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      const index = this.eating.findIndex((x) => x.id === id);
      this.eating.splice(index, 1);
    },
  },
});
