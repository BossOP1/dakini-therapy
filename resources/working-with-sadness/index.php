<?php
$site = require __DIR__ . '/../../data/site.php';

$title = "Working with Sadness | {$site['legal']}";
$desc  = 'On sadness as one of the six basic universal emotions — what it does, where we feel it, and what it asks of us. From Maureen ‘Ziji’ Drake, LMHC.';
$path  = '/resources/working-with-sadness';

$heroOverlay = true;
$rTitle = 'Working with Sadness'; $rEyebrow = 'Resource'; $rImage = 'locations/stp3';

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';
?>
<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">
  <?php require __DIR__ . '/../../partials/resource-hero.php'; ?>

  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-3xl">
      <!-- Her text, verbatim, including "Sadness serve us" as published. -->
      <p class="font-display text-xl leading-relaxed text-ink md:text-2xl">
        Psychologists include sadness as one of the six basic universal emotions, including fear, happiness,
        disgust, surprise, and anger.
      </p>
      <div class="mt-7 space-y-5 text-lg leading-relaxed text-sand-700">
        <p>
          Neuroscientists have correlated sadness with particular brain regions and reduced cortical
          activation. Poets write about sadness. Painters capture it. Even our pets seem sad sometimes.
        </p>
        <p>
          Sadness has a particular felt sense. Maybe you feel it your chest, or belly, or mouth? We notice and
          sometimes respond when other people are sad. Sometimes we share in their sadness, humans can
          empathize.
        </p>
        <p>
          Philosophers and great spiritual traditions teach us that there is no happiness or joy without the
          existence of sadness. Sadness serve us when we slow down and listen to what is being said.
        </p>
      </div>

      <?php
        $fImage   = 'sadness';
        $fAlt     = 'A painted landscape at dawn: a low sun with a human face rises over water and marshland, its rays reaching across a sky of blue and rose.';
        $fCaption = 'The image she keeps on this page &mdash; sadness and first light in the same frame.';
        require __DIR__ . '/../../partials/resource-figure.php';
      ?>

      <figure class="mt-12 border-l-2 border-citron pl-6">
        <blockquote class="font-display text-2xl italic leading-snug text-ink md:text-3xl">
          Sadness is but a wall between two gardens.
        </blockquote>
        <figcaption class="mt-3 text-sm font-semibold uppercase tracking-[0.16em] text-sand-700">Khalil Gibran</figcaption>
      </figure>
    </div>
  </section>

  <?php require __DIR__ . '/../../partials/resource-more.php'; ?>
</main>
<?php require __DIR__ . '/../../partials/footer.php'; ?>
