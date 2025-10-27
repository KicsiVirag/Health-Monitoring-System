<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <RouterLink
        class="navbar-brand OPK"
        :to="{ name: 'main' }"
        >OPK</RouterLink
      >
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-wrap">
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink
              class="nav-link"
              id="navLinkBg"
              :to="{ name: 'eating' }"
              >Étkezés</RouterLink
            >
          </li>
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink
              class="nav-link"
              :to="{ name: 'training' }"
              id="navLinkBg"
              >Edzés</RouterLink
            >
          </li>
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink class="nav-link" :to="{ name: 'sleep' }" id="navLinkBg"
              >Alvás</RouterLink
            >
          </li>
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink class="nav-link" :to="{ name: 'other' }" id="navLinkBg"
              >Vérnyomás és pulzus</RouterLink
            >
          </li>
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink
              class="nav-link"
              id="navLinkBg"
              aria-disabled="true"
              :to="{ name: 'summary' }"
              v-if="isLoggedIn"
              >Eddigi méréseid</RouterLink
            >
          </li>
          <li class="nav-item d-flex flex-wrap align-items-center me-2">
            <RouterLink
              class="nav-link"
              id="navLinkBg"
              aria-disabled="true"
              :to="{ name: 'create-measure' }"
              v-if="isLoggedIn"
              >Új mérés hozzáadása</RouterLink
            >
          </li>
        </ul>
        <ul
          class="navbar-nav d-flex flex-wrap align-items-center pe-3"
          v-if="isLoggedIn"
        >
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <RouterLink class="dropdown-item" :to="{ name: 'aboutus' }"
                  >Rólunk</RouterLink
                >
              </li>
              <li>
                <RouterLink
                  class="dropdown-item"
                  :to="{ name: 'user', params: { id: getLoggedUser()['id'] } }"
                  >Saját fiókom</RouterLink
                >
              </li>
              <li>
                <RouterLink
                  class="dropdown-item"
                  :to="{
                    name: 'calculator',
                    params: { id: getLoggedUser()['id'] },
                  }"
                  >Kalkulátor</RouterLink
                >
              </li>
            </ul>
          </li>
        </ul>
        <form class="d-flex flex-warp align-items-center" >
          <div class="mode-toggle m-1" title="Sötét mód" @click="modeToggle">
            <div class="toggle">
              <div id="dark-mode" type="checkbox"></div>
            </div>
          </div>
          <button
            class="btn m-1 zoom LogButton"
            type="submit"
            v-if="!isLoggedIn"
          >
            <RouterLink
              class="LogSingButton link-underline link-underline-opacity-0"
              :to="{ name: 'log-in' }"
              >Bejelentkezés</RouterLink
            >
          </button>
          <button
            class="btn m-1 zoom SignButton"
            type="submit"
            v-if="!isLoggedIn"
          >
            <RouterLink
              class="LogSingButton link-underline link-underline-opacity-0"
              :to="{ name: 'sign-in' }"
              >Regisztráció</RouterLink
            >
          </button>
        </form>
        <button
          class="btn ExitButton zoom"
          v-if="isLoggedIn"
          type="button"
          @click="logout"
          :to="{ name: 'main' }"
        >
          Kilépés
        </button>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { RouterLink } from "vue-router";
import { useUser } from "@/stores/UserStore.mjs";

export default {
  components: {
    RouterLink,
  },
  computed: {
    ...mapState(useUser, ["isLoggedIn"]),
  },
  methods: {
    modeToggle() {
      this.$root.$darkMode.modeToggle();
    },
    logout() {
      useUser().logout();
      this.$router.push({ name: "main" });
    },
    ...mapActions(useUser, ["getLoggedUser"]),
    async getLoggedUserId() {
      const data = await this.getLoggedUser();
      return data?.id;
    },
  },
};
</script>