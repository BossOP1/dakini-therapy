<?php
$site = require __DIR__ . '/../data/site.php';

$title = "Page not found | {$site['legal']}";
$desc  = 'That page does not exist. Find therapy services, locations, rates and contact details for Dakini Therapy in Tampa and St. Petersburg.';
$path  = '/404';

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';
?>
<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">
  <section class="px-5 pb-20 pt-40 lg:px-8 lg:pb-24 lg:pt-48">
    <div class="mx-auto max-w-2xl text-center" data-motion="reveal">
      <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">404</p>
      <h1 data-motion="item" class="mt-4 font-display text-4xl font-semibold tracking-tight text-ink md:text-5xl">
        This page has moved on
      </h1>
      <p data-motion="item" class="mt-5 text-lg leading-relaxed text-sand-700">
        The link you followed does not lead anywhere. Everything on the site is one step away below,
        or call <a href="<?= $site['phone_href'] ?>" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4"><?= $site['phone'] ?></a>.
      </p>

      <div data-motion="item" class="mt-10 flex flex-wrap justify-center gap-3">
        <a href="/" class="rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">Home</a>
        <a href="/contact" class="rounded-full border-2 border-ink/15 px-7 py-3.5 text-sm font-semibold text-ink transition hover:border-ink">Contact</a>
      </div>

      <nav aria-label="All pages" class="mt-14 border-t border-sand-200 pt-10 text-left">
        <div class="columns-1 gap-x-10 sm:columns-2">
          <?php foreach ($site['nav'] as $item): ?>
            <div class="mb-6 break-inside-avoid">
              <?php if (!empty($item['url'])): ?>
                <a href="<?= $item['url'] ?>" class="font-display text-lg font-semibold text-ink transition hover:text-olive-700"><?= $item['label'] ?></a>
              <?php else: ?>
                <span class="font-display text-lg font-semibold text-sand-700"><?= $item['label'] ?></span>
              <?php endif; ?>
              <?php if (!empty($item['children'])): ?>
                <ul class="mt-2 space-y-1.5 border-l border-sand-200 pl-4">
                  <?php foreach ($item['children'] as $c): ?>
                    <li><a href="<?= $c['url'] ?>" class="text-sm text-sand-700 transition hover:text-ink"><?= $c['label'] ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </nav>
    </div>
  </section>
</main>
<?php require __DIR__ . '/../partials/footer.php'; ?>
