import { defineStore } from 'pinia'
import { http } from "@utils/http.mjs";
import { useUser } from './UserStore.mjs';

export const useEvent = defineStore('event-store', {
  state() {
    return {
      events: [],
      event_object_id: []
    }
  },
  actions: {
    async getEvents() {
        const response = await http.get("/events", {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        this.events = response.data.data;
      },
      async getEvent(id) {
        const response = await http.get(`/events/${id}`, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        return response.data.data;
      },
      async createEvent(EventData) {
        const response = await http.post("/events", EventData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        this.event_object_id = response.data.data;
        this.events.push(response.data);
      },
      async updateEvent(EventData, id) {
        const response = await http.put(`/events/${id}`, EventData, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        const index = this.events.findIndex((x) => x.id === id);
        this.events.splice(index, 1, response.data);
      },
      async deleteEvent(id) {
        await http.delete(`/events/${id}`, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        const index = this.events.findIndex((x) => x.id === id);
        this.events.splice(index, 1);
      }
  }
})