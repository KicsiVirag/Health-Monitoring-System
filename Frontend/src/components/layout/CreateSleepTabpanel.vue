<template>
  <FormKit type="form" :actions="false" @submit="createSleep">
    <FormKit name="event_id" :value="event_id" type="hidden" />
    <FormKit
      type="time"
      label="Alvás időtartalma:"
      name="sleep_durration"
      :classes="{ input: { 'form-control': true } }"
      validation="required"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
      }"
    />
    <FormKit
      type="number"
      label="Ébredések száma:"
      name="number_of_awaking"
      placeholder=" pl.: 3"
      :classes="{ input: { 'form-control': true } }"
      validation="number|between:0,55"
      :validation-messages="{
        number: 'Csak szám lehet!',
        between: '0 és 55 közötti értéknek kell lennie!',
      }"
    />
    <FormKit
      type="select"
      label="Alvás minősége:"
      name="sleep_quality"
      :options="['Mély alvás', 'Szendergés', 'Felszínes', 'Álomalvás']"
      :classes="{ input: { 'form-control': true } }"
      validation="required"
      :validation-messages="{
        required: 'Kötelező kitölteni!',
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
import { useSleeps } from "@stores/SleepStore.mjs";

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
    ...mapActions(useSleeps, ["createSleep"]),

    async createSleep(data) {
      await useSleeps().createSleep(data);
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
