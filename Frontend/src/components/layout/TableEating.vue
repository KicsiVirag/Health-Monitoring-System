<template>
  <table class="table table-striped table-borderd">
    <thead>
      <th>Dátum</th>
      <th>Reggeli kalória</th>
      <th>Déli kalória</th>
      <th>Esti kalória</th>
      <th>Gyógyszer(ek)</th>
      <th>Vízmennyiség</th>
      <th>Tevékenység</th>
    </thead>
    <tbody>
      <tr v-for="eat in paginatedEating" :key="eat.id">
        <td id="eat.event.event_date">{{ eat.event.event_date }}</td>
        <td>{{ eat.calories_morning }} kcal</td>
        <td>{{ eat.calories_noon }} kcal</td>
        <td>{{ eat.calories_evening }} kcal</td>
        <td>{{ eat.medicine }}</td>
        <td>{{ eat.amount_of_liquid }} liter</td>
        <td>
          <button class="btn">
            <span class="badge DeleteBagde" @click="deleteEat(eat.id)"
              >Törlés</span
            >
          </button>
          <RouterLink
            id="eating_Submit_Button"
            :to="{
              name: 'edit-measure',
              params: { id: eat.event?.id },
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
        v-for="page in pageCountEating"
        :key="page"
        :class="{ active: page === currentPage }"
      >
        <a class="page-link" href="#" @click="currentPage = page">{{ page }}</a>
      </li>
      <li class="page-item" @click="nextPageEating">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useEat } from "@stores/EatingStore.mjs";

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
    pageCountEating: function () {
      return Math.ceil(this.collection.length / this.pageSize);
    },
    paginatedEating: function () {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.collection.slice(startIndex, endIndex);
    },
  },
  methods: {
    ...mapActions(useEat, ["deleteEat"]),

    async deleteEat(id) {
      await useEat().deleteEat(id);
    },
    previousPage: function () {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPageEating: function () {
      if (this.currentPage < this.pageCountEating) {
        this.currentPage++;
      }
    },
  },
};
</script>
