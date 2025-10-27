<template>
    <div class="mt-3 mb-4">
        <div class="card mb-2" v-for="sleep in paginatedSleep" :key="sleep.id">
            <div class="card-body p-2">
                <h5 class="card-title">Alvás</h5>
                <h6 class="card-subtitle mb-2">{{ sleep.event.event_date }}</h6>
                <p class="card-text rounded-3 p-2 m-0 pb-1">
                <ul>
                    <li>Alvás hossza: {{ sleep.sleep_durration }} (óra:perc:másodperc)</li>
                    <li>Ébredések (db): {{ sleep.number_of_awaking }}</li>
                    <li>Alvásminőség: {{ sleep.sleep_quality }}</li>
                </ul>
                <a href="#" class="card-link p-0 m-0">
                    <button class="btn">
                        <span class="badge text-bg-danger" @click="deleteSleep(sleep.id)">Törlés</span>
                    </button>
                </a>
                <a href="#" class="card-link p-0 m-0">
                    <RouterLink id="sleep_Submit_Button" :to="{
                        name: 'edit-measure',
                        params: { id: sleep.event?.id },}">
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
                v-for="page in pageCountSleep"
                :key="page"
                :class="{ active: page === currentPage }"
              >
                <a class="page-link" href="#" @click="currentPage = page">{{ page }}</a>
              </li>
              <li class="page-item" @click="nextPageSleep">
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
import { useSleeps } from "@stores/SleepStore.mjs";

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
    paginatedSleep: function () {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.collection.slice(startIndex, endIndex);
    },
    pageCountSleep: function () {
      return Math.ceil(this.collection.length / this.pageSize);
    },
  },
  methods: {
    ...mapActions(useSleeps, ["deleteSleep"]),

    async deleteSleep(id) {
      await useSleeps().deleteSleep(id);
    },
    previousPage: function () {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPageSleep: function () {
      if (this.currentPage < this.pageCountSleep) {
        this.currentPage++;
      }
    },
  },
};
</script>