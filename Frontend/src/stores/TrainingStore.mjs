import { defineStore } from "pinia";
import { http } from "@utils/http.mjs";
import { useUser } from "./UserStore.mjs";

export const useTraining = defineStore("trainings-store", {
  state() {
    return {
      trainings: [],
    };
  },
  actions: {
    async getTrainings() {
      const response = await http.get("/trainings", {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.trainings = response.data.data;
      return this.trainings;
    },
    async getTraining(id) {
      const response = await http.get(`/trainings`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if (data === undefined) {
        return {
          event_id: undefined,
          number_of_steps: "",
          training_intensity: "",
          training_durration: "",
          training_type: "",
          training_location: "",
        };
      }
      return data;
    },
    async createTraining(TrainingData) {
      const response = await http.post("/trainings", TrainingData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      this.trainings.push(response.data);
    },
    async updateTraining(TrainingData, id) {
      const response = await http.get(`/trainings`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      let data = response.data.data.find((x) => x.event.id == id);
      if(data !== undefined){
        const response = await http.put(`/trainings/${data.id}`, TrainingData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`,
          },
        });
        const index = this.trainings.findIndex((x) => x.id === id);
        this.trainings.splice(index, 1, response.data);
      }
    },
    async deleteTraining(id) {
      await http.delete(`/trainings/${id}`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`,
        },
      });
      const index = this.trainings.findIndex((x) => x.id === id);
      this.trainings.splice(index, 1);
    },
  },
});
