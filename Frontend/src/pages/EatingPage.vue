<template>
  <BaseLayout>
    <div class="container-fluid">
      <div class="row flex-wrap">
        <div class="col-auto px-0">
          <div
            id="sidebar"
            class="collapse collapse-horizontal show border-end"
          >
            <div
              id="sidebar-nav"
              class="list-group border-0 rounded-0 text-sm-start "
            >
              <a
                href="#carbohydrate"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-egg-fried"></i> <span>A szénhidrát</span>
              </a>
              <a
                href="#protein"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-egg-fried"></i> <span>A fehérje</span></a
              >
              <a
                href="#fat"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-egg-fried"></i> <span>A zsír</span></a
              >
              <a
                href="#dietary-supplements"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-egg-fried"></i> <span>Kiegészítők</span></a
              >
            </div>
          </div>
        </div>
        <main class="col ps-md-2 pt-2">
          <a
            href="#"
            data-bs-target="#sidebar"
            data-bs-toggle="collapse"
            class="border rounded-3 p-1 text-decoration-none MenuSideBar"
            ><i class="bi bi-list-ul bi-lg py-2 p-1"></i> Menü</a
          >
          <div class="page-header pt-3">
            <h1>Táplálkozás</h1>
          </div>
          <hr />
          <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12">
              <p>
                Az egészségtudatos táplálkozás titka nem az egyes élelmiszerek,
                tápanyagok elhagyásában, hanem azok tudatos fogyasztásában
                rejlik. Akármilyen étrend vagy étel mellett döntünk is, a
                drasztikus megszorítások helyett mindig a kiegyensúlyozottságra
                kell törekednünk. A mennyiség mellett oda kell figyelni az
                arányokra is, hiszen az egyes tápanyagok elhagyásával – vagy nem
                megfelelő minőségű pótlásukkal – könnyen hiánybetegségek
                alakulhatnak ki.  A napi teljes értékű táplálkozás felépítésében
                az
                <a href="https://www.okostanyer.hu/okostanyer-felnott/"
                  >Okostányér hivatalos</a
                >
                ajánlása ad segítséget.
              </p>
              <p>
                E szerint a helyes táplálkozás alapját a gyümölcsök, a
                zöldségek, a gabonafélék, a húsok, halak, a tojás, illetve a
                tej- és tejtermékek fogyasztása és helyesen megválasztott aránya
                adja. A testmozgás naponta ajánlott, viszont a nassolás csak
                alkalmanként javasolt.
              </p>
            </div>
            <div class="col-lg-6 col-md-0 col-xs-0">
              <img
                class="w-100 d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                src="@assets/images/Smart Plate.png"
                alt="Okos tányér"
                title="Okos tányér"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="carbohydrate">A szénhidrát</h2>
              <p>
                A szénhidrátok (a fehérjék és a zsírok mellett) a szervezet
                legjelentősebb energiát adó tápanyagai. Két fő csoportba
                sorolhatók, az egyszerű (pl. cukor) és az összetett szénhidrátok
                (pl. rostok, keményítő) csoportjába. Napi energiabevitelünk
                bázisát képezik, hiszen 50–55%-ban szénhidráttal kell fedeznünk
                energiaszükségletünket – fontos, hogy ennek lehetőleg minél
                nagyobb hányada legyen összetett szénhidrát!
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="protein">A fehérje</h2>
              <div class="row">
                <div class="col-lg-4 col-md-0 col-xs-0">
                  <img
                    class="w-50 mx-auto d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                    src="@assets/images/Amino acids.png"
                    alt="Esszenciális aminosavak"
                    title="Esszenciális aminosavak"
                  />
                </div>
                <div class=" col-lg-8 col-md-0 col-xs-0">
                  <p>
                    A fehérjebevitel létszükséglet, az esszenciális aminosavak
                    bevitele pedig elengedhetetlen. A szervezet számára az
                    állati eredetűek szolgálnak teljes értékű fehérje
                    forrásként.
                  </p>
                  <p>
                    <strong>Teljes értékű fehérjeforrások:</strong> a húsok, a halak, a tej, a
                    tejtermékek és a tojás. Az állati eredetű fehérjeforrások
                    kiválasztásakor figyelmet kell fordítani a termékekben rejlő
                    egyéb tápanyagokra is (zsírok, szénhidrátok, nyomelemek). A
                    növényi eredetű fehérjék többsége nem teljes értékű, mert
                    hiányzik vagy nincs meg bennük megfelelő arányban a
                    nélkülözhetetlen aminosavak egy része. Ettől függetlenül
                    ezek is fontosak! Egy átlagos fizikai aktivitású felnőtt
                    számára napi 0,8–1,2 g/testtömeg-kilogramm bevitele
                    ajánlott. A túl sok fehérje fogyasztása feleslegesen terheli
                    meg a szervezetet.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="fat">A zsír</h2>
              <p>
                A szénhidrátok és a fehérjék mellett a zsírok is nélkülözhetetlenek szervezetünk egészséges működéséhez. Jelentős szerepük van annak felépítésében és anyagcseréjében, valamint energiaforrásként is szolgálnak. Segítik a zsírban oldódó vitaminok felszívódását, részt vállalnak a testhőmérsékletünk állandó szinten tartásában. Emellett a zsírszövetek mechanikus védelmet biztosítanak, illetve szükségesek a sejthártya felépítéséhez, egyes hormonok működéséhez, valamint a D-vitamin képződéséhez is. Utóbbi nemcsak a csontok hosszan tartó épségének megőrzéséhez kell, hanem az immunrendszert is erősíti. A napi energiabevitel 15–30%-át kell zsírfélékből biztosítani; egy gramm zsír pedig dupla annyi energiát szolgáltat, mint az azonos mennyiségű szénhidrát vagy fehérje. A zsír nélkülözhetetlen, de a minőség kérdése ebben az esetben is fontos tényező. 
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="dietary-supplements">“Csodakaják” az étrend-kiegészítők?</h2>
              <p>
                Az étrend-kiegészítők napjainkban igen divatosak, követhetetlen mennyiségben és minőségben állnak rendelkezésre a “piacon”. Jogos tehát a kérdés: mi alapján dönthet az ember a megfelelő mellett, mire van szüksége a szervezetnek és milyen mennyiségben? Mindenek előtt fontos leszögeznünk, hogy ezek a termékek nem helyettesíthetnek semmilyen élelmiszert vagy ételt. Kizárólag a táplálkozási ajánlásokat és saját aktuális állapotunkat (pl. laborvizsgálat eredményét) figyelembe véve szabad őket alkalmazni. Kérdés esetén mindenképp érdemes konzultálni a kezelőorvossal, vagy dietetikussal, táplálkozástudományi szakemberrel. Ezeken kívül az <a href="https://ogyei.gov.hu/etrend_kiegeszitok">Országos Gyógyszerészeti és Élelmezés-egészségügyi Intézet</a> honlapján is találhatók információk a bevizsgált étrend kiegészítőkkel és használatukkal kapcsolatban. 
              </p>
            </div>
          </div>
        </main>
      </div>
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from "@layouts/BaseLayout.vue";

export default {
  components: {
    BaseLayout,
  }
};
</script>
