<?php
$site         = require __DIR__ . '/../data/site.php';
$testimonials = require __DIR__ . '/../data/testimonials.php';

$title = "Client Reviews | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = 'What clients say about working with Maureen ‘Ziji’ Drake, LMHC — individual and couples therapy in Tampa and St. Petersburg, Florida.';
$path  = '/testimonials';

$heroOverlay = true;   // short image hero sits under the header

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';

$individual = array_values(array_filter($testimonials, fn($t) => $t['type'] === 'individual'));
$couplesSkins = ['bg-paper-lighter', 'bg-gold-200', 'bg-ink-200'];   // on citron
$skins        = ['bg-paper-light', 'bg-citron', 'bg-gold-200', 'bg-ink-200'];
$couples    = array_values(array_filter($testimonials, fn($t) => $t['type'] === 'couples'));
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-14 pt-36 md:min-h-[56vh] md:pb-16 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/hero-testimonials-1800.webp">
      <source type="image/webp" srcset="/assets/img/hero-testimonials-1000.webp">
      <img src="/assets/img/hero-testimonials.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[35%_70%]">
    </picture>
    <!-- Flat tint at uniform opacity, no fade. Set at 60% because the office
         photographs are bright interiors: measured against pure white siding,
         anything lighter leaves the copy below AA. Drop it once a hero image
         with a darker lower-left is supplied. -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">In their words</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        What clients say
      </h1>
      <p data-motion="item" class="mt-5 max-w-xl text-lg leading-relaxed text-paper-lighter">
        <?= count($testimonials) ?> reviews from adults who have worked with Ziji, in individual and
        couples therapy. Published as written, with initials in place of names.
      </p>
    </div>
  </section>

  <!-- ═══ INDIVIDUAL ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">
      <div class="flex items-baseline justify-between gap-6">
        <h2 class="font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">Individual therapy</h2>
        <span class="text-sm font-medium text-sand-700"><?= count($individual) ?> reviews</span>
      </div>

      <!-- Two columns of quote cards; long and short reviews sit together
           without the stretched, half-empty rows a fixed grid would give. -->
      <div class="mt-12 gap-6 lg:gap-8 md:columns-2 [column-fill:balance]">
        <?php foreach ($individual as $i => $t): ?>
          <figure class="mb-6 flex break-inside-avoid flex-col rounded-[1.75rem] p-8 shadow-soft lg:mb-8 lg:p-10 <?= $skins[$i % count($skins)] ?>">
            <blockquote class="font-display text-lg italic leading-relaxed text-ink">
              &ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;
            </blockquote>
            <figcaption class="mt-7 flex items-center gap-3 border-t border-ink/15 pt-6">
              <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-ink text-[11px] font-bold text-citron"><?= htmlspecialchars($t['id']) ?></span>
              <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/55">Former client</span>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ COUPLES ═══ -->
  <section class="relative bg-citron px-5 pb-28 pt-16 lg:px-8 lg:pb-32 lg:pt-20">
    <div class="mx-auto max-w-6xl">
      <div class="flex items-baseline justify-between gap-6">
        <h2 class="font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">Couples therapy</h2>
        <span class="text-sm font-medium text-ink/60"><?= count($couples) ?> reviews</span>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        <?php foreach ($couples as $i => $t): ?>
          <figure class="flex flex-col rounded-[1.75rem] p-8 shadow-soft <?= $couplesSkins[$i % count($couplesSkins)] ?>">
            <blockquote class="font-display text-base italic leading-relaxed text-ink">
              &ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;
            </blockquote>
            <figcaption class="mt-auto flex items-center gap-3 border-t border-ink/15 pt-6">
              <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-ink text-[11px] font-bold text-citron"><?= htmlspecialchars($t['id']) ?></span>
              <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/55">Couples client</span>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="pointer-events-none absolute bottom-0 left-0 right-0 z-10 overflow-hidden leading-none">
      <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" aria-hidden="true"
           class="relative block h-10 w-full text-paper sm:h-14 md:h-16 lg:h-20">
        <path d="M0,32 C360,75 720,10 1080,48 C1260,65 1380,40 1440,32 L1440,80 L0,80 Z" fill="currentColor"></path>
      </svg>
    </div>
  </section>

  <!-- ═══ NOTE ═══ -->
  <section class="bg-paper px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-3xl text-center">
      <p class="text-sm leading-relaxed text-sand-700">
        Reviews are published with permission and identified by initials only. They describe individual
        experiences of therapy and are not a promise of any particular outcome.
      </p>
      <a href="<?= $site['phone_href'] ?>"
         class="mt-8 inline-flex rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">
        Book a free 15-min consult
      </a>
    </div>
  </section>

</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
