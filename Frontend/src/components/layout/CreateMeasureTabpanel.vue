<template>
  <FormKit type="form" :actions="false" @submit="createMeasure">
    <FormKit name="event_id" :value="event_id" type="hidden" />
    <FormKit
      type="number"
      label="Pulzus:"
      name="pulse"
      placeholder=" pl.: 101"
      :classes="{ input: { 'form-control': true } }"
      validation="required|number|between:75,200"
      :validation-messages="{
        number: 'Csak szám lehet!',
        required: 'Kötelező kitölteni!',
        between: '75 és 200 közötti érték lehet!'
      }"
    />
    <FormKit
      type="text"
      label="Vérnyomás:"
      name="blood_pressure"
      placeholder=" pl.: 118/81"
      :classes="{ input: { 'form-control': true } }"
      :validation="[
        ['required'],
        ['matches', /^(5[0-9]|[1-9][0-9]|[1][0-7][0-9]|180)\/(3[0-9]|[1-9][0-9]|1[01][0-9]|120)$/],
        ['string'],
        ['length:0,7'],
      ]"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
        matches:
          'Az első számnak 50 és 180 között, a második pedig 30 és 120 közötti, és közöttük egy perjel (/) van!',
        lenght: 'A megengedett karakterek száma 0 és 7 között változhat!',
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
import { useMeasure } from "@stores/MeasureStore.mjs";

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
    ...mapActions(useMeasure, ["createMeasure"]),

    async createMeasure(data) {
      await useMeasure().createMeasure(data);
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
