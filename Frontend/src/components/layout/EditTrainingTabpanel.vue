<template>
  <FormKit
    type="form"
    :actions="false"
    :value="training"
    @submit="updateTraining"
  >
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
      v-model="formattedTime"
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
import { useTraining } from "@stores/TrainingStore.mjs";

export default {
  props: {
    training: Object,
    event_id: Number,
  },
  data() {
    return {
      showAlert: false,

      time: this.training.training_durration,
      formattedTime: "",
    };
  },
  mounted() {
    this.formatTime();
  },
  methods: {
    ...mapActions(useTraining, ["updateTraining"]),

    async updateTraining(data) {
      data.training_durration = this.formattedTime;
      if (data.event_id == undefined) {
        data.event_id = this.$route?.params?.id;
        await useTraining().createTraining(data);
      } else {
        await useTraining().updateTraining(data, this.$route?.params?.id);
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
