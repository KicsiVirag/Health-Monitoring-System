<template>
  <BaseLayout>
    <h1 class="text-center mt-3">Napi mérés</h1>
    <div class="d-flex justify-content-center editH1Title" v-if="loading">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="container-fluid" v-if="!loading">
      <FormKit
        type="form"
        :actions="false"
        :value="event"
        @submit="updateEvent"
      >
        <FormKit name="user_id" :value="this.user?.id" type="hidden" />
        <FormKit
          type="date"
          name="event_date"
          label="Dátum"
          placeholder="Válassz dátumot"
          :validation="[
            ['required'],
            ['date'],
            ['date_between', '1900-01-01', today],
          ]"
          :validation-messages="{
            required: 'Kötelező kitölteni',
            date: 'Nem megfelelő dátumformátum',
            date_between:
              'A dátumnak 1900-01-01 és a mai nap dátuma között kell lennie.',
          }"
          validation-visibility="live"
          :classes="{ input: { 'form-control': true, 'my-2': true } }"
          :max="today"
        />
        <FormKit
          type="textarea"
          name="event_description"
          label="Jegyzet"
          placeholder="Írd be a jegyzetbe milyen tapasztalataid, és érzéseid voltak a nap folyamán"
          validation="string|length:0,255"
          validation-visibility="live"
          :validation-messages="{
            lenght: 'A megengedett karakterek száma 0 és 255 között változhat!',
          }"
          :classes="{ input: { 'form-control': true, 'my-2': true } }"
        />
        <FormKit
          id="SubmitButton"
          type="submit"
          label="Mentés"
          @click="showAndHideAlert"
          :classes="{
            input: {
              'form-control': true,
              'my-3': true,
              'fs-5': true,
              'fw-bold': true,
              'w-50': true,
              'mx-auto': true,
              zoom: true,
            },
          }"
        />
      </FormKit>
      <ul class="nav nav-tabs mt-4" role="tablist">
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active"
            id="disabled-tab-0"
            data-bs-toggle="tab"
            href="#disabled-tabpanel-0"
            role="tab"
            aria-controls="disabled-tabpanel-0"
            aria-selected="true"
            >Táplálkozás</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="disabled-tab-1"
            data-bs-toggle="tab"
            href="#disabled-tabpanel-1"
            role="tab"
            aria-controls="disabled-tabpanel-1"
            aria-selected="false"
            >Edzés</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="disabled-tab-2"
            data-bs-toggle="tab"
            href="#disabled-tabpanel-2"
            role="tab"
            aria-controls="disabled-tabpanel-2"
            aria-selected="false"
            >Alvás</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="disabled-tab-3"
            data-bs-toggle="tab"
            href="#disabled-tabpanel-3"
            role="tab"
            aria-controls="disabled-tabpanel-3"
            aria-selected="false"
            >Egyéb</a
          >
        </li>
      </ul>
      <div class="tab-content p-4 rounded-bottom" id="tab-content">
        <div
          class="tab-pane active"
          id="disabled-tabpanel-0"
          role="tabpanel"
          aria-labelledby="disabled-tab-0"
        >
          <TabpanelEating :eating="eating" :event_id="event_id" />
        </div>
        <div
          class="tab-pane"
          id="disabled-tabpanel-1"
          role="tabpanel"
          aria-labelledby="disabled-tab-1"
        >
          <TabpanelTraining :training="training" :event_id="event_id" />
        </div>
        <div
          class="tab-pane"
          id="disabled-tabpanel-2"
          role="tabpanel"
          aria-labelledby="disabled-tab-2"
        >
          <TabpanelSleep :sleep="sleep" :event_id="event_id" />
        </div>
        <div
          class="tab-pane"
          id="disabled-tabpanel-3"
          role="tabpanel"
          aria-labelledby="disabled-tab-3"
        >
          <TabpanelMeasure :meauser="meauser" :event_id="event_id" />
        </div>
      </div>
    </div>

    <div
      v-if="showAlert"
      class="alert alert-info position-absolute top-50 start-50 translate-middle"
      role="alert"
    >
      <i class="bi bi-check-circle"></i>
      <strong> Sikeresen mentve!</strong>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue";
import { mapActions } from "pinia";
import { useEvent } from "@stores/EventStore.mjs";
import { useEat } from "@stores/EatingStore.mjs";
import { useTraining } from "@stores/TrainingStore.mjs";
import { useSleeps } from "@stores/SleepStore.mjs";
import { useMeasure } from "@stores/MeasureStore.mjs";
import { useUser } from "@stores/UserStore.mjs";
import TabpanelEating from "@components/layout/EditEatTabpanel.vue";
import TabpanelTraining from "@components/layout/EditTrainingTabpanel.vue";
import TabpanelSleep from "@components/layout/EditSleepTabpanel.vue";
import TabpanelMeasure from "@components/layout/EditMeasureTabpanel.vue";

export default {
  components: {
    BaseLayout,
    TabpanelEating,
    TabpanelTraining,
    TabpanelSleep,
    TabpanelMeasure,
  },
  data() {
    return {
      event: null,
      eating: null,
      training: null,
      sleep: null,
      meauser: null,
      user: null,

      user_id: null,
      event_id: null,
      loading: true,

      showAlert: false,

      today: new Date().toISOString().split("T")[0],
    };
  },
  async mounted() {
    this.user = await useUser().getUser();
    this.event = await useEvent().getEvent(this.$route?.params?.id);
    try {
      this.eating = await useEat().getEat(this.$route?.params?.id);
    } catch (error) {
      this.eating = {
        event_id: this.event_id,
        calories_morning: "",
        calories_noon: "",
        calories_evening: "",
        medicine: "",
        amount_of_liquid: "",
      };
    }
    try {
      this.training = await useTraining().getTraining(this.$route?.params?.id);
    } catch (error) {
      this.training = {
        event_id: this.event_id,
        number_of_steps: "",
        training_intensity: "",
        training_durration: "",
        training_type: "",
        training_location: "",
      };
    }
    try {
      this.sleep = await useSleeps().getSleep(this.$route?.params?.id);
    } catch (error) {
      this.sleep = {
        event_id: this.event_id,
        sleep_durration: "",
        number_of_awaking: "",
        sleep_quality: "",
      };
    }
    try {
      this.meauser = await useMeasure().getMeasure(this.$route?.params?.id);
    } catch (error) {
      this.meauser = { event_id: this.event_id, pulse: "", blood_pressure: "" };
    }

    this.user_id = this.user.id;
    this.event_id = this.event.id;
    this.loading = false;
  },
  methods: {
    ...mapActions(useEvent, ["updateEvent"]),

    async updateEvent(data) {
      await useEvent().updateEvent(data, this.$route?.params?.id);
    },

    showAndHideAlert: function () {
      this.showAlert = true;
      setTimeout(() => {
        this.showAlert = false;
      }, 5000);
    },
    closeAlert: function () {
      this.showAlert = false;
    },
  },
};
</script>
