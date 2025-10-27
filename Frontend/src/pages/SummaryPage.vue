<template>
  <BaseLayout>
    <h1 class="pt-5 text-center">Eddigi méréseid</h1>
    <div
      class="d-flex justify-content-center summaryDiv"
      v-if="loading"
    >
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="container" v-if="!loading">
      <div class="row mb-3">
        <div class="col">
          <button
            class="form-control w-25 btn text-center ButtonPDF p-2 mt-3"
            @click="generatePDF"
          >
          <span class="d-none d-md-inline">Összefoglaló PDF formátumban</span>
          <span class="d-md-none small">Átfogó PDF</span>
          </button>
        </div>
      </div>
      <div class="row">
        <FormKit type="form" :actions="false" class="mb-3">
          <div class="col-sm-12 col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6">
                <FormKit
                  :classes="{ input: { 'form-select': true, 'my-2': true } }"
                  type="select"
                  label="Kategória"
                  id="category"
                  placeholder="Válassz egy kategóriát"
                  :options="[
                    { label: 'Összes', value: 'null' },
                    { label: 'Táplálkozás', value: 'eating_value' },
                    { label: 'Edzés', value: 'training_value' },
                    { label: 'Alvás', value: 'sleep_value' },
                    { label: 'Egyéb', value: 'measure_value' },
                  ]"
                  v-model="value"
                />
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <FormKit
                  id="from_id"
                  type="date"
                  label="Mettől"
                  placeholder="Válassz dátumot"
                  validation-visibility="live"
                  :classes="{ input: { 'form-control': true, 'my-2': true } }"
                  v-model="from"
                />
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <FormKit
                  id="until_id"
                  type="date"
                  value="2024-01-01"
                  label="Meddig"
                  placeholder="Válassz dátumot"
                  validation-visibility="live"
                  :classes="{ input: { 'form-control': true, 'my-2': true } }"
                  v-model="until"
                />
              </div>
            </div>
          </div>
        </FormKit>
      </div>
      <div class="row" v-if="value === 'eating_value' || value === 'null'">
        <div class="col-12 d-none d-md-block">
          <h5 class="mt-4 p-0" id="eating_h5_title">Táplálkozás</h5>
          <TableEating :collection="filteredEating" />
        </div>
        <div class="col-12 d-md-none">
          <CardEating :collection="filteredEating" />
        </div>
      </div>

      <div class="row" v-if="value === 'training_value' || value === 'null'">
        <div class="col-12 d-none d-md-block">
          <h5 class="mt-4 p-0">Edzés</h5>
          <TableTraining :collection="filteredTraining" />
        </div>
        <div class="col-12 d-md-none">
          <CardTraining :collection="filteredTraining" />
        </div>
      </div>

      <div class="row" v-if="value === 'sleep_value' || value === 'null'">
        <div class="col-12 d-none d-md-block">
          <h5 class="mt-4 p-0">Alvás</h5>
          <TableSleep :collection="filteredSleep" />
        </div>
        <div class="col-12 d-md-none">
          <CardSleep :collection="filteredSleep" />
        </div>  
      </div>

      <div class="row" v-if="value === 'measure_value' || value === 'null'">
        <div class="col-12 d-none d-md-block">
          <h5 class="mt-4 p-0">Egyéb</h5>
          <TableMeasure :collection="filteredMeasure" />
        </div>
        <div class="col-12 d-md-none">
          <CardMeasure :collection="filteredMeasure" />
        </div>
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue";
import { mapState } from "pinia";
import { RouterLink } from "vue-router";
import { useEat } from "@stores/EatingStore.mjs";
import { useTraining } from "@stores/TrainingStore.mjs";
import { useSleeps } from "@stores/SleepStore.mjs";
import { useMeasure } from "@stores/MeasureStore.mjs";
import jsPDF from "jspdf";
import "jspdf-autotable";
import TableEating from "@components/layout/TableEating.vue";
import TableTraining from "@components/layout/TableTraining.vue";
import TableSleep from "@components/layout/TableSleep.vue";
import TableMeasure from "@components/layout/TableMeasure.vue";

import CardEating from "@components/layout/CardEating.vue";
import CardMeasure from "@components/layout/CardMeasure.vue";
import CardSleep from "@components/layout/CardSleep.vue";
import CardTraining from "@components/layout/CardTraining.vue";

export default {
  components: {
    BaseLayout,
    RouterLink,
    TableEating,
    TableTraining,
    TableSleep,
    TableMeasure,

    CardEating,
    CardMeasure,
    CardSleep,
    CardTraining
  },
  data() {
    return {
      loading: true,
      value: null,
      until: null,
      from: null,
      currentPage: 1,
      pageSize: 5,
    };
  },
  computed: {
    ...mapState(useEat, ["eating"]),
    ...mapState(useTraining, ["trainings"]),
    ...mapState(useSleeps, ["sleeps"]),
    ...mapState(useMeasure, ["measures"]),

    filteredEating() {
      return this.eating.filter(
        (eat) =>
          (this.from <= eat.event.event_date &&
            this.until >= eat.event.event_date) ||
          this.from === null ||
          this.until === null
      );
    },
    filteredTraining() {
      return this.trainings.filter(
        (training) =>
          (this.from <= training.event.event_date &&
            this.until >= training.event.event_date) ||
          this.from === null ||
          this.until === null
      );
    },
    filteredSleep() {
      return this.sleeps.filter(
        (sleep) =>
          (this.from <= sleep.event.event_date &&
            this.until >= sleep.event.event_date) ||
          this.from === null ||
          this.until === null
      );
    },
    filteredMeasure() {
      return this.measures.filter(
        (measure) =>
          (this.from <= measure.event.event_date &&
            this.until >= measure.event.event_date) ||
          this.from === null ||
          this.until === null
      );
    },
  },
  async mounted() {
    await useEat().getEats();
    await useTraining().getTrainings();
    await useSleeps().getSleeps();
    await useMeasure().getMeasures();

    this.loading = false;
  },
  methods: {
    generatePDF() {
      let doc = new jsPDF();

      let yOffset = 10;

      doc.text("Táplálkozás", 10, yOffset);

      let headersEating = [
        "Dátum",
        "Reggeli kalória",
        "Déli kalória",
        "Esti kalória",
        "Gyógyszerek",
        "Vízmennyiség",
      ];

      let dataEating = [];
      for (let i = 0; i < this.eating.length; i++) {
        let row = [
          this.eating[i].event.event_date,
          this.eating[i].calories_morning,
          this.eating[i].calories_noon,
          this.eating[i].calories_evening,
          this.eating[i].medicine,
          this.eating[i].amount_of_liquid,
        ];
        dataEating.push(row);
      }

      doc.autoTable({
        head: [headersEating],
        body: dataEating,
        startY: yOffset + 10,
      });

      yOffset = doc.previousAutoTable.finalY + 20;
      doc.text("Edzés", 10, yOffset);

      let headersTraining = [
        "Dátum",
        "Lépésszám",
        "Intenzivitás",
        "Idötartam",
        "Edzés típusa",
        "Edzés helyszíne",
      ];

      let dataTraining = [];
      for (let i = 0; i < this.trainings.length; i++) {
        let row = [
          this.trainings[i].event.event_date,
          this.trainings[i].number_of_steps,
          this.trainings[i].training_intensity,
          this.trainings[i].training_durration,
          this.trainings[i].training_type,
          this.trainings[i].training_location,
        ];
        dataTraining.push(row);
      }

      doc.autoTable({
        head: [headersTraining],
        body: dataTraining,
        startY: yOffset + 10,
      });

      yOffset = doc.previousAutoTable.finalY + 20;
      doc.text("Alvás", 10, yOffset);

      let headersSleep = [
        "Dátum",
        "Alvás hossza",
        "Ébredések (db)",
        "Alvás minösége",
      ];

      let dataSleep = [];
      for (let i = 0; i < this.sleeps.length; i++) {
        let row = [
          this.sleeps[i].event.event_date,
          this.sleeps[i].sleep_durration,
          this.sleeps[i].number_of_awaking,
          this.sleeps[i].sleep_quality,
        ];
        dataSleep.push(row);
      }

      doc.autoTable({
        head: [headersSleep],
        body: dataSleep,
        startY: yOffset + 10,
      });

      yOffset = doc.previousAutoTable.finalY + 20;
      doc.text("Egyéb", 10, yOffset);

      let headersMeasure = ["Dátum", "Pulzus", "Vérnyomás", "Jegyzet"];

      let dataMeasure = [];
      for (let i = 0; i < this.measures.length; i++) {
        let row = [
          this.measures[i].event.event_date,
          this.measures[i].pulse,
          this.measures[i].blood_pressure,
          this.measures[i].event.event_description,
        ];
        dataMeasure.push(row);
      }

      doc.autoTable({
        head: [headersMeasure],
        body: dataMeasure,
        startY: yOffset + 10,
      });

      doc.save("Összefoglaló.pdf");
    },
  },
};
</script>
