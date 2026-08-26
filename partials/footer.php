<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<footer class="relative z-10 bg-ink-900 text-paper-lighter/70">
  <!-- solid green band: the first thing the reveal uncovers -->
  <div aria-hidden="true" class="h-3 w-full bg-citron"></div>


  <div class="mx-auto max-w-7xl px-5 py-16 lg:px-8 lg:py-20">

    <div class="grid gap-12 lg:grid-cols-[1.4fr_1fr_1fr_1.2fr]">
      <div>
        <img src="/assets/img/logo-600.png" width="600" height="282" loading="lazy" decoding="async"
             alt="<?= htmlspecialchars($site['legal']) ?> — <?= htmlspecialchars($site['tagline']) ?>"
             class="w-full max-w-[17rem] rounded-2xl">
        <p class="mt-5 max-w-xs text-sm leading-relaxed"><?= htmlspecialchars($site['legal']) ?></p>
        <div class="mt-6 flex flex-wrap gap-x-3 gap-y-1 text-xs font-semibold uppercase tracking-[0.16em]">
          <span class="text-gold-300">Science</span><span class="text-white/25">·</span>
          <span class="text-olive-300">Compassion</span><span class="text-white/25">·</span>
          <span class="text-ink-300">Wisdom</span>
        </div>
      </div>

      <nav aria-label="Footer — Explore">
        <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-paper-lighter/50">Explore</h2>
        <ul class="mt-4 space-y-2.5 text-sm">
          <?php foreach ($site['nav'] as $item): ?>
            <li><a href="<?= $item['url'] ?>" class="transition hover:text-paper-lighter"><?= $item['label'] ?></a></li>
          <?php endforeach; ?>
          <li><a href="/testimonials" class="transition hover:text-paper-lighter">Testimonials</a></li>
          <li><a href="/faq" class="transition hover:text-paper-lighter">FAQ</a></li>
          <li><a href="/contact" class="transition hover:text-paper-lighter">Contact</a></li>
        </ul>
      </nav>

      <div>
        <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-paper-lighter/50">Offices</h2>
        <ul class="mt-4 space-y-5 text-sm">
          <?php foreach ($site['offices'] as $o): ?>
            <li>
              <a href="<?= $o['url'] ?>" class="font-semibold text-paper-lighter transition hover:text-gold-300"><?= $o['area'] ?></a>
              <p class="mt-1 leading-relaxed"><?= $o['street'] ?><br><?= $o['city'] ?>, <?= $o['region'] ?> <?= $o['zip'] ?></p>
              <p class="mt-1 text-paper-lighter/50"><?= $o['days'] ?> · <?= $o['hours'] ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-paper-lighter/50">Get in touch</h2>
        <a href="<?= $site['phone_href'] ?>" class="mt-4 block font-display text-2xl font-semibold text-paper-lighter transition hover:text-gold-300"><?= $site['phone'] ?></a>
        <p class="mt-2 text-sm">Complimentary 15-minute consultation</p>
        <a href="<?= $site['headway'] ?>" rel="noopener" class="mt-5 inline-flex items-center gap-2 rounded-full border border-white/20 px-5 py-2.5 text-sm font-semibold text-paper-lighter transition hover:border-gold-300 hover:text-gold-300">
          Check insurance on Headway
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" class="h-3.5 w-3.5"><path d="M5 15 15 5M7 5h8v8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>

    <aside class="mt-14 rounded-2xl border border-olive-500/30 bg-olive-500/10 p-5 text-sm leading-relaxed text-paper-lighter/85">
      <strong class="font-semibold text-paper-lighter">In crisis?</strong>
      If you are in immediate danger call <strong>911</strong>. For mental-health crisis support, call or text
      <a href="tel:988" class="font-semibold text-olive-300 underline underline-offset-4">988</a> — the Suicide &amp; Crisis Lifeline, available 24/7.
      This website is not monitored and is not a substitute for emergency care.
    </aside>

    <div class="mt-10 flex flex-col gap-4 border-t border-white/10 pt-8 text-xs sm:flex-row sm:items-center sm:justify-between">
      <p>
        © <?= date('Y') ?> <?= htmlspecialchars($site['legal']) ?> ·
        <?= htmlspecialchars($site['clinician']) ?>, <?= $site['credential'] ?>
        <?= $site['licence'] ? ' · FL Licence #' . htmlspecialchars($site['licence']) : '' ?>
      </p>
      <nav aria-label="Legal" class="flex flex-wrap gap-x-5 gap-y-2">
        <a href="/legal/privacy" class="transition hover:text-paper-lighter">Privacy</a>
        <a href="/legal/accessibility" class="transition hover:text-paper-lighter">Accessibility</a>
        <a href="/legal/good-faith-estimate" class="transition hover:text-paper-lighter">Good Faith Estimate</a>
      </nav>
    </div>
  </div>
</footer>

<?php require __DIR__ . '/footer-reveal.php'; ?>
<?php require __DIR__ . '/sticky-cta.php'; ?>
<script type="module" src="/assets/js/dist/site.js"></script>
</body>
</html>
