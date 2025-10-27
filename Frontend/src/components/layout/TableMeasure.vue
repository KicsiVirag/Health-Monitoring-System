<template>
  <table class="table table-striped">
    <thead>
      <th>Dátum</th>
      <th>Pulzus</th>
      <th>Vérnyomás</th>
      <th>Jegyzet</th>
      <th>Tevékenység</th>
    </thead>
    <tbody>
      <tr v-for="measure in paginatedMeasure" :key="measure.id">
        <td>{{ measure.event.event_date }}</td>
        <td>{{ measure.pulse }}</td>
        <td>{{ measure.blood_pressure }}</td>
        <td>
          {{ measure.event.event_description }}
        </td>
        <td>
          <button class="btn">
            <span
              class="badge DeleteBagde"
              @click="deleteMeasure(measure.id)"
              >Törlés</span
            >
          </button>
          <RouterLink
            id="measure_Submit_Button"
            :to="{
              name: 'edit-measure',
              params: { id: measure.event?.id },
            }"
            ><span class="badge EditBagde">Módosítás</span></RouterLink
          >
        </td>
      </tr>
    </tbody>
  </table>
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
