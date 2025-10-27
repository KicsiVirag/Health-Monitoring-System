<template>
    <div class="mt-3 mb-4">
        <div class="card mb-2" v-for="eat in paginatedEating" :key="eat.id">
            <div class="card-body p-2">
                <h5 class="card-title">Táplálkozás</h5>
                <h6 class="card-subtitle mb-2">{{ eat.event.event_date }}</h6>
                <p class="card-text rounded-3 p-2 m-0 pb-1">
                <ul>
                    <li>Reggeli kalória: {{ eat.calories_morning }} kcal</li>
                    <li>Déli kalória: {{ eat.calories_noon }} kcal</li>
                    <li>Esti kalória: {{ eat.calories_evening }} kcal</li>
                    <li>Gyógyszer(ek): {{ eat.medicine }}</li>
                </ul>
                <a href="#" class="card-link p-0 m-0">
                    <button class="btn">
                        <span class="badge text-bg-danger" @click="deleteEat(eat.id)">Törlés</span>
                    </button>
                </a>
                <a href="#" class="card-link p-0 m-0">
                    <RouterLink id="eating_Submit_Button" :to="{
                        name: 'edit-measure',
                        params: { id: eat.event?.id },}">
                        <span class="badge text-bg-success">Módosítás</span>
                    </RouterLink>
                </a>
                </p>
            </div>
        </div>
        <hr class="m-4">
        <nav aria-label="Page navigation example" class="pagination-nav mb-3">
            <ul class="pagination">
                <li class="page-item" @click="previousPage">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item" v-for="page in pageCountEating" :key="page"
                    :class="{ active: page === currentPage }">
                    <a class="page-link" href="#" @click="currentPage = page">{{ page }}</a>
                </li>
                <li class="page-item" @click="nextPageEating">
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