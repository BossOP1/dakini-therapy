<?php
/**
 * Sliding testimonial rail. Shared by the homepage and the service pages.
 *
 *   $tQuotes  — array of testimonial rows to show (defaults to the first six)
 *   $tHeading — section heading (defaults to "Testimonials")
 *
 * The track holds two identical sets and animates to -50%, so set 2 lands
 * exactly where set 1 began. Spacing lives in each card's right margin rather
 * than a flex gap — with a gap, half the track width falls half a gap short
 * of the set boundary and the loop visibly drifts.
 */
$site         = $site         ?? require __DIR__ . '/../data/site.php';
$testimonials = $testimonials ?? require __DIR__ . '/../data/testimonials.php';
$tQuotes      = $tQuotes      ?? array_slice($testimonials, 0, 6);
$tHeading     = $tHeading     ?? 'Testimonials';

$skins = ['bg-paper-light', 'bg-citron', 'bg-gold-200', 'bg-ink-200', 'bg-olive-200'];
$tilts = ['-rotate-2', 'rotate-1', '-rotate-1', 'rotate-2', '-rotate-1', 'rotate-1'];

$renderSet = function () use ($tQuotes, $skins, $tilts, $testimonials) { ?>
  <?php foreach ($tQuotes as $i => $t): ?>
    <figure class="mr-6 flex w-[19rem] shrink-0 flex-col rounded-sm p-8 shadow-lift transition-transform duration-300 hover:rotate-0 sm:w-[23rem] lg:mr-8 lg:w-[25rem] lg:p-10 <?= $skins[$i % count($skins)] ?> <?= $tilts[$i % count($tilts)] ?>">
      <blockquote class="text-lg leading-snug text-ink lg:text-xl">
        &ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;
      </blockquote>
      <figcaption class="mt-auto pt-10">
        <p class="font-display text-xl font-semibold text-ink lg:text-2xl"><?= $t['id'] ?></p>
        <p class="mt-1 text-sm font-medium text-ink/60">
          <?= $t['type'] === 'couples' ? 'Couples therapy client' : 'Individual therapy client' ?>
        </p>
      </figcaption>
    </figure>
  <?php endforeach; ?>

  <a href="/testimonials" class="mr-6 flex w-[19rem] shrink-0 rotate-1 flex-col justify-end rounded-sm bg-ink p-8 text-paper-lighter shadow-lift transition-transform duration-300 hover:rotate-0 sm:w-[23rem] lg:mr-8 lg:w-[25rem] lg:p-10">
    <p class="font-display text-2xl font-semibold leading-snug lg:text-3xl">Read all <?= count($testimonials) ?> reviews</p>
    <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-citron">
      Testimonials
      <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
    </span>
  </a>
<?php }; ?>

<section class="overflow-hidden bg-paper-lighter py-16 lg:py-20">
  <div class="px-5 lg:px-8">
    <div class="mx-auto max-w-6xl">
      <h2 class="font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl"><?= htmlspecialchars($tHeading) ?></h2>
    </div>
  </div>

  <!-- Pauses on hover; falls back to a plain scrollable row under reduced motion -->
  <div class="group mt-10 overflow-hidden pb-8 pt-4 motion-reduce:overflow-x-auto motion-reduce:[scrollbar-width:none]">
    <div class="flex w-max animate-marquee group-hover:[animation-play-state:paused] motion-reduce:animate-none">
      <?php $renderSet(); ?>
      <div class="flex" aria-hidden="true"><?php $renderSet(); ?></div>
    </div>
  </div>
</section>
