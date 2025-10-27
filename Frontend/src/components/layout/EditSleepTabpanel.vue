<template>
  <FormKit type="form" :actions="false" :value="sleep" @submit="updateSleep">
    <FormKit name="event_id" :value="event_id" type="hidden" />
    <FormKit
      type="time"
      label="Alvás időtartalma:"
      v-model="formattedTime"
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
import { mapActions } from "pinia";
import { useSleeps } from "@stores/SleepStore.mjs";

export default {
  props: {
    sleep: Object,
    event_id: Number,
  },
  data() {
    return {
      showAlert: false,
      time: this.sleep.sleep_durration,
      formattedTime: "",
    };
  },
  mounted() {
    this.formatTime();
  },
  methods: {
    ...mapActions(useSleeps, ["updateSleep"]),

    async updateSleep(data) {
      data.sleep_durration = this.formattedTime;
      if (data.event_id == undefined) {
        data.event_id = this.$route?.params?.id;
        await useSleeps().createSleep(data);
      } else {
        await useSleeps().updateSleep(data, this.$route?.params?.id);
      }
      this.showAndHideAlert(true);
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

    formatTime() {
      const timeParts = this.time.split(":");
      this.formattedTime = `${timeParts[0]}:${timeParts[1]}`;
    },
  },
};
</script>
