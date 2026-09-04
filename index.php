<?php
// Page freshness, independent of mod_headers (which may not be loaded here).
// Assets stay cacheable; only this HTML document is revalidated.
header('Cache-Control: no-cache, must-revalidate');

/**
 * Cache-busting asset URL: appends the file's modification time as ?v=...
 * Change a file -> its URL changes -> every visitor gets the new version.
 */
function v($path) {
    $file = __DIR__ . '/' . ltrim($path, '/');
    $ts = @filemtime($file);
    if (!$ts) { return htmlspecialchars($path, ENT_QUOTES); }
    return htmlspecialchars($path . '?v=' . $ts, ENT_QUOTES);
}
?>
<!doctype html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Primary SEO meta -->
    <title>Tanečné štúdio DANCY Bratislava | Tanec a gymnastika pre deti a mládež</title>
    <meta
      name="description"
      content="Tanečné štúdio DANCY v Bratislave – tanec a gymnastika pre deti a mládež od 2 do 20 rokov. Show dance, jazz dance, contemporary, baby dancy aj mini dancy. Príďte si k nám zatancovať!"
    />
    <meta
      name="keywords"
      content="tanečné štúdio Bratislava, tanec pre deti Bratislava, gymnastika pre deti, show dance, jazz dance, contemporary, baby dancy, mini dancy, DANCY"
    />
    <meta name="author" content="Tanečné štúdio DANCY" />
    <meta name="robots" content="index, follow" />
    <meta
      name="theme-color"
      content="#111114"
      media="(prefers-color-scheme: dark)"
    />
    <meta
      name="theme-color"
      content="#f7f6f9"
      media="(prefers-color-scheme: light)"
    />
    <link rel="canonical" href="https://www.dancy.sk/" />

    <!-- Google Search Console -->
    <meta
      name="google-site-verification"
      content="ClcHUlOWw3pwXRndoLeyUsYaTibwQEoCBKbxSRv65M8"
    />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Tanečné štúdio DANCY" />
    <meta
      property="og:title"
      content="Tanečné štúdio DANCY Bratislava | Tanec pre deti a mládež"
    />
    <meta
      property="og:description"
      content="Tanec a gymnastika pre deti a mládež od 2 do 20 rokov v Bratislave. Show dance, jazz dance, contemporary a ďalšie. Príďte sa pozrieť na tréning!"
    />
    <meta property="og:locale" content="sk_SK" />
    <meta
      property="og:url"
      content="https://www.dancy.sk/"
    />
    <meta
      property="og:image"
      content="https://www.dancy.sk/images/SCROLING/konkurz2.jpg"
    />
    <meta
      property="og:image:alt"
      content="Tanečníčky tanečného štúdia DANCY na javisku"
    />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Tanečné štúdio DANCY Bratislava" />
    <meta
      name="twitter:description"
      content="Tanec a gymnastika pre deti a mládež od 2 do 20 rokov v Bratislave."
    />
    <meta
      name="twitter:image"
      content="https://www.dancy.sk/images/SCROLING/konkurz2.jpg"
    />

    <link rel="icon" href="<?= v('images/SVG/header.svg') ?>" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="<?= v('images/LOGO/logo1cierne.png') ?>" />

    <!-- Apply the saved light/dark choice before first paint (no flash) -->
    <script>
      try {
        var savedTheme = localStorage.getItem("theme");
        if (savedTheme === "light" || savedTheme === "dark") {
          document.documentElement.setAttribute("data-theme", savedTheme);
        }
      } catch (e) {}
    </script>

    <!-- Bootstrap core CSS -->
    <link href="<?= v('CSS/bootstrap.min.css') ?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?= v('CSS/MYcss.css') ?>" rel="stylesheet" />

    <!-- Structured data: local dance school -->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": ["SportsActivityLocation", "LocalBusiness"],
        "name": "Tanečné štúdio DANCY",
        "description": "Tanečné štúdio pre deti a mládež od 2 do 20 rokov v Bratislave. Show dance, jazz dance, modern dance, contemporary a gymnastika.",
        "url": "https://www.dancy.sk/",
        "logo": "https://www.dancy.sk/images/LOGO/logo1cierne.png",
        "image": "https://www.dancy.sk/images/SCROLING/konkurz2.jpg",
        "telephone": "+421903838651",
        "email": "info@dancy.sk",
        "foundingDate": "2010",
        "priceRange": "€€",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Vajnorská 44",
          "postalCode": "831 03",
          "addressLocality": "Bratislava",
          "addressCountry": "SK"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 48.1608,
          "longitude": 17.1551
        },
        "areaServed": "Bratislava",
        "sameAs": [
          "https://www.facebook.com/tanecnestudiodancy/",
          "https://www.instagram.com/dancy_dancestudio/"
        ]
      }
    </script>
  </head>

  <body>
    <!-- ============ NAVBAR ============ -->
    <header>
      <nav
        class="navbar navbar-dark navbar-expand-lg fixed-top"
        aria-label="Hlavná navigácia"
      >
        <div class="container">
          <a class="navbar-brand" href="#hero">
            <img
              id="LOGOMAIN"
              src="<?= v('images/LOGO/cele biele.svg') ?>"
              alt="Tanečné štúdio DANCY"
              height="34"
            />
          </a>
          <button
            id="themeToggle"
            type="button"
            class="theme-toggle ms-auto me-2 ms-lg-3 me-lg-0 order-lg-last"
            aria-label="Prepnúť svetlý / tmavý režim"
            title="Svetlý / tmavý režim"
          >
            <svg
              class="theme-toggle__sun"
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
            >
              <circle cx="12" cy="12" r="5" />
              <line x1="12" y1="1" x2="12" y2="3" />
              <line x1="12" y1="21" x2="12" y2="23" />
              <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
              <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
              <line x1="1" y1="12" x2="3" y2="12" />
              <line x1="21" y1="12" x2="23" y2="12" />
              <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
              <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
            </svg>
            <svg
              class="theme-toggle__moon"
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
            >
              <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
            </svg>
          </button>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            aria-controls="mainNav"
            aria-expanded="false"
            aria-label="Otvoriť menu"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase">
              <li class="nav-item">
                <a class="nav-link" href="#novinky">Novinky</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#onas">O nás</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ponuka">Ponuka</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#treneri">Tréneri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#rozvrh">Rozvrh</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#kontakt">Kontakt</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- ============ HERO ============ -->
      <section
        id="hero"
        class="hero d-flex align-items-center text-center text-white"
      >
        <div class="hero__overlay"></div>
        <div class="container position-relative py-5">
          <p class="hero__eyebrow mb-2">
            Tanečné štúdio · Bratislava · od roku 2010
          </p>
          <h1 class="hero__title mb-3">Vitajte vo svete&nbsp;DANCY</h1>
          <p class="hero__lead mx-auto mb-4">
            Tanec a gymnastika pre deti a mládež od 2 rokov. Získaj nových
            priateľov, zaži radosť z pohybu a vytancuj sa na vystúpeniach aj
            súťažiach.
          </p>
          <div
            class="d-flex flex-column flex-sm-row justify-content-center gap-3"
          >
            <a href="#ponuka" class="btn btn-brand btn-lg px-4">Naša ponuka</a>
            <a href="#rozvrh" class="btn btn-outline-light btn-lg px-4"
              >Rozvrh hodín</a
            >
            <a
              href="https://forms.gle/JkEuvzr7Yj4BjLck6"
              class="btn btn-brand btn-lg px-4"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </section>

      <!-- ============ NOVINKY ============ -->
      <section id="novinky" class="section section--alt">
        <div class="container">
          <div class="text-center mb-5">
            <span class="section__kicker">Aktuálne</span>
            <h2 class="section__title">Novinky</h2>
            <p class="section__subtitle mx-auto">
              Pridajte sa k nám! Otvorili sme prihlasovanie na tanečné a
              gymnastické kurzy a zároveň hľadáme nové talenty do našich
              súťažných tanečných skupín. Staňte sa súčasťou našej tanečnej
              rodiny.
            </p>
          </div>

          <div class="row g-4 justify-content-center">
            <div class="col-6 col-lg-3">
              <a
                class="news-card"
                href="<?= v('images/NOVINKY/ZAPIS.jpg') ?>"
                target="_blank"
                rel="noopener"
              >
                <img
                  class="news-card__img"
                  src="<?= v('images/NOVINKY/ZAPIS.jpg') ?>"
                  alt="Zápis na kurzy Mini Dancy a Kids Dancy – september až január 2026/2027"
                  loading="lazy"
                />
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a
                class="news-card"
                href="<?= v('images/NOVINKY/GYMNASTIKA.jpg') ?>"
                target="_blank"
                rel="noopener"
              >
                <img
                  class="news-card__img"
                  src="<?= v('images/NOVINKY/GYMNASTIKA.jpg') ?>"
                  alt="Zápis na kurz gymnastiky pre dievčatá a chlapcov od 3 do 12 rokov"
                  loading="lazy"
                />
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a
                class="news-card"
                href="<?= v('images/NOVINKY/konkurz_BA.jpg') ?>"
                target="_blank"
                rel="noopener"
              >
                <img
                  class="news-card__img"
                  src="<?= v('images/NOVINKY/konkurz_BA.jpg') ?>"
                  alt="Konkurz do súťažných tanečných skupín – 3. 9. ZŠ Pavla Marcelyho a 7. 9. ZŠ Medzilaborecká, Bratislava"
                  loading="lazy"
                />
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a
                class="news-card"
                href="<?= v('images/NOVINKY/konkurz_Malinovo.jpg') ?>"
                target="_blank"
                rel="noopener"
              >
                <img
                  class="news-card__img"
                  src="<?= v('images/NOVINKY/konkurz_Malinovo.jpg') ?>"
                  alt="Konkurz do tanečného štúdia DANCY – 4. 9. 2026, Studiospot Malinovo"
                  loading="lazy"
                />
              </a>
            </div>
          </div>

          <div class="text-center mt-5">
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand btn-lg px-4"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </section>

      <!-- ============ O NÁS ============ -->
      <section id="onas" class="section">
        <div class="container">
          <div class="text-center mb-5">
            <span class="section__kicker">Kto sme</span>
            <h2 class="section__title">O nás</h2>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <p>
                Naše tanečné štúdio DANCY sa už od roku 2010 zameriava na
                výchovu a rozvoj detí a mládeže už od 2 rokov v tanečných
                štýloch show dance, jazz dance, modern dance a contemporary.
              </p>
              <p>
                Vytvárame miesto, kde sa spája radosť z pohybu, tanec,
                priateľstvá a spoločné zážitky. Venujeme sa deťom a mladým
                tanečníkom od prvých tanečných krokov až po súťažné choreografie
                a vystúpenia doma aj v zahraničí. Záleží nám na rodinnej
                atmosfére, osobnom prístupe a na tom, aby sa u nás každý cítil
                dobre a mal priestor zažiariť.
              </p>
            </div>
          </div>

          <div class="row text-center g-4 mt-4">
            <div class="col-6 col-lg-3">
              <div class="stat">
                <span class="stat__num">15+</span
                ><span class="stat__label">Rokov skúseností</span>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="stat">
                <span class="stat__num">30+</span
                ><span class="stat__label"
                  >Titulov majstrov Slovenska, Európy a sveta</span
                >
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="stat">
                <span class="stat__num">4</span
                ><span class="stat__label">Rôzne tréningové miesta</span>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="stat">
                <span class="stat__num">12</span
                ><span class="stat__label">Tanečných skupín</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ PONUKA / ČO TRÉNUJEME ============ -->
      <section id="ponuka" class="section section--alt">
        <div class="container">
          <div class="text-center mb-5">
            <span class="section__kicker">Čo trénujeme</span>
            <h2 class="section__title">Naša ponuka</h2>
          </div>

          <div class="row g-4">
            <!-- BABY DANCY -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalBaby"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Baby Dancy"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/BABY DANCY.jpg') ?>"
                  alt="Baby Dancy – tanečná príprava pre deti od 2 do 4 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Baby Dancy</h3>
                  <p class="offer-card__age">2 – 4 roky</p>
                  <p class="offer-card__text">
                    Tanečno-pohybová príprava pre najmenších.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>

            <!-- MINI DANCY -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalMini"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Mini Dancy"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/MINI DANCY.jpg') ?>"
                  alt="Mini Dancy – tanečná príprava pre deti od 3 do 6 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Mini Dancy</h3>
                  <p class="offer-card__age">3 – 6 rokov</p>
                  <p class="offer-card__text">
                    Krátke tančeky, koordinácia a rytmus hravou formou.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>

            <!-- KIDS DANCY -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalKidsDancy"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Kids Dancy"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/KIDS DANCY.jpg') ?>"
                  alt="Kids Dancy – tanečná príprava pre deti od 6 do 8 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Kids Dancy</h3>
                  <p class="offer-card__age">6 – 8 rokov</p>
                  <p class="offer-card__text">
                    Tanečná príprava, základy viacerých tanečných štýlov.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>

            <!-- GYMNASTIKA -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalGym"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Gymnastika"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/GYMNASTIKA.jpg') ?>"
                  alt="Gymnastika – základy gymnastiky a akrobacie pre deti od 3 do 12 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Gymnastika</h3>
                  <p class="offer-card__age">3 – 12 rokov</p>
                  <p class="offer-card__text">
                    Základy gymnastiky, kondičné hry a ľahká akrobacia.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>

            <!-- TEAM KIDS -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalKids"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Team Kids"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/TEAM KIDS.jpg') ?>"
                  alt="Team Kids – súťažný team pre deti od 6 do 12 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Team Kids</h3>
                  <p class="offer-card__age">6 – 12 rokov</p>
                  <p class="offer-card__text">
                    Súťažný team: show dance, jazz dance a contemporary.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>

            <!-- TEAM TEENS -->
            <div class="col-sm-6 col-lg-4">
              <article
                class="offer-card"
                data-bs-toggle="modal"
                data-bs-target="#modalTeens"
                role="button"
                tabindex="0"
                aria-label="Zobraziť detail Team Teens"
              >
                <img
                  class="offer-card__img"
                  src="<?= v('images/PONUKA/TEAM TEENS.jpg') ?>"
                  alt="Team Teens – súťažný team pre mládež od 12 rokov"
                  loading="lazy"
                />
                <div class="offer-card__body">
                  <h3 class="offer-card__title">Team Teens</h3>
                  <p class="offer-card__age">od 12 rokov</p>
                  <p class="offer-card__text">
                    Súťažný team: show dance, jazz dance a contemporary.
                  </p>
                  <span class="offer-card__more">Viac →</span>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ TRÉNERI ============ -->
      <section id="treneri" class="section">
        <div class="container">
          <div class="text-center mb-5">
            <span class="section__kicker">Náš tím</span>
            <h2 class="section__title">Tréneri</h2>
          </div>
          <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-2">
              <figure class="trainer">
                <img
                  class="trainer__img"
                  src="<?= v('images/TRAINERS/Small/danka.jpg') ?>"
                  alt="Daniela Hill – vedúca TŠ DANCY, trénerka a choreografka"
                  loading="lazy"
                />
                <figcaption>
                  <span class="trainer__name">Daniela Hill</span
                  ><span class="trainer__role"
                    >Vedúca TŠ DANCY, trénerka a choreografka tanečných
                    skupín</span
                  >
                </figcaption>
              </figure>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <figure class="trainer">
                <img
                  class="trainer__img"
                  src="<?= v('images/TRAINERS/Small/barbora.jpg') ?>"
                  alt="Barbora Stenová – trénerka a choreografka"
                  loading="lazy"
                />
                <figcaption>
                  <span class="trainer__name">Barbora Stenová</span
                  ><span class="trainer__role"
                    >Trénerka a choreografka tanečných skupín</span
                  >
                </figcaption>
              </figure>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <figure class="trainer">
                <img
                  class="trainer__img"
                  src="<?= v('images/TRAINERS/Small/Sabi.jpg') ?>"
                  alt="Sabína Košibová – trénerka a choreografka"
                  loading="lazy"
                />
                <figcaption>
                  <span class="trainer__name">Sabína Košibová</span
                  ><span class="trainer__role"
                    >Trénerka a choreografka tanečných skupín</span
                  >
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ ROZVRH ============ -->
      <section id="rozvrh" class="section section--alt">
        <div class="container">
          <div class="text-center mb-4">
            <span class="section__kicker">Kedy a kde</span>
            <h2 class="section__title">Rozvrh hodín</h2>
            <p class="section__subtitle mx-auto d-lg-none">
              Tabuľku posuňte do strán →
            </p>
          </div>

          <div class="schedule table-responsive">
            <table class="table schedule__table align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col">Deň</th>
                  <th scope="col">ZŠ Medzilaborecká</th>
                  <th scope="col">ZŠ Drieňová</th>
                  <th scope="col">Balance Dom</th>
                  <th scope="col">Studio Spot</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Pondelok</th>
                  <td>
                    <span class="slot bg-baby_blue" data-group="kidsdancy"
                      >Kids Dots I.<br />16:00 – 17:00</span
                    >
                    <span class="slot bg-yellow" data-group="teamteens"
                      >Teens Allstars<br />17:00 – 19:00</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-orange" data-group="teamkids"
                      >Kids Bubbles (skupina) – malá<br />16:00 – 17:30</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-purple" data-group="teamkids"
                      >Kids Cookies<br />16:00 – 17:00</span
                    >
                    <span class="slot bg-pink" data-group="mini"
                      >Mini I.<br />17:00 – 17:45</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-green" data-group="gym"
                      >Gymnastika 3–6 rokov<br />15:30 – 16:30</span
                    >
                    <span class="slot bg-baby_blue" data-group="kidsdancy"
                      >Kids Dots III.<br />16:30 – 18:00</span
                    >
                    <span class="slot bg-green" data-group="gym"
                      >Gymnastika 6–11 rokov<br />18:00 – 19:00</span
                    >
                  </td>
                </tr>
                <tr>
                  <th scope="row">Utorok</th>
                  <td>
                    <span class="slot bg-green" data-group="gym"
                      >Gymnastika 6–8 r. a 8–12 r.<br />16:00 – 17:00</span
                    >
                    <span class="slot bg-orange" data-group="teamkids"
                      >Kids Bubbles – technika<br />17:00 – 18:00</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-green" data-group="gym"
                      >Gymnastika 4–6 r. a 6–8 r.<br />17:00 – 18:00</span
                    >
                  </td>
                  <td></td>
                  <td>
                    <span class="slot bg-blue" data-group="baby"
                      >Baby Dancy 2–4 roky<br />10:00 – 10:45</span
                    >
                    <span class="slot bg-pink" data-group="mini"
                      >Mini II.<br />16:00 – 16:45</span
                    >
                    <span class="slot bg-lila" data-group="teamkids"
                      >Kids Monkeys<br />16:45 – 18:15</span
                    >
                  </td>
                </tr>
                <tr>
                  <th scope="row">Streda</th>
                  <td>
                    <span class="slot bg-orange" data-group="teamkids"
                      >Kids Bubbles<br />16:00 – 17:30</span
                    >
                    <span class="slot bg-yellow" data-group="teamteens"
                      >Teens Allstars – technika, baletka<br />16:00 –
                      17:30</span
                    >
                    <span class="slot bg-yellow" data-group="teamteens"
                      >Teens Allstars<br />17:30 – 19:00</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-purple" data-group="teamkids"
                      >Kids Cookies – malá<br />16:00 – 17:30</span
                    >
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Štvrtok</th>
                  <td>
                    <span class="slot bg-orange" data-group="teamkids"
                      >Kids Bubbles<br />16:00 – 18:00</span
                    >
                  </td>
                  <td>
                    <span class="slot bg-yellow" data-group="teamteens"
                      >Teens Allstars – veľká<br />16:00 – 17:30</span
                    >
                    <span class="slot bg-baby_blue" data-group="kidsdancy"
                      >Kids Dots II. – malá<br />16:00 – 17:00</span
                    >
                    <span class="slot bg-pink" data-group="mini"
                      >Mini III. – malá<br />17:00 – 17:45</span
                    >
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Piatok</th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="slot bg-lila" data-group="teamkids"
                      >Kids Monkeys<br />16:00 – 17:00</span
                    >
                    <span class="slot bg-pink" data-group="mini"
                      >Mini IV.<br />17:00 – 17:45</span
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- ============ KONTAKT ============ -->
      <section id="kontakt" class="section">
        <div class="container">
          <div class="text-center mb-5">
            <span class="section__kicker">Ozvite sa nám</span>
            <h2 class="section__title">Kontakt</h2>
          </div>

          <div class="row g-5">
            <div class="col-lg-5">
              <address class="contact-info">
                <p class="mb-4">
                  <strong>Tanečné štúdio DANCY</strong><br />
                  Vajnorská 44<br />
                  831 03 Bratislava
                </p>
                <p class="mb-2">
                  <span class="contact-info__label">E-mail:</span>
                  <a href="mailto:info@dancy.sk">info@dancy.sk</a>
                </p>
                <p class="mb-2">
                  <span class="contact-info__label">Telefón:</span>
                  <a href="tel:+421903838651">0903 838 651</a>
                </p>
                <p class="mb-4">
                  <span class="contact-info__label">IČO:</span> 42181208
                </p>
                <div class="d-flex gap-2">
                  <a
                    class="social-btn"
                    href="https://www.facebook.com/tanecnestudiodancy/"
                    target="_blank"
                    rel="noopener"
                    aria-label="Facebook"
                  >
                    <img
                      src="<?= v('images/SVG/facebook.svg') ?>"
                      alt=""
                      width="20"
                      height="20"
                  /></a>
                  <a
                    class="social-btn"
                    href="https://www.instagram.com/dancy_dancestudio/?hl=sk"
                    target="_blank"
                    rel="noopener"
                    aria-label="Instagram"
                  >
                    <img
                      src="<?= v('images/SVG/instagram.svg') ?>"
                      alt=""
                      width="20"
                      height="20"
                  /></a>
                </div>
              </address>
            </div>

            <div class="col-lg-7">
              <div class="contact-card">
                <h3 class="h5 mb-4">Kontaktujte nás</h3>
                <!-- Statická stránka nemá server. Formulár otvorí e-mailového klienta (mailto).
                   Pre priame odosielanie do schránky nahraďte action napr. Formspree adresou:
                   action="https://formspree.io/f/VASE_ID" method="POST" a odstráňte enctype. -->
                <form
                  action="mailto:info@dancy.sk"
                  method="POST"
                  enctype="text/plain"
                >
                  <div class="mb-3">
                    <label for="name" class="form-label">Meno</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Vaše meno"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="vas@email.sk"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="message" class="form-label">Správa</label>
                    <textarea
                      class="form-control"
                      id="message"
                      name="message"
                      rows="4"
                      placeholder="Vaša správa"
                      required
                    ></textarea>
                  </div>
                  <button type="submit" class="btn btn-brand w-100">
                    Odoslať správu
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Tréningové miesta / mapy -->
          <h3 class="h4 text-center mt-5 mb-4">Tréningy nájdete tu</h3>
          <div class="row g-4">
            <div class="col-6 col-lg-3">
              <div class="map-card">
                <h4 class="map-card__title">ZŠ Medzilaborecká</h4>
                <iframe
                  title="Mapa ZŠ Medzilaborecká"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.3763258860995!2d17.15514677631622!3d48.160827871246134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8ed6f53d4da9%3A0x3bc1a294f25955a8!2zWsOha2xhZG7DoSDFoWtvbGE!5e0!3m2!1ssk!2ssk!4v1696495147041!5m2!1ssk!2ssk"
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="map-card">
                <h4 class="map-card__title">ZŠ Drieňová</h4>
                <iframe
                  title="Mapa ZŠ Drieňová"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.4051605670847!2d17.149235176316243!3d48.16027207124601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8ed163bc279f%3A0xcf49678038eac15e!2zWsOha2xhZG7DoSDFoWtvbGEgUGF2bGEgTWFyY2VseWhv!5e0!3m2!1ssk!2ssk!4v1696495175727!5m2!1ssk!2ssk"
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="map-card">
                <h4 class="map-card__title">Balance Dom</h4>
                <iframe
                  title="Mapa Balance Dom"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1292.9355360941502!2d17.160251267760874!3d48.15569119664188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8f2af31313db%3A0xe88a327e68c25cd9!2sBalance%20Dom!5e0!3m2!1ssk!2ssk!4v1696495233291!5m2!1ssk!2ssk"
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="map-card">
                <h4 class="map-card__title">Studio Spot</h4>
                <iframe
                  title="Mapa Studio Spot"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1331.0153113575536!2d17.289630265744453!3d48.148214850037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c85253bb1cf65%3A0xebc4ee847e653d09!2sBB%20Studio%20Malinovo!5e0!3m2!1ssk!2ssk!4v1724953833976!5m2!1ssk!2ssk"
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="footer text-center">
      <div class="container">
        <img
          src="<?= v('images/LOGO/cele biele.svg') ?>"
          alt="Tanečné štúdio DANCY"
          height="40"
          class="mb-3"
        />
        <p class="mb-2">Od roku 2010 · © Tanečné štúdio DANCY</p>
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-2">
          <a class="btn btn-outline-light btn-sm" href="tel:+421903838651">
            <img
              class="footer-ico"
              src="<?= v('images/SVG/phone2.svg') ?>"
              alt=""
              width="16"
              height="16"
            />
            0903 838 651</a
          >
          <a class="btn btn-outline-light btn-sm" href="mailto:info@dancy.sk">
            <img
              class="footer-ico"
              src="<?= v('images/SVG/email2.svg') ?>"
              alt=""
              width="16"
              height="16"
            />
            info@dancy.sk</a
          >
          <a
            class="btn btn-outline-light btn-sm"
            href="https://www.facebook.com/tanecnestudiodancy/"
            target="_blank"
            rel="noopener"
          >
            <img src="<?= v('images/SVG/facebook.svg') ?>" alt="" width="16" height="16" />
            Facebook</a
          >
          <a
            class="btn btn-outline-light btn-sm"
            href="https://www.instagram.com/dancy_dancestudio/?hl=sk"
            target="_blank"
            rel="noopener"
          >
            <img src="<?= v('images/SVG/instagram.svg') ?>" alt="" width="16" height="16" />
            Instagram</a
          >
        </div>
      </div>
    </footer>

    <!-- ============ MODALY / DETAILY PONUKY ============ -->

    <!-- BABY DANCY -->
    <div
      class="modal fade"
      id="modalBaby"
      tabindex="-1"
      aria-labelledby="modalBabyLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalBabyLabel">Baby Dancy</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/BABY DANCY.jpg') ?>"
              alt="Baby Dancy"
              loading="lazy"
            />
            <p class="text-muted mb-3">2 – 4 roky</p>
            <p>
              Tanečno-pohybová príprava pre deti od 2 do 4 rokov. Počas
              45-minútovej tanečnej hodiny sa detičky pomocou ľahkých tanečných
              variácií a prvkov na obľúbené pesničky a riekanky stretnú s
              riadeným pohybom, prostredníctvom pohybových hier zlepšia svoju
              koordináciu a potrénujú sústredenie.
            </p>
            <h3 class="h6 mt-4">Čo si vziať na tréning?</h3>
            <ul>
              <li>
                Baletný / gymnastický dres či iný obtiahnutý úbor (tričko a
                legíny)
              </li>
              <li>
                Gymnastické / baletné cvičky s mäkkou podrážkou alebo ponožky
              </li>
              <li>
                Dievčatá prosíme stiahnuť vlasy gumičkou / upnúť do drdola
              </li>
              <li>Fľašu s vodou</li>
              <li>Tancovať a cvičiť budú s nami aj rodičia 🙂</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a
              href="#rozvrh"
              class="btn btn-outline-secondary"
              data-group="baby"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- MINI DANCY -->
    <div
      class="modal fade"
      id="modalMini"
      tabindex="-1"
      aria-labelledby="modalMiniLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalMiniLabel">Mini Dancy</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/MINI DANCY.jpg') ?>"
              alt="Mini Dancy"
              loading="lazy"
            />
            <p class="text-muted mb-3">3 – 6 rokov</p>
            <p>
              Tanečno-pohybová príprava pre deti od 3 do 6 rokov. Počas
              45-minútovej hodiny deti tancujú krátke tančeky na obľúbené
              pesničky. Pomocou pohybových hier rozvíjame koordináciu tela,
              orientáciu v priestore, posilňujeme svaly a učíme sa správnemu
              držaniu tela. Učíme sa aj disciplíne, práci v kolektíve a
              rozvíjame rytmus a hudobný sluch, ktorý deťom pomôže učiť sa
              cudzie jazyky.
            </p>
            <h3 class="h6 mt-4">Čo si vziať na tréning?</h3>
            <ul>
              <li>
                Baletný / gymnastický dres či iný obtiahnutý úbor (tričko a
                legíny)
              </li>
              <li>
                Gymnastické / baletné cvičky s mäkkou podrážkou alebo ponožky
              </li>
              <li>
                Dievčatá prosíme stiahnuť vlasy gumičkou / upnúť do drdola
              </li>
              <li>Fľašu s vodou</li>
              <li>Rodičov nie, tých necháme v šatni 🙂</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a
              href="#rozvrh"
              class="btn btn-outline-secondary"
              data-group="mini"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- KIDS DANCY -->
    <div
      class="modal fade"
      id="modalKidsDancy"
      tabindex="-1"
      aria-labelledby="modalKidsDancyLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalKidsDancyLabel">Kids Dancy</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/KIDS DANCY.jpg') ?>"
              alt="Kids Dancy"
              loading="lazy"
            />
            <p class="text-muted mb-3">6 – 8 rokov</p>
            <p>
              Tanečná príprava s prvkami show dance, jazz dance, contemporary, z
              ktorých postupne vznikajú nápadité choreografie. Deti sa učia
              vyjadriť pohybom náladu, pocity alebo príbeh. Prácou s rekvizitami
              si precvičia svoju koordináciu a získajú radosť z pohybu. Na
              gymnastickom tréningu si rozvíjajú pohybové schopnosti a
              flexibilitu.
            </p>
            <ul>
              <li>Tréningy: 2× 60 min týždenne – tanec + gymnastika</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a
              href="#rozvrh"
              class="btn btn-outline-secondary"
              data-group="kidsdancy"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- GYMNASTIKA -->
    <div
      class="modal fade"
      id="modalGym"
      tabindex="-1"
      aria-labelledby="modalGymLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalGymLabel">Gymnastika</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/GYMNASTIKA.jpg') ?>"
              alt="Gymnastika"
              loading="lazy"
            />
            <p class="text-muted mb-3">3 – 12 rokov</p>
            <p>
              Všeobecné základy gymnastiky, kondičné hry a ľahká akrobacia pre
              deti od 3 do 12 rokov.
            </p>
            <p>
              Na hodinách gymnastiky sa zameriavame na základy športovej
              gymnastiky. Deti sa postupne učia prvky ako kotúľ vpred, kotúľ
              vzad, stojka, mostík či premet vbok, premet vpred a vzad,
              rovnováha na kladine a rôzne kombinácie týchto prvkov. Pomocou
              rôznych cvičení a pohybových hier spevňujeme celkový korpus tela,
              čo pomáha správnemu držaniu tela. Deti sú rozdelené do skupín
              podľa výkonnosti a veku a trénujú 1× do týždňa (60 minút).
            </p>
            <h3 class="h6 mt-4">Čo si vziať na tréning?</h3>
            <ul>
              <li>Gymnastický dres či iný obtiahnutý úbor</li>
              <li>
                Gymnastické / baletné cvičky s mäkkou podrážkou alebo ponožky
              </li>
              <li>
                Dievčatá prosíme stiahnuť vlasy gumičkou / upnúť do drdola
              </li>
              <li>Fľašu s vodou</li>
              <li>Rodičov nie, tých necháme v šatni 🙂</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a href="#rozvrh" class="btn btn-outline-secondary" data-group="gym"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- TEAM KIDS -->
    <div
      class="modal fade"
      id="modalKids"
      tabindex="-1"
      aria-labelledby="modalKidsLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalKidsLabel">Team Kids</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/TEAM KIDS.jpg') ?>"
              alt="Team Kids"
              loading="lazy"
            />
            <p class="text-muted mb-3">6 – 12 rokov</p>
            <p>
              Súťažný team pre deti od 6 do 12 rokov, rozdelený podľa skúseností
              do niekoľkých skupín.
            </p>
            <p>
              Tanečníci v týchto skupinách sa súťažne venujú štýlom show dance,
              jazz dance a contemporary. Počas tréningov sa učia tanečnej
              technike, rozvíjajú flexibilitu, koordináciu, muzikálnosť aj
              umelecký prejav. Učia sa pracovať v tíme, získavajú väčšiu istotu
              na pódiu a postupne sa posúvajú k náročnejším choreografiám.
              Súčasťou je aj príprava na slovenské a medzinárodné súťaže a
              vystúpenia, kde môžu ukázať svoj talent a radosť z tanca.
            </p>

            <h3 class="h6 mt-4">Kids Monkeys</h3>
            <ul>
              <li>Tréningy: 2× týždenne</li>
            </ul>

            <h3 class="h6 mt-4">Kids Cookies</h3>
            <ul>
              <li>Tréningy: 2× týždenne</li>
            </ul>

            <h3 class="h6 mt-4">Kids Bubbles</h3>
            <ul>
              <li>Tréningy: 3× týždenne</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a
              href="#rozvrh"
              class="btn btn-outline-secondary"
              data-group="teamkids"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- TEAM TEENS -->
    <div
      class="modal fade"
      id="modalTeens"
      tabindex="-1"
      aria-labelledby="modalTeensLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header border-0">
            <h2 class="modal-title h4" id="modalTeensLabel">Team Teens</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Zavrieť"
            ></button>
          </div>
          <div class="modal-body">
            <img
              class="modal-img"
              src="<?= v('images/PONUKA/TEAM TEENS.jpg') ?>"
              alt="Team Teens"
              loading="lazy"
            />
            <p class="text-muted mb-3">od 12 rokov</p>
            <p>
              Súťažný team pre mládež od 12 rokov. Tanečníci v tejto skupine sa
              súťažne venujú štýlom show dance, jazz dance a contemporary.
              Tréningy sú zamerané na zdokonaľovanie tanečných zručností,
              umeleckého prejavu a objavovanie rôznych tanečných štýlov.
              Tanečníci sa sústreďujú na náročnejšie choreografie a prípravu na
              slovenské aj medzinárodné súťaže a vystúpenia.
            </p>
            <ul>
              <li>Tréningy: 3× a viac týždenne</li>
            </ul>
          </div>
          <div class="modal-footer border-0">
            <a
              href="#rozvrh"
              class="btn btn-outline-secondary"
              data-group="teamteens"
              >Rozvrh</a
            >
            <a
              href="https://forms.gle/544bamjWvUtpNfcF8"
              class="btn btn-brand"
              target="_blank"
              rel="noopener"
              >Prihlásiť sa</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- NOVINKY – lightbox s plagátmi -->
    <div
      class="modal fade"
      id="modalNovinky"
      tabindex="-1"
      aria-label="Náhľad plagátu"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content lightbox">
          <button
            type="button"
            class="btn-close btn-close-white lightbox__close"
            data-bs-dismiss="modal"
            aria-label="Zavrieť"
          ></button>
          <div
            id="carouselNovinky"
            class="carousel slide"
            data-bs-interval="false"
            data-bs-ride="false"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  class="lightbox__img"
                  src="<?= v('images/NOVINKY/ZAPIS.jpg') ?>"
                  alt="Zápis na kurzy Mini Dancy a Kids Dancy – september až január 2026/2027"
                  loading="lazy"
                />
              </div>
              <div class="carousel-item">
                <img
                  class="lightbox__img"
                  src="<?= v('images/NOVINKY/GYMNASTIKA.jpg') ?>"
                  alt="Zápis na kurz gymnastiky pre dievčatá a chlapcov od 3 do 12 rokov"
                  loading="lazy"
                />
              </div>
              <div class="carousel-item">
                <img
                  class="lightbox__img"
                  src="<?= v('images/NOVINKY/konkurz_BA.jpg') ?>"
                  alt="Konkurz do súťažných tanečných skupín – 3. 9. ZŠ Pavla Marcelyho a 7. 9. ZŠ Medzilaborecká, Bratislava"
                  loading="lazy"
                />
              </div>
              <div class="carousel-item">
                <img
                  class="lightbox__img"
                  src="<?= v('images/NOVINKY/konkurz_Malinovo.jpg') ?>"
                  alt="Konkurz do tanečného štúdia DANCY – 4. 9. 2026, Studiospot Malinovo"
                  loading="lazy"
                />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselNovinky"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Predchádzajúci plagát</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselNovinky"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Ďalší plagát</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="<?= v('JS/bootstrap.bundle.min.js') ?>" defer></script>
    <script src="<?= v('JS/MYjs.js') ?>" defer></script>
  </body>
</html>
