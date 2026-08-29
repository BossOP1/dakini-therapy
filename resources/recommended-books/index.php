<?php
$site  = require __DIR__ . '/../../data/site.php';
$books = require __DIR__ . '/../../data/books.php';

$title = "Recommended Books | {$site['legal']}";
$desc  = 'Forty-one books on psychology, consciousness and spirituality recommended by Maureen ‘Ziji’ Drake, LMHC — from Peter Levine and Bessel van der Kolk to Pema Chödrön and Ram Dass.';
$path  = '/resources/recommended-books';

$heroOverlay = true;
$rTitle = 'Recommended Books'; $rEyebrow = 'Resource'; $rImage = 'outcomes';

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$sections = [];
foreach ($books as $b) { $sections[$b['section']][] = $b; }
?>
<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">
  <?php require __DIR__ . '/../../partials/resource-hero.php'; ?>

  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">
      <p class="max-w-2xl text-lg leading-relaxed text-sand-700">
        Books that have shaped how I think about the work &mdash; <?= count($books) ?> titles across psychology
        and contemplative practice. Nothing here is required reading; take what is useful.
      </p>

      <?php
        $fImage   = 'books';
        $fAlt     = 'A quiet library corner: a cushioned window seat between built-in bookshelves, with a lamp, an armchair and a patterned blind drawn part-way down.';
        $fCaption = '';
        require __DIR__ . '/../../partials/resource-figure.php';
      ?>

      <!-- Filter is progressive: with JS off every section stays visible. -->
      <div class="mt-10 flex flex-wrap gap-2" role="group" aria-label="Filter by section">
        <button type="button" data-book-filter="all"
                class="book-pill rounded-full border border-ink bg-ink px-5 py-2 text-xs font-semibold text-citron transition">
          All <?= count($books) ?>
        </button>
        <?php foreach ($sections as $name => $items): ?>
          <button type="button" data-book-filter="<?= htmlspecialchars($name) ?>"
                  class="book-pill rounded-full border border-sand-300 bg-paper-lighter px-5 py-2 text-xs font-semibold text-sand-700 transition hover:border-ink/40 hover:text-ink">
            <?= ucwords(strtolower($name)) ?> <?= count($items) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php foreach ($sections as $name => $items): ?>
        <div data-book-section="<?= htmlspecialchars($name) ?>" class="mt-14">
          <h2 class="font-display text-2xl font-semibold tracking-tight text-ink md:text-3xl">
            <?= ucwords(strtolower($name)) ?>
          </h2>
          <ul class="mt-8 border-t border-sand-200">
            <?php foreach ($items as $b): ?>
              <li class="grid gap-x-8 gap-y-1 border-b border-sand-200 py-5 sm:grid-cols-[1fr_auto] sm:items-baseline">
                <span class="text-base leading-relaxed text-ink"><?= htmlspecialchars($b['title']) ?></span>
                <span class="text-sm font-medium text-sand-700"><?= htmlspecialchars($b['author']) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php require __DIR__ . '/../../partials/resource-more.php'; ?>
</main>
<?php require __DIR__ . '/../../partials/footer.php'; ?>
