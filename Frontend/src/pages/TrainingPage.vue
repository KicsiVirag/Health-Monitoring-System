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
              class="list-group border-0 rounded-0 text-sm-start"
            >
              <a
                href="#How-much-it-is-worth-moving"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-scooter"></i> <span>Érdemes<br>mozogni</span></a
              >
              <a
                href="#watch-your-pulse"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-scooter"></i> <span>Pulzus</span></a
              >
              <a
                href="#disease-prevention"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-scooter"></i> <span>Betegségek</span></a
              >
            </div>
          </div>
        </div>
        <main class="col ps-md-2 pt-2">
          <a
            href="#"
            data-bs-target="#sidebar"
            data-bs-toggle="collapse"
            class="border rounded-3 p-1 text-decoration-none"
            ><i class="bi bi-list-ul bi-lg py-2 p-1"></i> Menü</a
          >
          <div class="page-header pt-3">
            <h1>Mozgás</h1>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <p>
                A modern kor embere egyre kevesebb időt tölt aktívan. Mindennapi
                tevékenységei – utazás, munka, szórakozás, baráti találkozók,
                ház körüli tennivalók – a minket támogató eszközök, műszaki
                megoldások fejlődése miatt gyakran leegyszerűsödtek, gépesítetté
                váltak vagy az online térbe helyeződtek át.  Emiatt egyre
                kevesebbet mozgunk, ami negatív hatással van az egészségi
                állapotunkra is; növeli például a szív- érrendszeri betegségek,
                a diabétesz, egyes daganatok, illetve a depresszió és a demencia
                kialakulásának a kockázatát. 
              </p>
            </div>
            <img
              class="w-50 mx-auto d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
              src="@assets/images/Running.png"
              alt="Futás"
              title="Futás"
            />
          </div>
          <div class="row">
            <div class="col-12">
              <h2
                class="title-of-h2 rounded p-2"
                id="How-much-it-is-worth-moving"
              >
                Mennyit érdemes mozogni egy héten?
              </h2>
              <p>
                Vajon mennyi időt érdemes mozogni egy héten? Az ajánlás szerint
                minimum 150 perc mérsékelt intenzitású aerob vagy 75 perc
                erőteljes intenzitású mozgásra, vagy e két típus kombinációjára
                van szükség. Ugyanakkor további pozitív hatást eredményez a
                mozgás mennyiségi növelése a fenti ajánlás kétszeresére,
                kiegészítve heti kétszeri izomerősítő edzéssel.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="watch-your-pulse">
                Figyelni kell a pulzusra!
              </h2>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <img
                    class="w-25 float-start mx-2 rounded d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                    src="@assets/images/Cycling.webp"
                    alt="Biciklizés"
                    title="Biciklizés"
                  />
                  <p>
                    A mozgás intenzitása az aktuális pulzusszám alapján is
                    meghatározható a pulzustartomány kalkulátor segítségével. A
                    pulzusszám értéke azért fontos, mert ha az edzések alatt nem
                    emelkedik meg kellő mértékben, akkor a kívánt hatás sem
                    érhető el. A túl magas pulzusszám szintén nem célravezető,
                    mert az nagyon megterheli a szervezetet és a keringést. A
                    tartósan túl magas pulzusszámon végzett testedzés keringési
                    problémák kialakulásához vezethet.
                  </p>
                  <p>
                    Az edzés során – a fogyókúrához hasonlóan – nem lehet egyik
                    napról a másikra eredményt elérni. Amíg a drasztikus
                    fogyókúrák jojó-effektushoz, addig a hirtelen megnövelt
                    edzésterhelés túledzettséghez, az immunrendszer
                    legyengüléséhez, sérülésekhez és ízületi fájdalmakhoz
                    vezethet. Személyre szabott mozgástervet kell kialakítani,
                    fokozatosan változó terheléssel és a megfelelő mennyiségű
                    pihenés biztosításával. Ha pedig a hétköznapi mozdulatokat
                    is nehézkessé és fájdalmassá tévő mozgásszervi panaszunk
                    van, a sportolás megkezdése előtt konzultálni kell a
                    háziorvossal, gyógytornásszal vagy egyéb egészségügyi
                    szakemberrel.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="disease-prevention">
                Betegségek megelőzése
              </h2>
              <div class="row">
                <div class="col-12">
                  <img
                    class="w-25 float-end mx-2 rounded d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                    src="@assets/images/Yoga.jpg"
                    alt="Jóga"
                    title="Jóga"
                  />
                  <p>
                <strong
                  >A rendszeres mozgásnak a betegségek megelőzésében is hatalmas
                  szerepe van.</strong
                >
                Javítja a keringési rendszer működését, erősíti a szívizomzatot
                és csökkenti a nyugalmi pulzust. A sport edzettebbé teszi a
                vázizomzatot, ezáltal növeli az izomerőt. Mivel a rendszeres
                fizikai aktivitás rengeteg kalóriát éget, könnyebb vele elérni
                és megtartani az ideális testtömeget. A sport kiválóan alkalmas
                továbbá a stressz levezetésére, javítja a közérzetet, több
                energiát eredményez, így a napok nyugodtabban,
                kiegyensúlyozottabban telnek. Javítja az alvás minőségét, a
                koncentrációs képességet, növeli az önbizalmat és az
                önbecsülést, illetve az akaraterőt, ami pozitívan hat a
                teljesítményünkre az élet minden területén.
              </p>
              
                </div>
              </div>
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
  },
};
</script>
