<?php
/**
 * Shared layout for a location page. The two offices differ only in content,
 * so they pass it in rather than duplicating the markup.
 *
 *   $office  — one entry from $site['offices']
 *   $shots   — image slugs in assets/img/locations, first one is the hero
 *   $intro   — optional lead paragraph
 */
$site   = $site   ?? require __DIR__ . '/../data/site.php';
$hero   = $shots[0];
$rest   = array_slice($shots, 1);
$other  = null;
foreach ($site['offices'] as $o) { if ($o['url'] !== $office['url']) $other = $o; }
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-28 pt-36 md:min-h-[56vh] md:pb-32 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/locations/<?= $hero ?>-1200.webp">
      <source type="image/webp" srcset="/assets/img/locations/<?= $hero ?>-700.webp">
      <img src="/assets/img/locations/<?= $hero ?>.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-center">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/55"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
        <span class="px-2 text-paper-lighter/40">/</span>
        <span class="text-paper-lighter/70">Locations</span>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">
        <?= $office['city'] ?>, <?= $office['region'] ?>
      </p>
      <h1 data-motion="item" class="mt-4 font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        <?= $office['area'] ?> office
      </h1>
    </div>
  </section>

  <!-- ═══ DETAILS ═══ -->
  <section class="relative z-10 -mt-14 bg-transparent px-5 pb-16 lg:-mt-16 lg:px-8 lg:pb-20">
    <div class="mx-auto grid max-w-6xl gap-10 rounded-[1.75rem] border border-sand-200 bg-paper-lighter p-8 shadow-lift lg:grid-cols-[1fr_auto_1fr] lg:gap-12 lg:p-10">

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Office location</p>
        <address class="mt-4 not-italic text-lg leading-relaxed text-ink">
          <?= $office['street'] ?><br><?= $office['city'] ?>, <?= $office['region'] ?> <?= $office['zip'] ?>
        </address>
        <a href="<?= $office['map'] ?>" rel="noopener"
           class="group mt-4 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
          Get directions
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
        </a>
      </div>

      <div aria-hidden="true" class="hidden w-px bg-sand-200 lg:block"></div>

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Schedule</p>
        <p class="mt-4 font-display text-lg font-semibold text-ink"><?= $office['days'] ?></p>
        <p class="mt-1 text-sm text-sand-700"><?= $office['hours'] ?></p>
        <a href="<?= $site['phone_href'] ?>"
           class="mt-5 inline-flex rounded-full bg-ink px-6 py-3 text-sm font-semibold text-citron transition hover:bg-ink-800">
          Call for a free 15-min consult
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ PARKING ═══ -->
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl border-l-2 border-citron pl-6">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Parking</p>
        <p class="mt-3 text-lg leading-relaxed text-ink"><?= $office['parking'] ?></p>
      </div>
    </div>
  </section>

  <!-- ═══ GALLERY ═══ -->
  <?php if ($rest): ?>
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto max-w-6xl">
      <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">The room</p>
      <h2 class="mt-4 max-w-2xl font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
        A calm, thoughtfully designed space
      </h2>

      <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-5">
        <?php foreach ($rest as $slug): ?>
          <figure class="overflow-hidden rounded-[1.25rem] bg-paper">
            <picture>
              <source type="image/webp" media="(min-width: 768px)" srcset="/assets/img/locations/<?= $slug ?>-1200.webp">
              <source type="image/webp" srcset="/assets/img/locations/<?= $slug ?>-700.webp">
              <img src="/assets/img/locations/<?= $slug ?>.jpg" loading="lazy" decoding="async"
                   alt="The <?= htmlspecialchars($office['area']) ?> office"
                   class="aspect-[4/3] w-full object-cover transition duration-500 hover:scale-[1.03]">
            </picture>
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ THE OTHER OFFICE ═══ -->
  <?php if ($other): ?>
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-12 sm:px-10 lg:px-14 lg:py-14">
      <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-6">
        <div>
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Also seeing clients in</p>
          <p class="mt-3 font-display text-2xl font-semibold text-ink md:text-3xl"><?= $other['area'] ?></p>
          <p class="mt-1 text-sm text-ink/70"><?= $other['city'] ?>, <?= $other['region'] ?> &middot; <?= $other['days'] ?></p>
        </div>
        <a href="<?= $other['url'] ?>" class="group inline-flex items-center gap-2 rounded-full bg-ink px-6 py-3 text-sm font-semibold text-citron transition hover:bg-ink-800">
          Visit that office
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
        </a>
      </div>
    </div>
  </section>
  <?php endif; ?>

</main>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => ['LocalBusiness', 'MedicalBusiness'],
  'name'     => $site['legal'] . ' — ' . $office['area'],
  'url'      => $site['base_url'] . $office['url'],
  'telephone'=> $site['phone'],
  'address'  => [
    '@type' => 'PostalAddress',
    'streetAddress'   => $office['street'],
    'addressLocality' => $office['city'],
    'addressRegion'   => $office['region'],
    'postalCode'      => $office['zip'],
    'addressCountry'  => 'US',
  ],
  'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $office['geo']['lat'], 'longitude' => $office['geo']['lng']],
  'parentOrganization' => ['@type' => 'MedicalBusiness', 'name' => $site['legal']],
], JSON_UNESCAPED_SLASHES) ?></script>
