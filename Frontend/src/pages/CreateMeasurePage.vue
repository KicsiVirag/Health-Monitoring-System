<template>
  <BaseLayout>
    <h1 class="text-center mt-3">Napi mérés</h1>
    <div class="container-fluid" v-if="!loalding">
      <FormKit
        type="form"
        :actions="false"
        :value="event"
        @submit="createEvent"
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
          :classes="{
            input: {
              'form-control': true,
              'my-3': true,
              'fs-5': true,
              'fw-bold': true,
              'w-50': true,
              'mx-auto': true,
              zoom: true,
              btn: true,
              border: true,
            },
          }"
                  :disabled="isButtonDisabled"
        />
      </FormKit>
      <div v-if="event_id != null">
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
            <TabpanelEating :event_id="event_id" @filled="EatingFilled" />
          </div>
          <div
            class="tab-pane"
            id="disabled-tabpanel-1"
            role="tabpanel"
            aria-labelledby="disabled-tab-1"
          >
            <TabpanelTraining :event_id="event_id" @filled="TrainingFilled" />
          </div>
          <div
            class="tab-pane"
            id="disabled-tabpanel-2"
            role="tabpanel"
            aria-labelledby="disabled-tab-2"
          >
            <TabpanelSleep :event_id="event_id" @filled="SleepFilled" />
          </div>
          <div
            class="tab-pane"
            id="disabled-tabpanel-3"
            role="tabpanel"
            aria-labelledby="disabled-tab-3"
          >
            <TabpanelMeasure :event_id="event_id" @filled="MeasureFilled" />
          </div>
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
import { mapActions, mapState } from "pinia";
import { useEvent } from "@stores/EventStore.mjs";
import { useUser } from "@stores/UserStore.mjs";
import TabpanelEating from "@components/layout/CreateEatTabpanel.vue";
import TabpanelTraining from "@components/layout/CreateTrainingTabpanel.vue";
import TabpanelSleep from "@components/layout/CreateSleepTabpanel.vue";
import TabpanelMeasure from "@components/layout/CreateMeasureTabpanel.vue";

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
      user: null,
      user_id: null,
      event_id: null,
      loalding: true,
      showAlert: false,
      filled: {
        eating: false,
        training: false,
        sleep: false,
        measure: false,
      },

      today: new Date().toISOString().split("T")[0],
      isButtonDisabled: false
    };
  },
  computed: {
    ...mapState(useEvent, ["event_object_id"]),
  },
  async mounted() {
    this.user = await useUser().getUser();
    this.user_id = this.user.id;
    this.loalding = false;
  },
  methods: {
    ...mapActions(useEvent, ["createEvent"]),

    async createEvent(data) {
      await useEvent().createEvent(data);
      this.event_id = this.event_object_id.id;
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

    EatingFilled(value) {
      this.filled.eating = value;
    },
    TrainingFilled(value) {
      this.filled.training = value;
    },
    SleepFilled(value) {
      this.filled.sleep = value;
    },
    MeasureFilled(value) {
      this.filled.measure = value;
    },
  },
  beforeRouteLeave(to, from, next) {
    const allDataFilled = Object.values(this.filled).every((val) => val);
    if (!allDataFilled) {
      if (
        !confirm(
          "Az oldalt nem lehet elhagyni, mert nincsenek kitöltve az összes adatok."
        )
      ) {
        next(false);
        return;
      }
    }
    next();
  },
};
</script>
