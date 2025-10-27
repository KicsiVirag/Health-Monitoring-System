import { defineStore } from "pinia";
import { useUser } from "./UserStore.mjs";
import { http } from "@utils/http.mjs";

export const useMeasure = defineStore("measure-store", {
  state() {
    return {
      measures: [],
    };
  },
  actions: {
    async getMeasures() {
      const response = await http.get("/measures", {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.measures = response.data.data;
    },
    async getMeasure(id) {
      const response = await http.get(`/measures`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data === undefined) {
        return { event_id: undefined, pulse: "", blood_pressure: "" };
      }
      return data;
    },
    async createMeasure(MeasureData) {
      const response = await http.post("/measures", MeasureData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.measures.push(response.data);
    },
    async updateMeasure(MeasureData, id) {
      const response = await http.get(`/measures`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data !== undefined) {
        const response = await http.put(`/measures/${data.id}`, MeasureData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`,
          },
        });
        const index = this.measures.findIndex((x) => x.id === id);
        this.measures.splice(index, 1, response.data);
      }
    },
    async deleteMeasure(id) {
      await http.delete(`/measures/${id}`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      const index = this.measures.findIndex((x) => x.id === id);
      this.measures.splice(index, 1);
    },
  },
});
