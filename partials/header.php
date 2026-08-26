<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<header data-header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-ink/20 text-paper-lighter backdrop-blur-md transition-all duration-300">
  <div class="mx-auto grid h-[76px] max-w-[1800px] grid-cols-[1fr_auto_1fr] items-center md:h-[88px]">

    <!-- ── LEFT: menu button, divider, inline nav ── -->
    <div class="flex h-full min-w-0 items-center">
      <button type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav"
              class="grid h-full w-[64px] shrink-0 place-items-center border-r border-white/10 transition hover:bg-white/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-gold md:w-[88px]">
        <span class="sr-only">Open menu</span>
        <span aria-hidden="true" class="flex w-5 flex-col gap-[5px]">
          <span class="h-px w-full bg-current"></span>
          <span class="h-px w-full bg-current"></span>
          <span class="h-px w-3/5 bg-current"></span>
        </span>
      </button>

      <nav aria-label="Primary" class="hidden min-w-0 items-center gap-6 px-6 xl:flex xl:gap-7 xl:px-8">
        <?php foreach (array_slice($site['nav'], 0, 3) as $item): ?>
          <?php if (empty($item['children'])): ?>
            <a href="<?= $item['url'] ?>" class="whitespace-nowrap text-[11px] font-medium uppercase tracking-[0.16em] text-paper-lighter/75 transition hover:text-gold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gold"><?= $item['label'] ?></a>
          <?php else: ?>
            <div class="group relative">
              <a href="<?= $item['url'] ?>" class="flex items-center gap-1.5 whitespace-nowrap text-[11px] font-medium uppercase tracking-[0.16em] text-paper-lighter/75 transition hover:text-gold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gold">
                <?= $item['label'] ?>
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" class="h-3 w-3 transition group-hover:rotate-180"><path d="M5.5 7.5 10 12l4.5-4.5"/></svg>
              </a>
              <div class="invisible absolute left-0 top-full w-64 translate-y-1 pt-4 opacity-0 transition group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                <div class="overflow-hidden rounded-xl border border-white/10 bg-ink-800 p-2 shadow-lift">
                  <?php foreach ($item['children'] as $c): ?>
                    <a href="<?= $c['url'] ?>" class="block rounded-lg px-4 py-2.5 text-[11px] uppercase tracking-[0.14em] text-paper-lighter/75 transition hover:bg-white/5 hover:text-gold"><?= $c['label'] ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>
    </div>

    <!-- ── CENTRE: the logo ── -->
    <a href="/" class="flex h-full items-center justify-center px-6 lg:px-12 xl:px-16" aria-label="<?= htmlspecialchars($site['legal']) ?> — home">
      <picture>
        <source type="image/webp" srcset="/assets/img/logo-header-230.webp 1x, /assets/img/logo-header-460.webp 2x">
        <img data-logo src="/assets/img/logo-header-460.png" width="460" height="107"
             alt="<?= htmlspecialchars($site['legal']) ?>" fetchpriority="high" decoding="async"
             class="h-[38px] w-auto brightness-0 invert transition-all duration-300 md:h-[52px]">
      </picture>
    </a>

    <!-- ── RIGHT: divider + booking CTA ── -->
    <div class="flex h-full items-center justify-end">
      <a href="<?= $site['phone_href'] ?>"
         class="hidden h-full items-center whitespace-nowrap border-l border-white/10 px-6 text-[11px] font-medium uppercase tracking-[0.18em] text-paper-lighter transition hover:bg-gold hover:text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-gold sm:flex md:px-10">
        Book an Appointment
      </a>
      <a href="<?= $site['phone_href'] ?>" aria-label="Call <?= $site['phone'] ?>"
         class="grid h-full w-[64px] place-items-center border-l border-white/10 text-gold transition hover:bg-white/5 sm:hidden">
        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.6a1.5 1.5 0 0 1 1.46 1.14l.5 2a1.5 1.5 0 0 1-.42 1.45l-.9.9a11.5 11.5 0 0 0 5.37 5.37l.9-.9a1.5 1.5 0 0 1 1.45-.42l2 .5A1.5 1.5 0 0 1 18 13.4V15a1.5 1.5 0 0 1-1.5 1.5A14.5 14.5 0 0 1 2 3.5Z"/></svg>
      </a>
    </div>
  </div>

  <!-- ── Slide-down menu panel ── -->
  <div id="mobile-nav" data-nav-panel hidden class="border-t border-white/10 bg-ink-800">
    <nav aria-label="Menu" class="mx-auto max-w-[1800px] px-6 py-6 md:px-[88px]">
      <div class="grid gap-x-12 gap-y-1 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($site['nav'] as $item): ?>
          <div class="py-2">
            <a data-nav-link href="<?= $item['url'] ?>" class="block font-display text-lg font-semibold text-paper-lighter transition hover:text-gold"><?= $item['label'] ?></a>
            <?php if (!empty($item['children'])): ?>
              <div class="mt-1.5 space-y-1">
                <?php foreach ($item['children'] as $c): ?>
                  <a data-nav-link href="<?= $c['url'] ?>" class="block text-[11px] uppercase tracking-[0.14em] text-paper-lighter/60 transition hover:text-gold"><?= $c['label'] ?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
        <div class="py-2">
          <a data-nav-link href="/testimonials" class="block font-display text-lg font-semibold text-paper-lighter transition hover:text-gold">Testimonials</a>
          <div class="mt-1.5 space-y-1">
            <a data-nav-link href="/faq" class="block text-[11px] uppercase tracking-[0.14em] text-paper-lighter/60 transition hover:text-gold">FAQ</a>
            <a data-nav-link href="/contact" class="block text-[11px] uppercase tracking-[0.14em] text-paper-lighter/60 transition hover:text-gold">Contact</a>
          </div>
        </div>
      </div>
      <a data-nav-link href="<?= $site['phone_href'] ?>" class="mt-6 block rounded-full bg-gold px-6 py-3.5 text-center text-sm font-semibold text-ink sm:hidden">Call <?= $site['phone'] ?></a>
    </nav>
  </div>
</header>
