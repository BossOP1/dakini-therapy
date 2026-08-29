<?php
/**
 * FAQ accordions. Shared, so every page asks questions the same way.
 *
 *   $faqItems   — array of [question, answer] pairs
 *   $faqHeading — section heading (defaults to "Questions")
 *   $faqNote    — optional supporting line under the heading
 *
 * Built on native <details>/<summary>: keyboard-operable, findable by
 * in-page search, and fully usable with JavaScript off.
 */
$site       = $site       ?? require __DIR__ . '/../data/site.php';
$faqItems   = $faqItems   ?? [];
$faqHeading = $faqHeading ?? 'Questions';
$faqNote    = $faqNote    ?? null;

?>
<section class="bg-paper px-5 py-16 lg:px-8 lg:py-20">
  <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <h2 class="font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl"><?= htmlspecialchars($faqHeading) ?></h2>
      <?php if ($faqNote): ?>
        <p class="mt-5 max-w-sm text-lg leading-relaxed text-sand-700"><?= $faqNote ?></p>
      <?php endif; ?>
      <a href="<?= $site['phone_href'] ?>"
         class="mt-8 inline-flex rounded-full bg-ink px-6 py-3 text-sm font-semibold text-citron transition hover:bg-ink-800">
        Still unsure? Call <?= $site['phone'] ?>
      </a>
    </div>

    <div class="space-y-4">
      <?php foreach ($faqItems as $i => [$q, $a]): ?>
        <details class="group rounded-[1.75rem] border border-sand-200 bg-paper-lighter transition-colors duration-200 hover:border-sand-300 open:border-sand-300" <?= $i === 0 ? 'open' : '' ?>>
          <summary class="flex cursor-pointer list-none items-start justify-between gap-6 p-7 font-display text-xl font-semibold leading-snug text-ink marker:content-none lg:p-8 lg:text-2xl">
            <?= $q ?>
            <span aria-hidden="true" class="mt-1 grid h-7 w-7 shrink-0 place-items-center rounded-full bg-ink text-citron transition-transform duration-300 group-open:rotate-45">
              <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" class="h-3.5 w-3.5"><path d="M10 4v12M4 10h12"/></svg>
            </span>
          </summary>
          <p class="px-7 pb-7 text-base leading-relaxed text-ink/75 lg:px-8 lg:pb-8 lg:text-lg"><?= $a ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
