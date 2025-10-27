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
                href="#pulse"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-heart-pulse"></i> <span>Normál Pulzus</span></a
              >
              <a
                href="#pulse-characteristics"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-heart-pulse"></i> <span>Jellemzői</span></a
              >
              <a
                href="#blood-pressure"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-heart-pulse"></i> <span>Vérnyomás</span></a
              >
              <a
                href="#blood-pressure-values"
                class="list-group-item border-end-0 d-inline-block text-truncate"
                data-bs-parent="#sidebar"
                ><i class="bi bi-heart-pulse"></i> <span>Értékek</span></a
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
            <h1>Pulzus</h1>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <p>
                A pulzus egyik fontos életjelünk, melynek vizsgálatával képet
                kaphatunk egészségi állapotunkról, szívünk, ereink megfelelő
                működéséről. Megmutatja, szívünk 1 perc alatt milyen sebességgel
                pumpálja a vért testünkbe. Normál pulzus esetén az artériák a
                szívveréssel megegyező ritmusúak, periodikus lüktetésűek. Az
                általánosan elfogadott, normál érték felnőttek esetében 72/perc,
                azonban ez az egyéni jellemzőktől, az életmódtól, de akár a
                napszaktól függően kissé eltérő lehet. Ezek alapján, a 60-80
                ütés/perc közötti értékek is elfogadottak.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2
                class="title-of-h2 rounded p-2"
                id="pulse"
              >
                Mi a normál pulzus?
              </h2>
              <img
                class="w-25 float-start mx-2 rounded d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                src="@assets/images/Shutterstock.jpg"
                alt="Pulzus Mérés"
                title="Pulzus Mérés"
              />
              <p>
                A pulzus egyik fontos életjelünk, melynek vizsgálatával képet
                kaphatunk egészségi állapotunkról, szívünk, ereink megfelelő
                működéséről. Megmutatja, szívünk 1 perc alatt milyen sebességgel
                pumpálja a vért testünkbe.
              </p>
              <p>
                Normál pulzus esetén az artériák a szívveréssel megegyező
                ritmusúak, periodikus lüktetésűek. Az általánosan elfogadott,
                normál pulzus érték felnőttek esetében 72/perc, azonban ez az
                egyéni jellemzőktől, az életmódtól, de akár a napszaktól függően
                kissé eltérő lehet. Ezek alapján, a 60-80 ütés/perc közötti
                értékek is elfogadottak.
              </p>
              <p>
                A pulzus jellemzőinél beszélhetünk annak számáról, ritmusáról,
                illetve teltségéről.
              </p>
              <img
                class="w-25 float-end mx-2 rounded d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
                src="@assets/images/Heart rate number.jpg"
                alt="Pulzus Mérés"
                title="Pulzus Mérés"
              />
              <p>
                Normál esetben felnőtteknél a nyugalmi pulzus száma,
                frekvenciája – a szív egy perc alatti összehúzódásainak száma –
                60-80 ütés/perc. Azonban a pulzus szaporaságát befolyásolhatja
                például a kor, nem vagy akár az edzettség is. Csecsemőknél,
                gyermekeknél például a normál puzus értéke ettől sokkal
                magasabb, valamint a nők a férfiaknál általában magasabb
                pulzusszámmal rendelkeznek. Sportolók, aktív fizikai munkát
                végző embereknél a nyugalmi normál pulzus alacsonyabb lehet,
                mivel az edzett, erős szív egy ütés alatt több vért tud az
                artériákba pumpálni.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="pulse-characteristics">
                A normál pulzus jellemzői
              </h2>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <p>
                    A pulzus az artériákban áramló vérnyomás hullámzása, amely a
                    szív összehúzódásának (szisztolé) és elernyedésének
                    (diastolé) következménye. A normál pulzus tapintható és
                    mérhető jelenség, és az alábbi jellemzőket lehet értékelni:
                  </p>
                  <ul>
                    <li>
                      <strong>Frekvencia (szám/perc):</strong> A pulzusszám azt
                      mutatja, hány ütést észlelünk egy perc alatt. A normál
                      pulzus általában 60 és 100 ütés/perc között van
                      nyugalomban felnőtteknél.
                    </li>
                    <li>
                      <strong>Ritmusosság és teltség: </strong> A pulzusnak
                      ritmusosnak kell lennie, ami azt jelenti, hogy a pulzusok
                      között egyenletes időintervallumoknak kell lenniük. Az
                      artéria tapintása közben értékelhető a teltség, amely
                      általában az artériákban lévő vér mennyiségét jelzi.
                    </li>
                    <li>
                      <strong>Elérhetőség (tapinthatóság):</strong> A normál
                      pulzus könnyen elérhető az artériákban. A leggyakrabban
                      használt helyek a radiális artéria a csuklón, a
                      <a href="https://www.tromboziskozpont.hu/erelmeszesedes"
                        >carotis artéria</a
                      >
                      a nyakon és az inguinalis (lágyéki) artéria a combon.
                    </li>
                    <li>
                      <strong>Erősség:</strong> A normál pulzus erőssége is
                      fontos értékelési kritérium lehet. Az artéria pulzálása
                      lehet erős, közepes vagy gyenge.
                    </li>
                    <li>
                      <strong>Elnyomhatóság:</strong> Az elnyomhatóság azt
                      jelzi, hogy a pulzus mennyire könnyen elnyomható a
                      tapintás során. Például az artériákban jelentkező
                      elnyomható pulzusok észlelése súlyosabb keringési
                      problémákat jelezhet.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header pt-3">
            <h1>Vérnyomás</h1>
          </div>
          <hr />
          <div class="row">
            <div class="col-12">
              <p>
                Az érrendszer a vér folyamatos áramlásával biztosítja a sejtek
                oxigén- és tápanyagellátását. A keringés motorja, a szív egy
                négyüregű pumpa, mely két pitvarból és két kamrából áll. A szív
                jobb oldala fogadja az elhasznált, oxigénszegény vért, és a
                tüdőbe pumpálja. Ez a kisvérkör. A szív bal oldala fogadja a már
                felfrissült vért a tüdőből, majd nagy nyomással kilöki az aortán
                (főverőéren) át a szervezetbe. Ez a nagyvérkör. Az aortát
                követően a kipumpált vér a nagyerekbe, az artériákba kerül. A
                nyomási hullám terjedése miatt felületes helyeken (pl.
                csuklónál) ezt pulzusként tapinthatjuk is. A verőerek egyre
                kisebb erekre oszlanak, legvégül a hajszálnál is vékonyabb
                hajszálerekre. Itt történik meg a szövetekben az oxigén és a
                tápanyagok leadása és a bomlástermékek felvétele. Az elhasznált
                vér nagyrészt a hajszálvénákon, másrészt a nyirokereken jut a
                visszerekbe, vénákba, majd a fő vénán át vissza a szívbe. A
                verőerek fala a nagyobb nyomás miatt vastagabb, a visszerek
                vékonyabb falúak, helyenként billentyűkkel, biztosítják az
                egyirányú áramlást.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="blood-pressure">
                Mi a vérnyomás?
              </h2>
              <div class="row">
                <div class="col-12">
                  <p>
                    A vérnyomás a szív munkája által létrehozott, az erek falát
                    belülről feszítő nyomás, amely a keringés fennmaradásának
                    elengedhetetlen feltétele. A vérnyomás nagyon változékony,
                    értékét számos tényező befolyásolja, pl. éjszaka
                    alacsonyabb, lelki vagy fizikai terhelés, hideg, fájdalom
                    emeli.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <img
            class="w-25 float-end mx-2 rounded d-block d-flex flex-wrap align-items-center d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"
            src="@assets/images/Blood pressure meter.png"
            alt="Vérnyomás mérő"
            title="Vérnyomás mérő"
          />
          <div class="row">
            <div class="col-12">
              <h2 class="title-of-h2 rounded p-2" id="blood-pressure-values">
                Mit jelentenek a vérnyomás értékek?
              </h2>
              <div class="row">
                <div class="col-12">
                  <p>
                    A vérnyomást két számmal jellemezzük: például 121/82 Hgmm
                    (higanymilliméter). A higanymilliméter a nyomás egyik
                    elfogadott mértékegysége. Az első (vérnyomásmérőkön felső)
                    szám, amit szisztolés értéknek nevezünk, az a nyomás, amely
                    a szív összehúzódásakor mérhető az erekben, és értéke mindig
                    nagyobb a második számnál. A második (vérnyomásmérőkön alsó)
                    szám a diasztolés érték, mely azt a nyomást mutatja, amely a
                    szív elernyedésekor mérhető az erekben. Az egy perc alatt a
                    szívütések száma, vagyis az elhaladó pulzushullámok száma a
                    pulzusszám, a harmadik érték, amit vérnyomásméréskor
                    meghatározunk, illetve az automata vérnyomásmérők kiírnak
                    (pl.: 62/perc).
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
