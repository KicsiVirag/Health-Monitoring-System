import { defineStore } from "pinia";
import { http } from "@utils/http.mjs";
import { useUser } from "./UserStore.mjs";

export const useSleeps = defineStore("sleep-store", {
  state() {
    return {
      sleeps: [],
    };
  },
  actions: {
    async getSleeps() {
      const response = await http.get("/sleeps", {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.sleeps = response.data.data;
    },
    async getSleep(id) {
      const response = await http.get(`/sleeps`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data === undefined) {
        return {
          event_id: undefined,
          sleep_durration: "",
          number_of_awaking: "",
          sleep_quality: "",
        };
      }
      return data;
    },
    async createSleep(SleepData) {
      const response = await http.post("/sleeps", SleepData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.sleeps.push(response.data);
    },
    async updateSleep(SleepData, id) {
      const response = await http.get(`/sleeps`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data !== undefined) {
        const response = await http.put(`/sleeps/${data.id}`, SleepData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`,
          },
        });
        const index = this.sleeps.findIndex((x) => x.id === id);
        this.sleeps.splice(index, 1, response.data);
      }
    },
    async deleteSleep(id) {
      await http.delete(`/sleeps/${id}`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      const index = this.sleeps.findIndex((x) => x.id === id);
      this.sleeps.splice(index, 1);
    },
  },
});
