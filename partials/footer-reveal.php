<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<!--
  The bottom-most panel. Pinned to the viewport; the page and the navy footer
  scroll up over it, so it is the last thing uncovered.
-->
<section data-footer-reveal aria-labelledby="reveal-heading"
         class="relative overflow-hidden bg-citron px-5 py-20 text-ink lg:px-8 lg:py-24">
  <div class="mx-auto flex max-w-4xl flex-col items-center text-center" data-motion="reveal">

    <a href="/" aria-label="<?= htmlspecialchars($site['legal']) ?> — home" data-motion="item">
      <span class="inline-block rounded-[1.25rem] bg-ink px-8 py-6 shadow-lift sm:px-10 sm:py-7">
        <img src="/assets/logo/dakini-logo.webp" width="460" height="216" loading="lazy" decoding="async"
             alt="<?= htmlspecialchars($site['legal']) ?>"
             class="w-40 sm:w-48">
      </span>
    </a>

    <h2 id="reveal-heading" data-motion="item" class="mt-8 font-display text-3xl font-semibold tracking-tight text-ink sm:text-4xl lg:text-5xl">
      Ready when you are
    </h2>

    <div data-motion="item" class="mt-9">
      <a href="<?= $site['phone_href'] ?>"
         class="inline-block rounded-full bg-ink px-11 py-4 text-xs font-semibold uppercase tracking-wider text-citron shadow-lift transition hover:bg-ink-800 hover:scale-105 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-ink/30">
        Book Now
      </a>
    </div>

  </div>
</section>
