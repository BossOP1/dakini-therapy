<?php
$site    = require __DIR__ . '/../data/site.php';
$journey = require __DIR__ . '/../data/journey.php';

$title = "The Journey | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = 'Photographs from twenty years of contemplative practice and travel — the Omega Institute, Karme Chöling, Kashmir, England and beyond.';
$path  = '/the-journey';

$heroOverlay = true;   // short image hero sits under the header

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-14 pt-36 md:min-h-[56vh] md:pb-16 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/journey/j02-1200.webp">
      <source type="image/webp" srcset="/assets/img/journey/j02-640.webp">
      <img src="/assets/img/journey/j02.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[50%_35%]">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">Twenty years of practice</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        The Journey
      </h1>
      <p data-motion="item" class="mt-5 max-w-xl text-lg leading-relaxed text-paper-lighter">
        Thirteen years at the Omega Institute, retreat at Karme Chöling, solstice in the New Mexico
        desert, and the travels in between — the experiences that shape how I listen.
      </p>
    </div>
  </section>

  <!-- ═══ GALLERY ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">

      <div class="max-w-2xl">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">In pictures</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Where the work comes from
        </h2>
        <p class="mt-5 text-lg leading-relaxed text-sand-700">
          Contemplative traditions have shaped how I listen and stay present. Therapy is never about
          asking you to adopt my beliefs — but these are the places and people that formed mine.
        </p>
      </div>

      <!-- Masonry keeps every photograph at its true proportions. Each figure
           carries explicit width and height, so the column reserves the right
           space and nothing shifts as images load. -->
      <div class="mt-14 gap-5 [column-fill:balance] sm:columns-2 lg:columns-3 lg:gap-6">
        <?php foreach ($journey as $i => $ph): ?>
          <figure class="mb-5 break-inside-avoid lg:mb-6">
            <button type="button"
                    data-lightbox-open
                    data-full="/assets/img/journey/<?= $ph['slug'] ?>-1200.webp"
                    data-caption="<?= htmlspecialchars($ph['caption']) ?>"
                    class="group block w-full overflow-hidden rounded-[1.25rem] bg-paper focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-gold">
              <picture>
                <source type="image/webp" media="(min-width: 640px)" srcset="/assets/img/journey/<?= $ph['slug'] ?>-1200.webp">
                <source type="image/webp" srcset="/assets/img/journey/<?= $ph['slug'] ?>-640.webp">
                <img src="/assets/img/journey/<?= $ph['slug'] ?>.jpg"
                     width="<?= $ph['w'] ?>" height="<?= $ph['h'] ?>"
                     alt="<?= htmlspecialchars($ph['caption']) ?>"
                     loading="<?= $i < 6 ? 'eager' : 'lazy' ?>" decoding="async"
                     class="w-full transition duration-500 group-hover:scale-[1.03]">
              </picture>
            </button>
            <figcaption class="mt-3 px-1 text-sm leading-relaxed text-sand-700">
              <?= htmlspecialchars($ph['caption']) ?>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ CLOSING ═══ -->
  <section class="relative bg-citron px-5 pb-28 pt-16 lg:px-8 lg:pb-32 lg:pt-20">
    <div class="mx-auto max-w-3xl text-center">
      <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Meet Ziji</p>
      <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">
        Grounded in science, guided by compassion
      </h2>
      <p class="mx-auto mt-5 max-w-xl text-lg leading-relaxed text-ink/80">
        Contemplative study sits alongside a neuroscience degree and a Master's in clinical mental
        health counseling. Both inform the work.
      </p>
      <a href="/about" class="mt-8 inline-flex rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">
        Read Ziji's full story
      </a>
    </div>

    <div class="pointer-events-none absolute bottom-0 left-0 right-0 z-10 overflow-hidden leading-none">
      <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"
           class="relative block h-10 w-full text-paper-lighter sm:h-14 md:h-16 lg:h-20">
        <path d="M0,32 C360,75 720,10 1080,48 C1260,65 1380,40 1440,32 L1440,80 L0,80 Z" fill="currentColor"></path>
      </svg>
    </div>
  </section>

  <!-- Native dialog: Esc and backdrop click close it for free -->
  <dialog data-lightbox class="max-h-[92vh] max-w-[92vw] rounded-[1.25rem] bg-transparent p-0 backdrop:bg-ink/80">
    <figure class="relative">
      <img alt="" class="max-h-[78vh] w-auto rounded-[1.25rem] object-contain">
      <figcaption data-lightbox-caption class="mx-auto mt-4 max-w-2xl text-center text-sm leading-relaxed text-paper-lighter"></figcaption>
      <button type="button" data-lightbox-close aria-label="Close"
              class="absolute right-3 top-3 grid h-10 w-10 place-items-center rounded-full bg-ink text-paper-lighter transition hover:bg-ink-800">
        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M5 5l10 10M15 5L5 15"/></svg>
      </button>
    </figure>
  </dialog>

</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
