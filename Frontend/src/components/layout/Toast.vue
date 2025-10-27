<template>
  <div class="toast mb-3" :class="{ show: show }">
    <div class="toast-header">
      <strong class="me-auto"
        ><i class="bi bi-chat-left-text-fill"></i>
        {{ user }} felhasználó</strong
      >
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body">
      {{ message }}
    </div>
  </div>
</template>
<script>
import { stringifyQuery } from "vue-router";
export default {
  props: {
    show: Boolean,
    user: String,
    message: String,
  },
  methods: {
    showToastMethod() {
      this.showToast = true;
    },
  },
};
</script>
