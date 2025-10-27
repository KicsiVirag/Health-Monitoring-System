<template>
    <div class="mt-3 mb-4">
        <div class="card mb-2" v-for="measure in paginatedMeasure" :key="measure.id">
            <div class="card-body p-2">
                <h5 class="card-title">Egyéb Mérések</h5>
                <h6 class="card-subtitle mb-2">{{ measure.event.event_date }}</h6>
                <p class="card-text rounded-3 p-2 m-0 pb-1">
                <ul>
                    <li>Pulzus: {{ measure.pulse }}</li>
                    <li>Vérnyomás: {{ measure.blood_pressure }}</li>
                    <li>Jegyzet: {{ measure.event.event_description  }}</li>
                </ul>
                <a href="#" class="card-link p-0 m-0">
                    <button class="btn">
                        <span class="badge text-bg-danger" @click="deleteMeasure(measure.id)">Törlés</span>
                    </button>
                </a>
                <a href="#" class="card-link p-0 m-0">
                    <RouterLink id="measure_Submit_Button" :to="{
                        name: 'edit-measure',
                        params: { id: measure.event?.id },}">
                        <span class="badge text-bg-success">Módosítás</span>
                    </RouterLink>
                </a>
                </p>
            </div>
        </div>
        <hr class="m-4">
        <nav aria-label="Page navigation example" class="pagination-nav">
            <ul class="pagination">
              <li class="page-item" @click="previousPage">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li
                class="page-item"
                v-for="page in pageCountMeasure"
                :key="page"
                :class="{ active: page === currentPage }"
              >
                <a class="page-link" href="#" @click="currentPage = page">{{ page }}</a>
              </li>
              <li class="page-item" @click="nextPageMeasure">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useMeasure } from "@stores/MeasureStore.mjs";

export default {
  props: {
    collection: Object,
  },
  data() {
    return {
      currentPage: 1,
      pageSize: 5,
    };
  },
  computed: {
    paginatedMeasure: function () {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.collection.slice(startIndex, endIndex);
    },
    pageCountMeasure: function () {
      return Math.ceil(this.collection.length / this.pageSize);
    },
  },
  methods: {
    ...mapActions(useMeasure, ["deleteMeasure"]),

    async deleteMeasure(id) {
      await useMeasure().deleteMeasure(id);
    },
    previousPage: function () {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPageMeasure: function () {
      if (this.currentPage < this.pageCountMeasure) {
        this.currentPage++;
      }
    },
  },
};
</script>