import { defineStore } from 'pinia'
import { http } from "@utils/http.mjs";

export const useUser = defineStore('user-store', {
  state() {
    return {
      users: null,
      token: null,
      errors: null
    }
  },
  actions: {
    async getUsers() {
      const response = await http.get("/users", {
        headers: {
          Authorization: `Bearer ${useUser().token}`
        }
      });
      this.users = response.data.data;
    },
    async getUser() {
      const response = await http.get(`/user`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`
        }
      });
      return response.data.data;
    },
    async createUser(UserData) {
      const response = await http.post("/users", UserData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`
        }
      });
      this.users.push(response.data);
    },
    async updateUser(UserData, id) {
      const response = await http.put(`/users/${id}`, UserData, {
        headers: {
          Authorization: `Bearer ${useUser().token}`
        }
      });
      const index = this.users.findIndex((x) => x.id === id);
      this.users.splice(index, 1, response.data);
    },
    async deleteUser(id) {
      await http.delete(`/users/${id}`, {
        headers: {
          Authorization: `Bearer ${useUser().token}`
        }
      });
      const index = this.users.findIndex((x) => x.id === id);
      this.users.splice(index, 1);
    },
    async login(credentials) {
      try {
        const response = await http.post('/login', credentials, {
          headers: {
            Authorization: `Bearer ${useUser().token}`
          }
        });
        this.token = response.data.data.token;
        this.errors = null;
      } catch {
        this.errors = "Sikertelen bejelentkezés! A megadott e-mail cím és jelszó párosítás nem megfelelő!"
      }
    },
    async register(credentials) {
      try {
        const response = await http.post('/users', credentials);
        return response.data.data;
      } catch {
        this.errors = "A regisztráció sikertelen! A megadott adatok helytelenek vagy már léteznek. Kérlek próbáld meg újra!"
      }
    },
    logout() {
      this.token = null;
    },
    async getLoggedUser() {
      const response = await http.get("/logged",{
        headers: {
          Authorization: `Bearer ${this.token}`
    }})
      return response.data;
    }
  },
  getters: {
    isLoggedIn() {
      return this.token !== null;
    }
  },
  persist: {
    storage: sessionStorage
  }
})