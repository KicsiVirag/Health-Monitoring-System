<template>
  <FormKit type="form" :actions="false" @submit="createEat">
    <FormKit name="event_id" :value="event_id" type="hidden" />
    <FormKit
      type="number"
      label="Reggeli kalória:"
      name="calories_morning"
      placeholder=" pl.: 1600"
      :classes="{ input: { 'form-control': true } }"
      validation="required|number|between:0,6500"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '0 és 6500 közötti értéket lehet csak megadni'
      }"
    />
    <FormKit
      type="number"
      label="Déli kalória:"
      name="calories_noon"
      placeholder=" pl.: 1723"
      validation="required|number|between:0,6500"
      :classes="{ input: { 'form-control': true } }"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '0 és 6500 közötti értéket lehet csak megadni!'
      }"
    />
    <FormKit
      type="number"
      label="Esti kalória:"
      name="calories_evening"
      placeholder=" pl.: 1203"
      validation="required|number|between:0,6500"
      :classes="{ input: { 'form-control': true } }"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '0 és 6500 közötti értéket lehet csak megadni!'
      }"
    />
    <FormKit
      type="text"
      label="Gyógyszerek:"
      name="medicine"
      placeholder=" pl.: cataflam, Advil, Inzulin"
      validation="string|lenght:0,255"
      :classes="{ input: { 'form-control': true } }"
      :validation-messages="{
        lenght: 'A megengedett karakterek száma 0 és 255 között változhat!',
      }"
    />
    <FormKit
      type="number"
      label="Folyadék bevitel literben:"
      name="amount_of_liquid"
      placeholder=" pl.: 2"
      validation="required|number|between:0,22"
      :classes="{ input: { 'form-control': true } }"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '0 és 22 közötti értéket lehet csak megadni!'
      }"
    />
    <FormKit
      id="SubmitButton"
      type="submit"
      label="Mentés"
      :classes="{
        input: {
          'form-control': true,
          'my-3': true,
          'fs-5': true,
          'fw-bold': true,
          'w-50': true,
          'mx-auto': true,
        },
      }"
        :disabled="isButtonDisabled"
    />
  </FormKit>

  <div
    v-if="showAlert"
    class="alert alert-info position-absolute top-50 start-50 translate-middle"
    role="alert"
  >
    <i class="bi bi-check-circle"></i>
    <strong> Sikeresen mentve!</strong>
  </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useEat } from "@stores/EatingStore.mjs";

export default {
  props: {
    event_id: Number,
  },
  emits: ["filled"],
  data() {
    return {
      showAlert: false,
      isButtonDisabled: false
    };
  },
  methods: {
    ...mapActions(useEat, ["createEat"]),

    async createEat(data) {
      await useEat().createEat(data);
      this.$emit("filled", true);
      this.showAndHideAlert(true); 
      this.isButtonDisabled = true;
    },
    

    showAndHideAlert: function (filled) {
      if (filled) {
        this.showAlert = true;
        setTimeout(() => {
          this.showAlert = false;
        }, 2000);
      }
    },
    closeAlert: function () {
      this.showAlert = false;
    },
  },
};
</script>
