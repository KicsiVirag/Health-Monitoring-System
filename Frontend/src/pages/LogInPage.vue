<template>
  <BaseLayout>
    <div
      class="rounded-5 mt-3 p-3 loginDiv">
      <h1 class="pt-4 text-center">Bejelentkezés</h1>
      <FormKit 
        type="form" 
        :actions="false" 
        @submit="login" 
        class="mb-2">

        <div class="input-group">
          <div class="input-group-append">
            <label id="labelFormLogSign" for="email" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="E-mail cím megadása kötelező!"
              class="input-group-text mt-3"><i class="bi bi-envelope pe-2"></i>E-mail cím</label>
          </div>
          <FormKit 
            type="email" 
            name="email" 
            id="email" 
            validation:="required|email|length:0,255"
            :validation-messages="{
              required: 'Kötelező megadni az email címedet!'
            }"
            placeholder="pl. pelda.bela@gmail.com" validation="required|email|length:0,255"
            :classes="{ input: { 'form-control': true } }" 
          />
        </div>
        <div class="input-group mt-2">
          <div class="input-group-append">
            <label for="password" id="labelFormLogSign" data-bs-toggle="popover" data-bs-placement="right"
              data-bs-content="Jelszó megadása kötelező! (Min. 8 karakter, kis- és nagybetű, legalább 1 spec. karakter!"
              class="input-group-text mt-3"><i class="bi bi-lock pe-2"></i>Jelszó</label>
          </div>
          <FormKit 
            type="password" 
            name="password" id="password"
            validation:="required|string|length:8,255"
            :validation-messages="{
              required: 'Kötelező megadni az email címedet!'
            }"
            placeholder="Min. 8 karakter, kis- és nagybetűk, speciális karaktert tartalmazó" validation=""
            :classes="{ input: { 'form-control': true, } }"
          />
        </div>

        <div class="d-flex justify-content-center mt-3">
          <FormKit 
            type="submit" 
            id="submit"
            label="Mentés" 
            :classes="{
              input: {
                'btn': true,
                'btn-success': true,
                'ps-3': true,
                'pe-3': true,
              }
            }" 
          />
        </div>
      </FormKit>
      <div class="alert alert-danger mt-3 text-center" v-if="errors !== null">{{ errors }}</div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue"
import { Popover } from 'bootstrap';
import { useUser } from "@stores/UserStore.mjs";
import { mapState } from 'pinia';

export default {
  components: {
    BaseLayout
  },
  mounted() {
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(popoverTriggerEl => {
      new Popover(popoverTriggerEl, {
        trigger: 'hover',
        placement: 'right',
      });
    });
    useUser().errors = null;
  },
  methods: {
    togglePasswordVisibility(event) {
      event.preventDefault();
      this.showPassword = !this.showPassword;
    },
    modifiyUser() {
    },
    async login(credentials) {
      await useUser().login(credentials);
      if (this.errors === null) {
        useUser().errors = null;
        this.$router.push({ name: 'main' })
      }
    }
  },
  computed: {
    ...mapState(useUser, ['errors'])
  }
}
</script>