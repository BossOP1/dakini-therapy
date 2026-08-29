<?php
/** Shared hero for the resource pages. $rTitle, $rEyebrow, $rImage required. */
$site = $site ?? require __DIR__ . '/../data/site.php';
?>
<section class="relative isolate flex min-h-[38vh] items-end overflow-hidden px-5 pb-14 pt-36 md:min-h-[44vh] md:pb-16 lg:px-8">
  <picture>
    <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/<?= $rImage ?>-1200.webp">
    <source type="image/webp" srcset="/assets/img/<?= $rImage ?>-700.webp">
    <img src="/assets/img/<?= $rImage ?>.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
         class="absolute inset-0 -z-20 h-full w-full object-cover object-center">
  </picture>
  <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

  <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
    <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
      <a href="/" class="transition hover:text-gold">Home</a>
      <span class="px-2 text-paper-lighter/40">/</span>
      <span class="text-paper-lighter/70">Resources</span>
    </nav>
    <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold"><?= htmlspecialchars($rEyebrow) ?></p>
    <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
      <?= htmlspecialchars($rTitle) ?>
    </h1>
  </div>
</section>
