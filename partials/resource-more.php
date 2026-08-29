<?php
/** "More resources" strip, shown at the foot of each resource page. */
$site = $site ?? require __DIR__ . '/../data/site.php';
$all = [
  ['Working with Anger',   '/resources/working-with-anger',   'What sits underneath it, and what it protects'],
  ['Working with Sadness', '/resources/working-with-sadness', 'One of the six basic universal emotions'],
  ['Recommended Books',    '/resources/recommended-books',    'Forty-one titles on psychology and spirituality'],
  ['The Journey',          '/the-journey',                     'Twenty years of practice, in photographs'],
];
$others = array_values(array_filter($all, fn($r) => $r[1] !== ($path ?? '')));
?>
<section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
  <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-12 sm:px-10 lg:px-14 lg:py-14">
    <div class="mx-auto max-w-6xl">
      <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">More resources</p>
      <div class="mt-8 grid gap-4 md:grid-cols-3">
        <?php foreach ($others as [$label, $url, $blurb]): ?>
          <a href="<?= $url ?>" class="group flex flex-col rounded-[1.25rem] bg-paper-lighter p-6 transition hover:-translate-y-1 hover:shadow-lift">
            <span class="font-display text-lg font-semibold text-ink"><?= $label ?></span>
            <span class="mt-2 text-sm leading-relaxed text-sand-700"><?= $blurb ?></span>
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition group-hover:gap-3">
              Read
              <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
