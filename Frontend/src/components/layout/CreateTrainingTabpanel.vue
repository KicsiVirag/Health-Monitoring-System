<template>
  <FormKit type="form" :actions="false" @submit="createTraining">
    <FormKit name="event_id" :value="event_id" type="hidden" />
    <FormKit
      type="number"
      label="Lépés szám:"
      name="number_of_steps"
      placeholder=" pl.: 1600"
      :classes="{ input: { 'form-control': true } }"
      validation="required|number|between:0,25000"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '0 és 25000 közötti érték lehet!',
      }"
    />
    <FormKit
      type="select"
      label="Edzés intenzivítása:"
      name="training_intensity"
      :options="['Alacsony', 'Közepes', 'Intenzív']"
      :classes="{ input: { 'form-control': true } }"
      validation="required"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
      }"
    />
    <FormKit
      type="time"
      label="Edzés időtartalma:"
      name="training_durration"
      :classes="{ input: { 'form-control': true } }"
      validation="required"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
      }"
    />
    <FormKit
      type="text"
      label="Edzés fajtája:"
      name="training_type"
      placeholder=" pl.: Futás,Úszás"
      :classes="{ input: { 'form-control': true } }"
      validation="required|string|length:0,255"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
        lenght: 'A megengedett karakterek száma 0 és 255 között változhat!',
      }"
    />
    <FormKit
      type="text"
      label="Edzés helyszíne:"
      name="training_location"
      placeholder=" pl.: Uszoda,Edzőterem"
      :classes="{ input: { 'form-control': true } }"
      validation="required|string|length:0,255"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
        lenght: 'A megengedett karakterek száma 0 és 255 között változhat!',
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
import { useTraining } from "@stores/TrainingStore.mjs";

export default {
  props: {
    event_id: Number,
  },
  emits: ["filled"],
  data() {
    return {
      showAlert: false,
      isButtonDisabled: false,
    };
  },
  methods: {
    ...mapActions(useTraining, ["createTraining"]),

    async createTraining(data) {
      await useTraining().createTraining(data);
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
