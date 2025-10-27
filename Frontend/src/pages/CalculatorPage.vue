<template>
    <BaseLayout>
        <div class="d-flex justify-content-center" id="calculatorLoading" v-if="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="container" v-if="!loading">
            <div class="row"><h1 class="pt-5 text-center">Üdv, {{ user?.username }} a kalkulátor oldalon</h1></div>

            <div class="row">
                <div class="alert alert-success mt-4 mb-4" role="alert">
                  A következő oldalon a bevitt kalóriamennyiségedet tudod megtekinteni, amit az adott nap fogyasztottál, illetve az
                  össz lépésszámodat,amelyet szintén a mai nap folyamán teljesítettél. Mindezen felül az oldal segítséget nyújt megtalálni a számodra tökéletes kalória- és mozgásmennyiséget az ideális célod elérése érdekében. További információk:
                  <button type="button" class="btn bi-info-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Információ <i
                                class="bi bi-info-circle"></i></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Ezen az oldalon a napi bevitt kalóriamennyiségedet, valamint a lépésszámodat tudod megtekinteni
                            részletesen lebontva. A továbbiakban tudod szerkeszteni személyes adataidat <br>
                            Néhány fontos jelölés az oldalon:
                            <ul>
                              <li><i class="bi bi-journal-text"></i>: Hasznos tudnivalókat tartalmaz</li>
                              <li><i class="bi bi-info-circle"></i>: Fontos információkat tartalmaz</li>
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </button>
                </div>
              </div>
              <div class="row rounded-4 p-2" id="userDiv">
                <div class="col-12">
                  <h2 class="mt-3 text-center">Kalóriaszükségleted kiszámítása</h2>
                  <p><i class="bi bi-info-circle"></i> A következő szakaszban mósodíthatod, hogy mennyi a testmagasságod, a testtömeged, illetve a születési éved dátumát. Ezek az adatok szükségesek, hogy a program kiszámolja neked a napi kalóriaszükségletedet a célod elérése érdekében. Ha további hasznos információkra vagy kíváncsi, kattints a kis könyv ikonra!</p>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <h3>Mérési adataid szerkesztése</h3>
                    </div>
                  </div>
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
                            'mb-4': true
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
                              <li>Aktivitása: (nyomj a könyv ikonra, hogy megtekintsd a lehetőségeket!)</li>
                                <div class="row">
                                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <button type="button" class="btn bi bi-journal-text" data-bs-toggle="modal" data-bs-target="#actvityModals">
                                      <div class="modal fade" id="actvityModals" tabindex="-1" aria-labelledby="actvityModalsLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="actvityModalsLabel">Jellemző aktivitási mértékek <i
                                                  class="bi bi-info-circle"></i></h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              Csekély – nem sportoló, ülőfoglalkozású <br>
                                              Mérsékelt – heti 1-2 óra sport, szellemi foglalkozású <br>
                                              Közepes – heti 2-3 óra sport, könnyű fizikai munka <br>
                                              Átlagon felüli – rendszeres intenzív sport, fizikai munkakör <br>
                                              Nagyon magas – intenzív sport naponta, nehéz fizikai munka <br>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </button>
                                  </div>
                                  <div class="col-11 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                                    <select v-model="selected" class="form-select">
                                      <option disabled value="">Válasszon aktivitást...</option>
                                      <option>Csekély</option>
                                      <option>Mérsékelt</option>
                                      <option>Közepes</option>
                                      <option>Átlagon felüli</option>
                                      <option>Nagyon magas</option>
                                    </select>
                                  </div>
                                </div>
                            </ul>
                          </p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
        
                  <div class="row">
                    <h3>Tápanyagszükséglet
                    <button type="button" class="btn bi bi-journal-text" data-bs-toggle="modal" data-bs-target="#caloriesModal">
                      <div class="modal fade" id="caloriesModal" tabindex="-1" aria-labelledby="caloriesModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="caloriesModalLabel">kalóriaszükséglet <i
                                  class="bi bi-info-circle"></i></h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              A tápanyagszükséglet az emberi szervezet által igényelt tápanyagok mennyisége és minősége, amelyekre a megfelelő egészség és működés érdekében szükség van. Ezek közé tartoznak például fehérjék, szénhidrátok, zsírok, vitaminok és ásványi anyagok. A tápanyagszükségletet különböző tényezők befolyásolhatják, például az életkor, nem, testsúly, fizikai aktivitás szintje és az egészségi állapot.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </button>
                  </h3>
                    <div class="alert alert-danger" role="alert">
                      <i class="bi bi-info-circle-fill"></i> A méréshez Harris-Benedict egyenlet megoldását alkalmazzuk
                      <br>
                      <i class="bi bi-exclamation-diamond-fill"></i> A rendes adatok megjelenítéséhez válassza ki az aktivitási mértékét, hogy a rendszer minden egészségügyi adatát figyelembe véve ki tudja számolni a megfelelő adatokat!
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="card mb-4 CalculatorCard">
                        <div class="card-body p-2">
                          <h4 class="card-title">Testtömeg megőrzéséhez</h4>
                          <h6 class="card-subtitle mb-2">Napi össz. kalória mennyiség: <b>{{ calories }}</b> kcal</h6>
                          <p class="card-text p-2 rounded-3 mb-0 p-3">
                            <b>Reggeli kalóriamennyiség</b>: {{ (Math.round(((calories / 100) * 25) * 100) / 100) }} kcal <br>
                            <b>Déli kalóriamennyiség</b>: {{ (Math.round(((calories / 100) * 40) * 100) / 100)}}  kcal <br>
                            <b>Esti kalóriamennyiség</b>: {{ (Math.round(((calories / 100) * 35) * 100) /100) }} kcal <br>
                          </p>
                        </div>
                      </div>
                    </div>
        
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="card mb-4">
                        <div class="card-body p-2 CalculatorCard">
                          <h4 class="card-title">Testtömege csökkentéséhez</h4>
                          <h6 class="card-subtitle mb-2">Napi össz. kalória mennyiség: <b>{{  calories - 550  }}</b> kcal</h6>
                          <p class="card-text p-2 rounded-3 mb-0 p-3">
                            <b>Reggeli kalóriamennyiség</b>: {{ (Math.round((((calories - 550) / 100) * 25) * 100) / 100) }} kcal <br>
                            <b>Déli kalóriamennyiség</b>: {{ (Math.round((((calories - 550) / 100) * 40) * 100) / 100) }}  kcal <br>
                            <b>Esti kalóriamennyiség</b>: {{ (Math.round((((calories - 550) / 100) * 35) * 100) / 100)  }} kcal <br>
                          </p>
                        </div>
                      </div>
                    </div>
        
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="card mb-4">
                        <div class="card-body p-2 CalculatorCard">
                          <h4 class="card-title">Testtömege növeléséhez</h4>
                          <h6 class="card-subtitle mb-2">Napi össz. kalória mennyiség: <b>{{ calories + 550 }}</b> kcal</h6>
                          <p class="card-text p-2 rounded-3 mb-0 p-3">
                            <b>Reggeli kalóriamennyiség</b>: {{ (Math.round((((calories + 550) / 100) * 25) * 100) / 100) }} kcal <br>
                            <b>Déli kalóriamennyiség</b>: {{ (Math.round((((calories + 550) / 100) * 40) * 100) / 100) }}  kcal <br>
                            <b>Esti kalóriamennyiség</b>: {{ (Math.round((((calories + 550) / 100) * 35) * 100) / 100) }} kcal <br>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                  <h2 class="mt-3 text-center">Saját teljesítményed</h2>
                </div>
              </div>
              <div class="row p-3">
                <div class="col-12">
                    <p>Kérem válasszon egy dátumot...</p>
                    <select class="form-select" id="dateCalculator" v-model="selectedDate">
                      <option>Válasszon egy dátumot...</option>
                      <option :value="date" v-for="date in eventDates" :key="date">{{ date }}</option>
                    </select>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <div class="rounded-4 p-4" id="userDiv">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                        <div class="row">
                          <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radios" id="radios0" value="option" v-model="picked" checked>
                              <label class="form-check-label" for="radios0">Válassz egy célt...</label>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="radios" id="radios1" value="testtomegMegtartasa" v-model="picked" >
                              <label class="form-check-label" for="radios1">Testtömeg megtartása</label>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-3 col-lg-3">
                              <div class="form-check">
                                <input class="form-check-input me-2" type="radio" name="radios" id="radios2" value="testtomegCsokkentese" v-model="picked" />
                                <label class="form-check-label pe-4" for="radios2">Testtömeg csökkentése</label>
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-check">
                              <input class="form-check-input me-2" type="radio" name="radios" id="radios3" value="testtomegNovelese" v-model="picked" />
                              <label class="form-check-label pe-4" for="radios3">Testtömeg növelése</label>
                            </div>
                          </div>
                        </div>
        
                        <h3 class="mt-3">Összes bevitt kalória</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                        <div class="progress mt-2" role="progressbar" max="100" min="0"
                         :value="progressCalories">
                          <div class="progress-bar" :style="{ 'background-color': backgroundProgressSummary, 'width': ((100 / progressCalories) * (eating?.calories_morning + eating?.calories_noon + eating?.calories_evening)) + '%' }">{{ progressCalories }} / {{ eating?.calories_morning + eating?.calories_noon + eating?.calories_evening }} elfogyasztott kcal </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row">
                      <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <h5 class="mt-2 pe-1">Reggeli: </h5>
                      </div>
                      <div class="col-sm-10 col-md-10 col-lg-8">
                        <div class="progress mt-2" role="progressbar" max="100" min="0" 
                         :value="progressCalories">
                          <div class="progress-bar" :style="{'background-color': backgroundProgressMorning, 'width': ((100 / (progressCalories / 100 * 25)) * (eating?.calories_morning)) + '%'}">{{ (progressCalories / 100) * 25}} / {{ eating?.calories_morning }} elfogyasztott kcal</div>
                        </div>
                      </div>
                      <div class="col-sm-2 col-md-2 col-lg-2 AftreProgressP">
                        <p class="mt-2">/ {{ (Math.round(((progressCalories / 100) * 25) * 100) / 100) }} kcal </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <h5 class="mt-2 pe-1">Ebéd: </h5>
                      </div>
                      <div class="col-sm-10 col-md-10 col-lg-8">
                        <div class="progress mt-2" role="progressbar" max="100" min=0
                        :value="progressCalories">
                        <div class="progress-bar"  :style="{'background-color': backgroundProgressNoon, 'width': ((100 / (progressCalories / 100 * 40)) * (eating?.calories_noon)) + '%'}">{{ (progressCalories / 100) * 40}} / {{ eating?.calories_noon }} elfogyasztott kcal</div>
                        </div>
                      </div>
                      <div class="col-sm-2 col-md-2 col-lg-2 AftreProgressP">
                        <p class="mt-2">/ {{ Math.round(((progressCalories / 100) * 40) * 100) / 100 }} kcal</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-2">
                        <h5 class="mt-2">Vacsora: </h5>
                      </div>
                      <div class="col-sm-10 col-md-10 col-lg-8">
                        <div class="progress mt-2" role="progressbar" max="100" min="0"
                          :value="progressCalories">
                          <div class="progress-bar" :style="{'background-color': backgroundProgressEvening, 'width':((100 / (progressCalories / 100 * 35)) * (eating?.calories_evening)) + '%'}">{{ (progressCalories / 100) * 35}} / {{ eating?.calories_evening }} elfogyasztott kcal</div>
                        </div>
                      </div>
                      <div class="col-sm-2 col-md-2 col-lg-2 AftreProgressP">
                        <p class="mt-2">/ {{ Math.round(((progressCalories / 100) * 35 ) * 100) / 100}} kcal</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="row">
                <div class="col">
                  <div class="rounded-4 p-4 mt-5" id="userDiv">
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <h2>Lépések</h2>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-10 col-md-10 col-lg-10">
                            <div class="progress mt-2" role="progressbar" max="100" min="0" 
                            :value="progressCalories">
                              <div class="progress-bar progress-training" :style="'width: '+ ((100 / 10000) * (trainings?.number_of_steps)) + '%'"> {{ (100 / 10000) * trainings?.number_of_steps }} %</div>
                            </div>
                          </div>
                          <div class="col-sm-2 col-md-2 col-lg-2">
                            <p class="mt-2">/10.000</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <h5>Megtett lépésszámod a mérés napján: {{ trainings?.number_of_steps }} lépés</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </BaseLayout>
</template>
<script>
import BaseLayout from "@layouts/BaseLayout.vue";
import { mapActions, mapState } from "pinia";
import { useHealth } from "@stores/HealthStore.mjs";
import { useUser } from "@stores/UserStore.mjs";
import { useEat } from "@stores/EatingStore.mjs";
import { useTraining } from "@stores/TrainingStore.mjs";
import { useEvent } from "@stores/EventStore.mjs";

export default {
  components: {
    BaseLayout
  },
  data() {
    return {
      health: null,
      user: null,
      eating: null,
      trainings: null,
      event: null,
      user_id: null,
      health_id: null,
      eating_id: null,
      training_id: null,
      selected: '',
      picked: '',
      eventDates: [],
      selectedEventDate: '',
      selectedDate: '',
      allEating: null,
      allTraining: null,

      loading: true
    }
  },
  async mounted() {
    this.user = await useUser().getUser();
    this.health = await useHealth().getHealth(this.user?.id);
    this.allEating = await useEat().getEats();
    this.allTraining = await useTraining().getTrainings();
    
    this.health_id = this.health.id;
    this.user_id = this.user.id;
    this.updateEventDates();
    this.loading = false;
  },
  methods: {
    ...mapActions(useHealth, ["updateHealth"]),
    ...mapActions(useUser, ["updateUser"]),
    ...mapActions(useEat, ["updateEat"]),
    ...mapActions(useTraining, ["updateTraining"]),
    ...mapActions(useEvent, ["updateEvent"]),

    async updateHealth(data) {
      await useHealth().updateHealth(data, this.user?.id);
    },
    async updateUser(data) {
      await useUser().updateUser(data, this.user?.id);    
    },
    async updateEat(data) {
      await useEat().updateEat(data, this.user?.id);
    },
    async updateTraining(data) {
      await useTraining().updateTraining(data, this.user?.id);
    },
    async updateEvent(data) {
      await useEvent().updateEvent(data, this.user?.id);
    },
    updateEventDates() {
        const eventDates = [];
        this.event = this.allEating?.filter(x => x.event?.user_id == this.user?.id);
        for (let i = 0; i < this.event?.length; i++) {
            eventDates.push(this.event[i]?.event.event_date);
        }
        this.eventDates = eventDates;
    },
  },
  watch: {
    selectedDate() {
      this.eating = this.allEating.find(x => x.event.event_date == this.selectedDate);
      this.trainings = this.allTraining.find(x => x.event.event_date == this.selectedDate);
    }
  },
  computed: {
    ...mapState(useEvent, ["events"]),

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
    calories() {
      const birthDate = new Date(this.user?.birth_date);
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      let SumCalories;
      if (this.user?.gender == "nő") {
        SumCalories = Math.round((447.593 + (3.098 * this.health?.height) + (9.247 * this.health?.weight) - 4.433 * age) * 100) / 100;
      } else if (this.user?.gender == "férfi")  {
        SumCalories = Math.round((88.362 + (4.799 * this.health?.height) + (13.397 * this.health?.weight) - 5.677 * age) * 100) / 100;
      }
      switch(this.selected) {
        case 'Csekély':
          Math.round((SumCalories *= 1.2) * 100) / 100;
          break;
        case 'Mérsékelt': 
          Math.round(( SumCalories *= 1.375) * 100) / 100;
          break;
        case 'Közepes': 
          Math.round((SumCalories *= 1.55) * 100) / 100;
          break;
        case 'Átalgosan magas':
          Math.round((SumCalories *= 1.725) * 100) / 100;
          break;
        case 'Nagyon magas':
          Math.round((SumCalories *= 1.9) * 100 / 100);
          break;
        default:
          break;
      }
      return Math.round(SumCalories);
    },
    progressCalories() {
      let pickedCalories = 0;
      switch (this.picked) {
        case 'testtomegMegtartasa': 
          pickedCalories = this.calories;
          break;
        case 'testtomegCsokkentese': 
          pickedCalories = this.calories - 550;
          break;
        case 'testtomegNovelese':
          pickedCalories = this.calories + 550;
          break;
        default:
          break;
      }
      return pickedCalories;
    },
    backgroundProgressSummary() {
      var bgColor = "blue";
      if ((this.eating?.calories_morning + this.eating?.calories_evening + this.eating?.calories_noon) > this.progressCalories) {
        bgColor = "#A51D2B";
      } else {
        bgColor = "#12633D";
      }
      return bgColor;
    },
    backgroundProgressMorning() {
      var bgColor = "blue";
      if ((this.eating?.calories_morning) > ((this.progressCalories / 100) * 25)) {
        bgColor = "#A51D2B";
      } else {
        bgColor = "#12633D";
      }
      return bgColor;
    },
    backgroundProgressNoon() {
      var bgColor = "blue";
      if ((this.eating?.calories_noon) > ((this.progressCalories / 100) * 40)) {
        bgColor = "#A51D2B";
      } else {
        bgColor = "#12633D";
      }
      return bgColor;
    },
    backgroundProgressEvening() {
      var bgColor = "blue";
      if ((this.eating?.calories_evening) > ((this.progressCalories / 100) * 35)) {
        bgColor = "#A51D2B";
      } else {
        bgColor = "#12633D";
      }
      return bgColor;
    }
  }
}
</script>
