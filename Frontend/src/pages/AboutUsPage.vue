<template>
  <BaseLayout>
    <div class="row">
      <div class="col-12 pt-5 pb-5">
        <h2 id="aboutUsTitle">Rólunk</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-8">
        <p id="aboutUsParagraph">
          OPK Egészségfigyelő honlapunkon a célunk, hogy segítsünk Önnek az
          egészséges életmód kialakításában és fenntartásában. A modern élet sok
          kihívással járhat az egészség terén, és mi itt vagyunk, hogy
          tájékoztassunk és inspiráljunk.
        </p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 img-wrapper">
        <img
          src="@assets/images/Healthcare sector.png"
          alt=""
          id="aboutUsImage"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-12 ps-5 pe-5 mt-5">
        <p>
          Az Egészségfigyelő egy olyan online platform, ahol a legfrissebb
          egészségügyi információkhoz juthat, hasznos tanácsokat kaphat az
          egészséges étkezésről, testmozgásról, mentális jólétről és sok más
          témáról. Szakértői csapatunk folyamatosan dolgozik azért, hogy olyan
          tartalmakat kínáljunk, amelyek segítenek Önnek a tudatosabb döntések
          meghozatalában az egészsége érdekében. Legyen szó prevencióról,
          életmódváltásról vagy konkrét egészségügyi problémákról, itt mindent
          megtalál, amire szüksége lehet az optimális egészség eléréséhez és
          fenntartásához. Köszönjük, hogy velünk tart, és hozzájárul
          egészségesebb és boldogabb életéhez!
        </p>
        <p>
          Bízunk benne, hogy oldalunk isnspirációt nyújt az egészségesebb
          életmód kialakításához vagy annak fenntartásához.
        </p>
        <RouterLink
          :to="{ name: 'main' }"
          class="btn p-3 mt-4 mb-3 zoom"
          id="abouUsButtonRouteMain"
          >Irány a kezdőoldal!</RouterLink
        >
      </div>
    </div>
    <div class="row pt-5">
      <div
        class="col-12 p-1"
        id="aboutUsResponseDiv">
        <h2>Felhasználóink visszajelzései:</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div
        class="col-sm-12 col-md-9 col-md-9 pt-5"
        data-spy="scroll"
        data-target=".myscroll"
        data-offset="20"
      >
        <div
          class="p-5 rounded-5 scrollspy-example aboutUsScrollDiv"
          data-bs-spy="scroll"
          data-bs-smooth-scroll="true"
          tabindex="0"
        >
          <div v-for="(toast, key) in toastMessages" :key="key">
            <Toast
              :show="showToast"
              :user="toast.user"
              :message="toast.message"
            />
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 col-lg-3 pt-5 text-center">
        <button
          class="btn btn-success mb-0 p-3 zoom"
          data-bs-toggle="modal"
          data-bs-target="#modalMessage"
        >
          <i class="bi bi-plus-circle"></i> Új visszajelzés hozzáadása
        </button>
        <div
          class="modal fade"
          id="modalMessage"
          tabindex="-1"
          aria-labelledby="modalMessageLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalMessageLabel">
                  Új visszajelzés hozzáadása:
                </h1>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <i class="bi bi-chat-square-dots-fill"></i
                ><textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  placeholder="Írj felhasználó véleményt!"
                  v-model="newToastMessage"
                ></textarea>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-bs-dismiss="modal"
                >
                  Close <i class="bi bi-x-circle"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-success"
                  @click="showToastMethod"
                >
                  Save changes <i class="bi bi-send-check"></i>
                </button>
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
import Toast from "@components/layout/Toast.vue";
import { useUser } from "@stores/UserStore.mjs";
import { mapActions, mapState } from "pinia";

export default {
  components: {
    BaseLayout,
    RouterLink,
    Toast,
  },
  data() {
    return {
      showToast: true,
      user_name: null,
      toastMessages: {
        toastMessage1: {
          user: "KisPista21",
          message:
            "Remek az oldal működése, nagyon jól vezethetőek az egészségügyi adatok!",
        },
        toastMessage2: {
          user: "Kovácsné54",
          message: "Nagyon meg vagyok elégedve vele!",
        },
        toastMessage3: {
          user: "Lauren Okuneva",
          message: "Hasznosak a funkciói, hasznos témákkal foglalkozik.",
        },
        toastMessage4: {
          user: "Mina Torphy IV",
          message: "Nagyon hasznos!",
        },
      },

      newToastMessage: "",
    };
  },
  async mounted() {
    this.user = await useUser().getUser();
    this.user_name = this.user.name;
    this.loalding = false;
  },
  methods: {
    getToastMessages() {
      return Object.values(this.toastMessages);
    },
    showToastMethod() {
      const newKey = `toastMessage${
        Object.keys(this.toastMessages).length + 1
      }`;
      this.toastMessages[newKey] = {
        user: this.user_name,
        message: this.newToastMessage,
      };

      this.showToast = true;
      this.newToastMessage = "";
    },
  },
};
</script>