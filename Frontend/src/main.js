import { createApp } from "vue";
import { createPinia } from "pinia";
import { router } from "@/router/index.js";
import piniaPluginPersistedstate from "pinia-plugin-persistedstate";
import { plugin, defaultConfig } from "@formkit/vue";
import { BootstrapIconsPlugin } from "bootstrap-icons-vue";

import App from "@/App.vue";

import "bootstrap";
import "@assets/app.scss";

const app = createApp(App);

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);

app.use(BootstrapIconsPlugin);

app.use(router);
app.use(plugin, defaultConfig);
app.use(pinia);

app.config.globalProperties.$darkMode = {
  dark: function() {
    document.querySelector('body').classList.add('dark-mode')
  },
  light: function() {
    document.querySelector('body').classList.remove('dark-mode')
  },
  modeToggle: function() {
    if(document.querySelector('body').classList.contains('dark-mode')) {
      this.light()
    } else {
      this.dark()
    }
  },
}

app.mount("#app");
