<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<?php
// Pages with a dark full-bleed hero opt into the translucent header by setting
// $heroOverlay = true before including this file. Everywhere else it stays
// solid, or the white nav sits on a light background and cannot be read.
$heroOverlay = $heroOverlay ?? false;
?>
<header data-header <?= $heroOverlay ? 'data-header-overlay' : '' ?>
        class="fixed inset-x-0 top-0 z-50 border-b border-white/10 text-paper-lighter transition-colors duration-300 <?= $heroOverlay ? 'bg-transparent' : 'bg-ink shadow-soft' ?>">
  <div class="mx-auto grid h-[76px] max-w-[1800px] grid-cols-[1fr_auto_1fr] items-center md:h-[88px]">

    <!-- ── LEFT: menu button, divider, inline nav ── -->
    <div class="flex h-full min-w-0 items-center">
      <button type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav"
              class="grid h-full w-[64px] shrink-0 place-items-center border-r border-white/10 transition hover:bg-white/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-gold md:w-[88px]">
        <span class="sr-only" data-nav-label>Open menu</span>
        <span aria-hidden="true" class="nav-burger flex w-5 flex-col gap-[5px]">
          <span class="h-px w-full bg-current"></span>
          <span class="h-px w-full bg-current"></span>
          <span class="h-px w-3/5 bg-current"></span>
        </span>
      </button>

      <nav aria-label="Primary" class="hidden min-w-0 items-center gap-6 px-6 xl:flex xl:gap-7 xl:px-8">
        <?php foreach (array_slice($site['nav'], 0, 4) as $i => $item): ?>
          <?php $hideNarrow = $i === 3 ? 'hidden 2xl:flex' : ''; ?>
          <?php if (empty($item['children'])): ?>
            <a href="<?= $item['url'] ?>" class="<?= $hideNarrow ?> whitespace-nowrap text-[11px] font-medium uppercase tracking-[0.16em] text-paper-lighter/75 transition hover:text-gold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gold"><?= $item['label'] ?></a>
          <?php else: ?>
            <div class="group relative <?= $hideNarrow ?>">
              <?php
                // Services / Locations / Resources have no index page of their own —
                // they are grouping labels. The trigger is a button rather than a dead
                // link, and stays focusable so Tab still opens the panel via
                // group-focus-within.
                $hasUrl  = !empty($item['url']);
                $trigCls = 'flex items-center gap-1.5 whitespace-nowrap text-[11px] font-medium uppercase tracking-[0.16em] text-paper-lighter/75 transition hover:text-gold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gold';
              ?>
              <?php if ($hasUrl): ?>
                <a href="<?= $item['url'] ?>" class="<?= $trigCls ?>">
              <?php else: ?>
                <button type="button" aria-haspopup="true" class="<?= $trigCls ?> cursor-default">
              <?php endif; ?>
                <?= $item['label'] ?>
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" class="h-3 w-3 transition group-hover:rotate-180"><path d="M5.5 7.5 10 12l4.5-4.5"/></svg>
              <?= $hasUrl ? '</a>' : '</button>' ?>
              <!-- pt-4 keeps a hoverable bridge between trigger and panel,
                   so the menu does not close as the pointer travels down -->
              <div class="invisible absolute left-0 top-full z-50 w-[21rem] translate-y-1 pt-4 opacity-0 transition duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                <div class="relative rounded-2xl border border-white/10 bg-ink-800 p-2 shadow-lift">
                  <span aria-hidden="true" class="absolute -top-[7px] left-8 h-3 w-3 rotate-45 rounded-[3px] border-l border-t border-white/10 bg-ink-800"></span>
                  <?php foreach ($item['children'] as $c): ?>
                    <a href="<?= $c['url'] ?>"
                       class="group/item flex items-start gap-3 rounded-xl px-4 py-3 transition hover:bg-white/5 focus-visible:bg-white/5 focus-visible:outline-none">
                      <span class="min-w-0 flex-1">
                        <span class="block text-sm font-semibold text-paper-lighter transition group-hover/item:text-gold"><?= $c['label'] ?></span>
                        <?php if (!empty($c['desc'])): ?>
                          <span class="mt-0.5 block text-xs leading-relaxed text-paper-lighter/55"><?= $c['desc'] ?></span>
                        <?php endif; ?>
                      </span>
                      <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           class="mt-1 h-3.5 w-3.5 shrink-0 text-paper-lighter/30 transition group-hover/item:translate-x-0.5 group-hover/item:text-gold">
                        <path d="M4 10h12M11 5l5 5-5 5"/>
                      </svg>
                    </a>
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
             class="h-[38px] w-auto brightness-0 invert transition-colors duration-300 md:h-[52px]">
      </picture>
    </a>

    <!-- ── RIGHT: divider + booking CTA ── -->
    <div class="flex h-full items-center justify-end">
      <a href="/contact"
         class="hidden h-full items-center whitespace-nowrap border-l border-white/10 px-6 text-[11px] font-medium uppercase tracking-[0.18em] text-paper-lighter transition hover:bg-gold hover:text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-gold sm:flex md:px-10">
        Book an Appointment
      </a>
      <a href="<?= $site['phone_href'] ?>" aria-label="Call <?= $site['phone'] ?>"
         class="grid h-full w-[64px] place-items-center border-l border-white/10 text-gold transition hover:bg-white/5 sm:hidden">
        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.6a1.5 1.5 0 0 1 1.46 1.14l.5 2a1.5 1.5 0 0 1-.42 1.45l-.9.9a11.5 11.5 0 0 0 5.37 5.37l.9-.9a1.5 1.5 0 0 1 1.45-.42l2 .5A1.5 1.5 0 0 1 18 13.4V15a1.5 1.5 0 0 1-1.5 1.5A14.5 14.5 0 0 1 2 3.5Z"/></svg>
      </a>
    </div>
  </div>

  <!-- ── Full-height menu overlay ──────────────────────────────
       Sits below the fixed bar and fills the rest of the viewport at every
       width, so the page can never show through under a short menu. The old
       grid went ragged because rows shared a height; multi-column with
       break-inside-avoid balances the groups instead. -->
  <div id="mobile-nav" data-nav-panel hidden
       class="fixed inset-x-0 bottom-0 top-[76px] z-40 overflow-y-auto overscroll-contain border-t border-white/10 bg-ink md:top-[88px]">
    <div class="mx-auto grid min-h-full w-full max-w-[1800px] content-start gap-y-12 px-6 py-10 md:px-[88px] md:py-14 lg:grid-cols-[minmax(0,1fr)_20rem] lg:items-start lg:gap-x-16 xl:gap-x-24">

      <nav aria-label="Menu">
        <div class="columns-1 gap-x-10 sm:columns-2 xl:columns-3 xl:gap-x-14">
          <?php
            $i = 0;
            $groups = $site['nav'];
            $groups[] = ['label' => 'Testimonials', 'url' => '/testimonials', 'children' => [
              ['label' => 'FAQ', 'url' => '/faq'], ['label' => 'Contact', 'url' => '/contact'],
            ]];
          ?>
          <?php foreach ($groups as $item): ?>
            <div data-nav-item style="--i:<?= $i ?>" class="mb-9 break-inside-avoid">
              <?php if (!empty($item['url'])): ?>
                <a data-nav-link href="<?= $item['url'] ?>"
                   class="group inline-flex items-center gap-2 font-display text-2xl font-semibold tracking-tight text-paper-lighter transition hover:text-gold focus-visible:outline-none focus-visible:text-gold md:text-[28px]">
                  <?= $item['label'] ?>
                  <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       class="h-4 w-4 -translate-x-1 opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100 group-focus-visible:translate-x-0 group-focus-visible:opacity-100">
                    <path d="M4 10h12M11 5l5 5-5 5"/>
                  </svg>
                </a>
              <?php else: ?>
                <span class="block font-display text-2xl font-semibold tracking-tight text-paper-lighter/45 md:text-[28px]"><?= $item['label'] ?></span>
              <?php endif; ?>

              <?php if (!empty($item['children'])): ?>
                <ul class="mt-4 space-y-3 border-l border-white/10 pl-5">
                  <?php foreach ($item['children'] as $c): ?>
                    <li>
                      <a data-nav-link href="<?= $c['url'] ?>"
                         class="group block text-sm font-medium text-paper-lighter/65 transition hover:text-gold focus-visible:outline-none focus-visible:text-gold">
                        <?= $c['label'] ?>
                        <?php if (!empty($c['desc'])): ?>
                          <span class="mt-0.5 block text-xs font-normal leading-relaxed text-paper-lighter/35"><?= $c['desc'] ?></span>
                        <?php endif; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </nav>

      <!-- Practical detail, so the menu answers "how do I reach her?" too -->
      <aside data-nav-item style="--i:<?= $i ?>" class="rounded-2xl bg-ink-800 p-7 ring-1 ring-white/10">
        <h2 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gold">Get in touch</h2>
        <a data-nav-link href="<?= $site['phone_href'] ?>" class="mt-4 block font-display text-2xl font-semibold text-paper-lighter transition hover:text-gold">
          <?= $site['phone'] ?>
        </a>
        <p class="mt-1.5 text-sm leading-relaxed text-paper-lighter/50">Complimentary 15-minute consultation</p>
        <a data-nav-link href="/contact"
           class="mt-6 block rounded-full bg-gold px-6 py-3.5 text-center text-sm font-semibold text-ink transition hover:bg-gold-400">
          Book an appointment
        </a>
        <div class="mt-8 space-y-6 border-t border-white/10 pt-6">
          <?php foreach ($site['offices'] as $o): ?>
            <div>
              <p class="text-sm font-semibold text-paper-lighter"><?= $o['name'] ?></p>
              <p class="mt-1 text-sm leading-relaxed text-paper-lighter/50"><?= $o['city'] ?>, <?= $o['region'] ?></p>
              <p class="mt-1 text-xs text-paper-lighter/35"><?= $o['days'] ?> &middot; <?= $o['hours'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </aside>

    </div>
  </div>
</header>
