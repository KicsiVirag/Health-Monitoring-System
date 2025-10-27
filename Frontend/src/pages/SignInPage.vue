<template>
  <BaseLayout>
    <div id="signInDiv"
      class="rounded-5 mt-3 p-3">
      <h1 class="pt-5 text-center">Regisztráció</h1>
      <div class="alert alert-success mt-4 mb-4" role="alert">
        A következő oldalon regisztrálni tudsz, amelyhez szükséges néhány személyes adatod megadása. További információk:
        <button type="button" class="btn bi-info-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">szükséges tudnivalók <i class="bi bi-info-circle"></i></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <b>Jelszó</b>: Legalább 8 karakter hosszúságú, tartalmazzon kis- és nagybetűt, valamint legalább egy speciális karaktert
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                </div>
              </div>
            </div>
          </div>
        </button>
      </div>
        <FormKit 
         type="form" 
         :actions="false" 
         @submit="register" 
         :value="user" 
         class="mb-2">
          <div class="input-group">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="username" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Felhasználónév megadása kötelező!" class="input-group-text mt-3"><i class="bi bi-person pe-2"></i>Felhasználónév</label>
            </div>
            <FormKit 
              type="text" 
              name="username" id="username" 
              validation="required|length:0,255|string"
              :validation-messages="{
                required: 'Kötelező megadni a felhasználónevedet!',
                max: 'Maximum 255 karakter hosszú lehet a felhasználónév!'
              }"
              placeholder="pl. peldaBela5" 
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>

          <div class="input-group mt-3">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="name" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Teljes név megadása kötelező!" class="input-group-text mt-3"><i class="bi bi-person-check pe-2"></i>Teljes Név</label>
            </div>
            <FormKit 
              type="text" 
              name="name" 
              id="name" 
              validation="required|length:0,255|string"
              :validation-messages="{
                required: 'Kötelező megadni a teljes nevedet!',
                max: 'Maximum 255 karakter hosszú lehet a neved!'
              }"
              placeholder="pl. Példa Béla" 
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>

          <div class="input-group mt-2">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="email" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="E-mail cím megadása kötelező!" class="input-group-text mt-3"><i class="bi bi-envelope pe-2"></i>E-mail cím</label>
            </div>
            <FormKit 
              type="email" 
              name="email" 
              id="email" 
              validation="required|email|length:0,255"
              :validation-messages="{
                required: 'Kötelező megadni az email címedet!',
                email: 'Kérlek adj meg egy érvényes e-mail címet!',
                max: 'Maximum 255 karakter hosszú lehet az email címed!'
              }"
              placeholder="pl. pelda.bela@gmail.com" 
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>

          <div class="input-group mt-2">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="password" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Jelszó megadása kötelező! Legalább 8 karakter hosszúságú, tartalmazzon kis- és nagybetűt, valamint legalább egy speciális karaktert!" class="input-group-text mt-3"><i class="bi bi-lock pe-2"></i>Jelszó</label>
            </div>
            <FormKit 
              type="password" 
              name="password" 
              id="password"
              :validation="[
                ['required'],
                ['string'],
                ['length:8,255'],
                ['matches', /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{8,}$/]
              ]"
              :validation-messages="{
                required: 'Kötelező megadni a jelszavadat!',
                matches: 'A jelszónak legalább tartalmaznia kell: egy kis- és nagybetűt, számot és egy speciális karaktert! (Min. 8 karakter hosszú)',
                min: 'Legalább 8 karakter hosszú legyen a jelszó!',
                max: 'Maximum 255 karakter hosszú legyen a jelszó!'
              }"
              placeholder=""
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>

          <div class="input-group mt-2">
          <div class="input-group-append">
            <label id="labelFormLogSign" for="confirmPassword" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Jelszó megerősítése kötelező! Ellenőrizd, hogy ugyanazt a jelszót adtad-e meg." class="input-group-text mt-3"><i class="bi bi-lock pe-2"></i>Jelszó megerősítése</label>
          </div>
          <FormKit 
            type="password" 
            name="confirmPassword" 
            id="confirmPassword" 
            :validation="[
                ['required'],
                ['string'],
                ['length:8,255'],
                ['matches', /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{8,}$/]
              ]"
              :validation-messages="{
                required: 'Kötelező megadni a jelszavadat!',
                matches: 'A jelszónak legalább tartalmaznia kell: kis- és nagybetűt, számot és egy speciális karaktert!',
                min: 'Legalább 8 karakter hosszú legyen a jelszó!',
                max: 'Maximum 255 karakter hosszú legyen a jelszó!'
              }"
            placeholder=""
            :classes="{ input: { 'form-control': true } }" 
          />
        </div>

          <div class="input-group mt-2">
            <div class="input-group-append">
              <label id="labelFormLogSign" for="birth_date" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Születési dátum kiválasztása kötelező!" class="input-group-text mt-3"><i class="bi bi-calendar-event pe-2"></i>Születési dátum</label>
            </div>
            <FormKit 
              type="date" 
              name="birth_date" 
              id="birth_date" 
              :validation="[
                ['required'],
                ['date'],
                ['date_between', '1900-01-01', today]
              ]"
              :validation-messages="{
                required: 'Kötelező meadni a születési dátumodat!!',
                date: 'Nem megfelelő dátumformátum',
                date_between: 'A dátumnak 1900-01-01 és a mai nap dátuma között kell lennie.',
              }"
              pagination="Születési dátum kiválasztása" 
              :classes="{ input: { 'form-control': true } }" 
              :max="today"
            />
          </div>

          <div class="input-group mt-2">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="gender" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Nem megadása kötelező!" class="input-group-text mt-3"><i class="bi bi-gender-female pe-2"></i>Nem megadása</label>
            </div>
            <FormKit 
              type="select" 
              name="gender" 
              id="gender" 
              validation="required"
              :validation-message="{
                required: 'Nem megadása kötelező!'
              }"
              :options="[
                { value: 'nő', label: 'Nő' },
                { value: 'férfi', label: 'Férfi' }
              ]"
              :classes="{ input: { 'form-select': true } }" 
            />
          </div>

          <div :class="'text-center alert ' + colorBg + ' mt-4 mb-4'" role="alert" v-if="errorMessage">
            {{ errorMessage }}
          </div>

          <div class="d-flex justify-content-center mt-3 mb-3">
            <FormKit 
            type="submit" label="Mentés" id="submit"
            :classes="{
              input: {
                'btn': true,
                'btn-success': true,
                'ps-3': true,
                'pe-3': true,
              }
            }" 
          />
          </div>
        </FormKit>
        <hr>
        <FormKit
          type="form"
          :actions="false" 
          @submit="healthSubmit" 
          :value="health" 
          v-if="!loading"
        >
        <FormKit name="user_id" type="hidden" v-model="userId" />
          <div class="input-group">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="weight" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Testsúly megadása kötelező! (Kg a mértékegység!)" class="input-group-text mt-3"><i class="bi bi-bandaid pe-2"></i>Testsúly</label>
            </div>
            <FormKit 
              type="number" 
              name="weight" id="weight" 
              validation="required|min:0|max:635"
              :validation-messages="{
                required: 'Kötelező kitölteni a súly mezőt!',
                max: 'Nem lehet nagyobb, mint 635 kg!',
              }"
              placeholder="pl. 55 kg  " 
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>
          <div class="input-group">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="height" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Testmagasság megadása kötelező! (Cm a mértékegység!)" class="input-group-text mt-3"><i class="bi bi-bandaid pe-2"></i>Magasság</label>
            </div>
            <FormKit 
              type="number" 
              name="height" id="height" 
              validation="required|min:0|max:272"
              :validation-messages="{
                required: 'Kötelező kitölteni a magasság mezőt!',
                max: 'Nem lehet nagyobb, mint 272 cm!',
              }"
              placeholder="pl. 170 cm " 
              :classes="{ input: { 'form-control': true } }" 
            />
          </div>
          <div class="input-group">
            <div class="input-group-append">
              <label id="labelFormLogSign"  for="date" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Az egészségi adatok megadásának dátuma kötelező!" class="input-group-text mt-3"><i class="bi bi-bandaid pe-2"></i>Mérési adat megadásának dátuma</label>
            </div>
            <FormKit 
              type="date" 
              name="date" id="date" 
              :validation="[
                ['required'],
                ['date'],
                ['date_between', '1900-01-01', today]
              ]"
              :validation-messages="{
                required: 'Kötelező meadni a mérési dátumodat!!',
                date: 'Nem megfelelő dátumformátum',
                date_between: 'A dátumnak 1900-01-01 és a mai nap dátuma között kell lennie.',
              }"
              :classes="{ input: { 'form-control': true } }" 
              :max="today"
            />
          </div>
          <div class="d-flex justify-content-center mt-3 mb-3">
            <FormKit 
            type="submit" label="Mentés" id="submit2"
            :classes="{
              input: {
                'btn': true,
                'btn-success': true,
                'ps-3': true,
                'pe-3': true,
              }
            }" 
          />
          </div>
        </FormKit>
      </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue"
import { Popover } from 'bootstrap';
import { useUser } from '@stores/UserStore.mjs';
import { useHealth } from '@stores/HealthStore.mjs';

export default {
  components: {
    BaseLayout
  },
  data() {
    return {
      user: null,
      user_id: null,
      loading: true,

      today: new Date().toISOString().split("T")[0]
    }
  },
  computed: {
    userId() {
      return this.user_id;
    }
  },
  async mounted() {
    this.loading = true;

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(popoverTriggerEl => {
      new Popover(popoverTriggerEl, {
        trigger: 'hover',
        placement: 'right',
      });
    });
  },
  methods: {
    async register(credentials) {
      const colorBg = "alert";
      if (credentials.password !== credentials.confirmPassword) {
        this.errorMessage = "A jelszavak nem egyeznek meg! Ellenőrizd, hogy helyesen adtad-e meg a jelszavakat.";
        this.colorBg = "alert-danger";
      } else {
        this.errorMessage = "A jelszavak sikeresen egyeznek! Folytathatod a regisztrációt!";
        this.colorBg = "alert-success"
        this.user_id = (await useUser().register(credentials)).id;
        this.loading = false;
      }
    },
    async healthSubmit(data) {
      data.user_id = this.user_id;
      await useHealth().createHealth(data);
      this.$router.push({name: 'log-in'})
    }
  }
}
</script>