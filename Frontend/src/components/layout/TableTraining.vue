<template>
  <table class="table table-striped">
    <thead>
      <th>Dátum</th>
      <th>Lépésszám</th>
      <th>Intenzitása</th>
      <th>Időtartama</th>
      <th>Edzés típusa</th>
      <th>Edzés helyszíne</th>
      <th>Tevékenység</th>
    </thead>
    <tbody>
      <tr v-for="training in paginatedTraining" :key="training.id">
        <td>{{ training.event.event_date }}</td>
        <td>{{ training.number_of_steps }} lépés</td>
        <td>{{ training.training_intensity }}</td>
        <td>{{ training.training_durration }}</td>
        <td>{{ training.training_type }}</td>
        <td>{{ training.training_location }}</td>
        <td>
          <button class="btn">
            <span
              class="badge DeleteBagde"
              @click="deleteTraining(training.id)"
              >Törlés</span
            >
          </button>
          <RouterLink
            id="training_Submit_Button"
            :to="{
              name: 'edit-measure',
              params: { id: training.event?.id },
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
