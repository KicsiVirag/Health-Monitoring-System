<template>
    <div class="mt-3 mb-4">
        <div class="card mb-2" v-for="training in paginatedTraining" :key="training.id">
            <div class="card-body p-2">
                <h5 class="card-title">Edzés</h5>
                <h6 class="card-subtitle mb-2">{{ training.event.event_date }}</h6>
                <p class="card-text rounded-3 p-2 m-0 pb-1">
                <ul>
                    <li>Megtett lépésszám: {{ training.number_of_steps }}</li>
                    <li>Intenzitása: {{ training.training_intensity }}</li>
                    <li>Időtartama: {{ training.training_durration  }}</li>
                    <li>Típusa: {{ training.training_type  }}</li>
                    <li>Helyszíne: {{ training.training_location  }}</li>
                </ul>
                <a href="#" class="card-link p-0 m-0">
                    <button class="btn">
                        <span class="badge text-bg-danger" @click="deleteTraining(training.id)">Törlés</span>
                    </button>
                </a>
                <a href="#" class="card-link p-0 m-0">
                    <RouterLink id="training_Submit_Button" :to="{
                        name: 'edit-measure',
                        params: { id: training.event?.id },}">
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
                v-for="page in pageCountTraining"
                :key="page"
                :class="{ active: page === currentPage }"
              >
                <a class="page-link" href="#" @click="currentPage = page">{{ page }}</a>
              </li>
              <li class="page-item" @click="nextPageTraining">
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
import { useTraining } from "@stores/TrainingStore.mjs";

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
    paginatedTraining: function () {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.collection.slice(startIndex, endIndex);
    },
    pageCountTraining: function () {
      return Math.ceil(this.collection.length / this.pageSize);
    },
  },
  methods: {
    ...mapActions(useTraining, ["deleteTraining"]),

    async deleteTraining(id) {
      await useTraining().deleteTraining(id);
    },
    previousPage: function () {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPageTraining: function () {
      if (this.currentPage < this.pageCountTraining) {
        this.currentPage++;
      }
    },
  },
};
</script>