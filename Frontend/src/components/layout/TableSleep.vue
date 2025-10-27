<template>
  <table class="table table-striped">
    <thead>
      <th>Dátum</th>
      <th>Alvás hossza</th>
      <th>Ébredések (db)</th>
      <th>Alvás minősége</th>
      <th>Tevékenység</th>
    </thead>
    <tbody>
      <tr v-for="sleep in paginatedSleep" :key="sleep.id">
        <td>{{ sleep.event.event_date }}</td>
        <td>{{ sleep.sleep_durration }}</td>
        <td>{{ sleep.number_of_awaking }}</td>
        <td>{{ sleep.sleep_quality }}</td>
        <td>
          <button class="btn">
            <span class="badge DeleteBagde" @click="deleteSleep(sleep.id)"
              >Törlés</span
            >
          </button>
          <RouterLink
            id="sleep_Submit_Button"
            :to="{
              name: 'edit-measure',
              params: { id: sleep.event?.id },
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
