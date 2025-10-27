<template>
  <BaseLayout>
    <div
      class="d-flex justify-content-center"
      id="userLoading"
      v-if="loading"
    >
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="container" v-if="!loading">
      <div class="row"><h1 class="pt-5 text-center">Üdv, {{ user?.username }} </h1></div>
      <div class="row">
        <div class="alert alert-success mt-4 mb-4 text-center" role="alert">
          A következő oldalon a megadott személyes és egészségügyi adataidat tudod megtekinteni és szerkeszteni az igényeid és fejlődési tendenciád alapján.
        </div>
      </div>
      <div class="row rounded-4 p-2" id="userDiv">
        <div class="col-12">
          <h1 class="mt-3 text-center">Mérési adataid szerkesztése</h1>
          <p><i class="bi bi-info-circle"></i> A következő szakaszban mósodíthatod, hogy mennyi a testmagasságod, a testtömeged, illetve a születési éved dátumát. Ezek az adatok szükségesek, hogy a program kiszámolja neked a napi kalóriaszükségletedet a célod elérése érdekében.</p>
        </div>
        <div class="col-12">
              <FormKit
              type="form" 
              :actions="false" 
              @submit="updateHealth" 
              :value="health" 
              class="mb-3"
            >
            <FormKit name="user_id" :value="user_id" type="hidden" />
            <FormKit 
              type="number" 
              name="weight" 
              id="weight"
              validation="required|number|min:0" 
              :validation-messages="{
                required: 'Kötelező megadni súlyodat!'
              }"
              validation-visibility="live"
              label="Súly" placeholder="pl: 60 kg"
              :value="health ? health.weight : ''"
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />
            <FormKit 
              type="number" 
              name="height" 
              id="height" 
              validation="required|number|min:0" 
              :validation-messages="{
                required: 'Kötelező megadni a magasságodat!'
              }"
              validation-visibility="live"
              label="Magasság" placeholder="pl.: 170 cm" 
              :value="health ? health.height : ''"
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />

            <FormKit 
              type="date" 
              name="date" 
              id="date" 
              validation="required|date" 
              :validation-messages="{
                required: 'Kötelező megadni a mérés dátumát!'
              }"
              validation-visibility="live"
              label="Mérés dátuma" placeholder="" 
              :value="health ? health.date : ''"
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />
            <p class="pt-0">Ha módosítasz az adataidon, kérlek frissíts rá az oldalra!</p>

            <div class="d-flex justify-content-center mt-3">
              <FormKit 
                type="submit" 
                label="Mentés" 
                :classes="{
                  input: {
                    'btn': true,
                    'btn-success': true,
                    'ps-4': true,
                    'pe-4': true,
                    'mb-4': true,
                    'zoom': true
                  }
               }"
             />
            </div>
          </FormKit>

          <div class="row">
            <div class="col-12">
              <h3>Összesített adataid</h3>
              <div class="card mb-4">
                <div class="card-body p-2">
                  <h5 class="card-title">Összesített mérési adataid</h5>
                  <p class="card-text p-2 rounded-3 mb-0">
                    <ul>
                      <li>Neme: {{ user?.gender }}</li>
                      <li>Testmagassága: {{ health?.height }} cm</li>
                      <li>Testsúlya: {{ health?.weight }} kg</li>
                      <li>Életkora: {{ age }}</li>
                    </ul>
                  </p>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
      
      <div class="d-flex justify-content-center" id="userLoading" v-if="loading">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <div class="row rounded-4 mt-4 p-2" id="userDiv" v-if="!loading">
        <div class="col">
          <h1 class="mt-2 text-center">Felhasználói adatok szerkesztése</h1>
          <FormKit 
            type="form" 
            :actions="false" 
            @submit="updateUser" 
            :value="user" 
            class="mb-3">

            <FormKit name="user_id" :value="user_id" type="hidden" />
            <FormKit 
              type="text" 
              name="username" 
              id="username" 
              validation="required|length:0,255|string"
              :validation-messages="{
                required: 'Kötelező megadni a felhasználónevet!'
              }"
              validation-visibility="live"
              label="Felhasználónév" placeholder=" pl.: username123" 
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />

            <FormKit 
              type="text" 
              name="name" 
              id="name" 
              validation="required|length:0,255|string" 
              :validation-messages="{
                required: 'Kötelező megadni a teljes nevedet!'
              }"
              validation-visibility="live"
              label="Név" placeholder=" pl.: User Name" 
              :classes="{ 
                input: { 'form-control': true, 'mb-2': true }
              }" 
            />

            <FormKit 
              type="email" 
              name="email" 
              id="email" 
              validation="required|email|length:0,255" 
              :validation-messages="{
                required: 'Kötelező megadni az fiókodhoz tartozó e-mail címedet!'
              }"
              validation-visibility="live"
              label="E-mail" placeholder=" pl.: user.name@gmail.com" 
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />

            <FormKit 
              type="password" 
              name="password" 
              id="password" 
              validation="required"
              :validation-messages="{
                required: 'Kötelező megadni az fiókodhoz tartozó jelszót!'
              }"
              validation-visibility="live"
              label="Jelszó" placeholder="" 
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />

            <FormKit 
              type="date" 
              name="birth_date" 
              id="birth_date" 
              validation="required|date" 
              :validation-messages="{
                required: 'Kötelező megadni a születési dátumodat!'
              }"
              validation-visibility="live"
              label="Születési dátum" 
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }" 
            />

            <FormKit 
              type="text" 
              name="gender" 
              id="gender" 
              validation="required"
              :validation-messages="{
                required: 'Kötelező megadni a nemet!'
              }"
              validation-visibility="live"
              label="Nem" placeholder="" 
              :classes="{
                input: { 'form-control': true, 'mb-2': true }
              }"
            />

            <div class="d-flex justify-content-center mt-3">
              <FormKit 
                type="submit" 
                label="Mentés" 
                :classes="{
                  input: {
                    'btn': true,
                    'btn-success': true,
                    'ps-4': true,
                    'pe-4': true,
                    'zoom': true
                  }
               }"
             />
            </div>
          </FormKit>
        </div>
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue";
import { mapActions } from "pinia";
import { useHealth } from "@stores/HealthStore.mjs";
import { useUser } from "@stores/UserStore.mjs";

export default {
  components: {
    BaseLayout
  },
  data() {
    return {
      health: null,
      user: null,
      user_id: null,
      health_id: null,
      selected: '',
      picked: '',

      loading: true
    }
  },
  async mounted() {
    this.user = await useUser().getUser();
    this.health = await useHealth().getHealth(this.user?.id);

    this.health_id = this.health.id;
    this.user_id = this.user.id;

    this.loading = false;
  },
  methods: {
    ...mapActions(useHealth, ["updateHealth"]),
    ...mapActions(useUser, ["updateUser"]),

    async updateHealth(data) {
      await useHealth().updateHealth(data, this.user?.id);
    },
    async updateUser(data) {
      await useUser().updateUser(data, this.user?.id);    
    },
  },
  computed: {
    age() {
      const birthDate = new Date(this.user?.birth_date);
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      const monthDiff = today.getMonth() - birthDate.getMonth();
      if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      return age;
    },
  }
}
</script>