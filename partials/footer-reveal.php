<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<!--
  The bottom-most panel. Pinned to the viewport; the page and the navy footer
  scroll up over it, so it is the last thing uncovered.
-->
<section data-footer-reveal aria-labelledby="reveal-heading"
         class="bg-citron text-ink">
  <div data-footer-inner class="mx-auto flex max-w-4xl flex-col items-center px-6 py-16 text-center lg:py-20">

    <a href="/" aria-label="<?= htmlspecialchars($site['legal']) ?> — home">
      <picture>
        <source type="image/webp" srcset="/assets/logo/dakini-logo.webp">
        <img src="/assets/img/logo-600.png" width="600" height="282" loading="lazy" decoding="async"
             alt="<?= htmlspecialchars($site['legal']) ?>"
             class="w-[15rem] rounded-2xl sm:w-[19rem]">
      </picture>
    </a>

    <h2 id="reveal-heading" class="mt-9 font-display text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl">
      Ready when you are
    </h2>
    <p class="mt-4 max-w-md text-base leading-relaxed text-ink/70">
      A complimentary 15-minute call — no pressure, no commitment.
    </p>

    <div class="mt-9 flex w-full flex-col items-center gap-3 sm:w-auto sm:flex-row">
      <a href="<?= $site['phone_href'] ?>" data-motion="magnetic"
         class="w-full rounded-full bg-ink px-10 py-4 text-sm font-semibold uppercase tracking-[0.16em] text-citron transition hover:bg-ink-800 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-ink/30 sm:w-auto">
        Book Now
      </a>
      <a href="<?= $site['headway'] ?>" rel="noopener"
         class="w-full rounded-full border-2 border-ink/25 px-10 py-4 text-sm font-semibold uppercase tracking-[0.16em] text-ink transition hover:border-ink hover:bg-ink hover:text-citron focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-ink/30 sm:w-auto">
        Check Insurance
      </a>
    </div>

    <a href="<?= $site['phone_href'] ?>" class="mt-8 font-display text-2xl font-semibold text-ink transition hover:text-ink-800 sm:text-3xl">
      <?= $site['phone'] ?>
    </a>
  </div>
</section>
