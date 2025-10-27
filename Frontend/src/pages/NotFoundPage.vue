<template>
    <BaseLayout>
        <div class="container">
            <h1 class="pt-5"><i class="bi bi-exclamation-diamond-fill"></i>  404 A keresett oldal nem található!</h1>
            <hr>
            <p>Oops, az általad keresett oldal nem található meg, feltehetően elgépelted a webcímet! Lépj vissz a kezdőoldalra:</p>
            <ul>
                <li><RouterLink :to="{name: 'main'}">Irány a kezdőoldal</RouterLink></li>
            </ul>
        </div>
    </BaseLayout>
</template>
<script>
import { RouterLink } from 'vue-router';
import BaseLayout from '@layouts/BaseLayout.vue'

export default {
    components: {
        BaseLayout,
        RouterLink
    }
}
</script>
