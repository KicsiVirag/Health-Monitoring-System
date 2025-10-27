<template>
  <BaseLayout>
    <div class="container">
      <div class="row mt-3">
        <div class="col-xs-12 col-md-12 col-lg-8">
          <h1 class="w-100 my-2 mainH1">
            Szeretnél egészséges lenni, mint a makk?
          </h1>
          <h1
            class="text-end fw-normal my-2"
            id="mainTitle2"
          >
            Vágj bele még ma!
          </h1>
          <div class="row my-2">
            <div class="col my-2">
              <button
                class="btn w-100 zoom"
                id="mainButtonLogin"
                type="submit"
              >
                <RouterLink
                  class="link-underline link-underline-opacity-0 fs-4 fw-semibold"
                  :to="{ name: 'log-in' }"
                  v-if="!isLoggedIn"
                  >Bejelentkezés</RouterLink
                >
              </button>
            </div>
            <div class="col my-2">
              <button
                class="btn w-100 zoom"
                id="mainButtonRegister"
                type="submit"
              >
                <RouterLink
                  class="link-underline link-underline-opacity-0 fs-4 fw-semibold"
                  :to="{ name: 'sign-in' }"
                  v-if="!isLoggedIn"
                  >Regisztráció</RouterLink
                >
              </button>
            </div>
          </div>
        </div>
        <div
          class="img-wrapper col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
        >
          <img
            id="main_img"
            src="@assets/images/Logo Healthcare.png"
            class="mx-auto w-100 rounded-circle border border-5 shadow-sm bg-body-tertiary rounded d-flex flex-wrap align-items-center"
            alt="Egészség Figyelő"
            title="Egészség Figyelő"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row my-2">
            <div class="col-xs-12 col-md-4 mt-5">
              <p>
                Nem csak gyógyítunk, hanem a megelőzésben is segítünk. Szakértő
                csapatunk átfogó egészségügyi vizsgálatokat és tanácsadást
                kínál, hogy megelőzhessük az esetleges betegségeket, és
                megőrizhessük a jó egészséget.
              </p>
            </div>
            <div class="col-xs-12 col-md-8 mt-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Naprakész adatok</h5>
                  <p class="card-text p-3">
                    Biztosítjuk, hogy minden egészségügyi adatot napra pontosan
                    rögzítsünk és tároljunk. Legyen szó laboreredményekről,
                    orvosi vizsgálatokról vagy akár edzések adatairól, minden
                    információt könnyen visszakereshet nálunk.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-8 mt-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Barátságos környezet</h5>
                  <p class="card-text p-3">
                    Nem csak egy klinikára, hanem egy barátságos közösségre
                    találsz nálunk. Célunk, hogy minden látogatásod kellemes
                    legyen, és bátran fordulj hozzánk bármilyen kérdéssel vagy
                    aggodalommal.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-4 mt-5">
              <p>
                A legújabb technológiai eszközökkel és módszerekkel dolgozunk,
                hogy hatékonyan és gyorsan javíthassuk az egészségi állapotodat,
                és lehetővé tegyük a gyorsabb felépülést.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 mt-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    Mi a kapcsolat a termés és az ember egészségi állapota
                    között?<i class="bi bi-tree"></i>
                  </h5>
                  <div class="col-xs-12 col-md-12 card-text p-3">
                      <img
                        class="w-25 float-end p-3 col-xs-12 col-sm-12 col-md-4 col-lg-4 d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                        src="@assets/images/Acorn.png"
                        alt="Makk"
                        title="Makk"
                      />
                      <p>
                        A makkegészséges kifejezést olyan emberekre mondják,
                        akik teljesen egészségesek, és szinte kicsattannak a jó
                        erőnléttől. Biztos eredete nincsen ennek a kifejezésnek,
                        de valószínű, hogy a külterjes sertéstartással hozható
                        kapcsolatba. Egész pontosan azzal, amikor még a
                        sertéseket nem termesztett vagy gyűjtött takarmányokkal
                        etették, hanem legeltették őket a legelőn, vagy
                        kihajtották őket mezőre, erdőbe.
                      </p>
                      <p>
                        Az állatállomány télen-nyáron kint a szabad ég alatt
                        tartózkodott, fedél nem volt a fejük felett,
                        takarmányozásáról külön nem gondoskodtak. Passzív
                        takarmányozásban az állatok élelmét a természetes
                        növénytakaró biztosította. Ilyen volt a makkoltatás,
                        amikor az állatokat kihajtották az erdőbe, ahol csak a
                        nagy hó akadályozhatta meg az állatok táplálékhoz
                        jutását.
                      </p>
                      <p>
                        Ez a takarmányozási fajta főként olyan területeken
                        alakulhatott ki ahol a természetes növénytakaró erre
                        alkalmas volt. A tölgymakkot értékesebbnek tekintették,
                        mint a bükkmakkot, azért mert a tölgymakk nagyobb és
                        vékonyabb héjú, minélfogva a sertés kevesebb fáradsággal
                        lakott jó vele. A makkoltatással felhizlalt állatok
                        vastag zsírréteget eresztettek, ami a makkoltatás
                        történelmének legaktívabb időszakában az egészség,
                        jólét, életerő jelképe volt. Valószínű, hogy a
                        makkegészséges kifejezés ebből az időszakból és
                        összefüggésből eredeztethető.
                      </p>
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
import { RouterLink } from "vue-router";
import { useUser } from "@stores/UserStore.mjs";
import { useTraining } from "@stores/TrainingStore.mjs";
import { useSleeps } from "@stores/SleepStore.mjs";
import { useMeasure } from "@stores/MeasureStore.mjs";
import { useEvent } from "@stores/EventStore.mjs";
import { useEat } from "@stores/EatingStore.mjs";
import { mapState, mapActions } from "pinia";

export default {
  components: {
    BaseLayout,
    RouterLink,
  },
  computed: {
    ...mapState(useUser, ["users"]),
    ...mapState(useTraining, ["trainings"]),
    ...mapState(useSleeps, ["sleeps"]),
    ...mapState(useMeasure, ["measures"]),
    ...mapState(useEvent, ["events"]),
    ...mapState(useEat, ["eating"]),
    ...mapState(useUser, ["isLoggedIn"]),
    loading() {
      return this.users === null;
    },
  },
};
</script>
