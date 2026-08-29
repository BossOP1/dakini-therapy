<?php
$site = require __DIR__ . '/../../data/site.php';

$title = "Working with Anger | {$site['legal']}";
$desc  = 'On anger as one of the six basic universal emotions — what it signals, where it is felt in the body, and how it is worked with in therapy. From Maureen ‘Ziji’ Drake, LMHC.';
$path  = '/resources/working-with-anger';

$heroOverlay = true;
$rTitle = 'Working with Anger'; $rEyebrow = 'Resource'; $rImage = 'locations/hpv3';

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';
?>
<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">
  <?php require __DIR__ . '/../../partials/resource-hero.php'; ?>

  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-3xl">
      <!-- DRAFT — written for this rebuild, not transcribed from the old site.
           The source page carries only "Article and resources to come . . .".
           Framing follows her own Working with Sadness piece (the six basic
           emotions, the felt sense) and stays inside the approach she states
           publicly: evidence-based psychotherapy, mindfulness-informed, somatic
           and attachment-aware. No techniques or claims beyond that.
           Needs Ziji's review and sign-off before this page goes live. -->
      <p class="font-display text-xl leading-relaxed text-ink md:text-2xl">
        Anger is one of the six basic universal emotions, alongside sadness, fear, happiness, disgust, and
        surprise. It is also the one most of us were taught to hide.
      </p>

      <div class="mt-7 space-y-5 text-lg leading-relaxed text-sand-700">
        <p>
          Anger carries information. It tends to arrive when something matters &mdash; a boundary has been
          crossed, a need has gone unmet, something we value or someone we love feels under threat. Before it
          is a problem to be managed, it is a signal worth reading.
        </p>
        <p>
          It rarely travels alone. Underneath anger there is often hurt, fear, shame, or grief &mdash; feelings
          that leave us exposed. Anger frequently arrives first because it is the one that feels strong rather
          than vulnerable. Ask what the anger is protecting, and the answer is usually something tender.
        </p>
        <p>
          Anger also has a felt sense, and the body arrives before language does. Heat in the face or the
          chest. A tightening through the jaw, the shoulders, the hands. Breath that shortens and quickens.
          The nervous system has already responded by the time we have words for what happened.
        </p>
      </div>

      <?php
        $fImage   = 'anger';
        $fAlt     = 'An alchemical engraving: a face with smoke rising from its ears and a flask standing in flames within its open mouth, inscribed Sigillum Hermetis.';
        $fCaption = 'Heat sealed inside the vessel &mdash; in alchemy, the condition under which something is transformed rather than destroyed.';
        require __DIR__ . '/../../partials/resource-figure.php';
      ?>

      <div class="mt-12 space-y-5 text-lg leading-relaxed text-sand-700">
        <p>
          The difficulty is seldom the emotion itself. It is what happens in the seconds that follow. Some of
          us press it down until it leaks out sideways &mdash; as resentment, sarcasm, withdrawal, or as
          something the body ends up carrying. Others let it out at full volume and spend the hours afterwards
          repairing the damage. Both are ways of not listening to it.
        </p>
        <p>
          In therapy we slow that sequence down. Not to talk you out of your anger, and not to rehearse it,
          but to give it enough room that you can hear what it is actually saying: where the pattern was
          learned, what it has been protecting, and which part of it belongs to this moment rather than to
          something much older.
        </p>
        <p>
          From there, anger becomes something you can use &mdash; the clarity to name a limit, to ask for what
          you need, or to step out of a situation that is not working &mdash; rather than something that
          happens to you.
        </p>
      </div>

      <figure class="mt-12 border-l-2 border-citron pl-6">
        <blockquote class="font-display text-2xl italic leading-snug text-ink md:text-3xl">
          Anybody can become angry &mdash; that is easy; but to be angry with the right person, and to the
          right degree, and at the right time, and for the right purpose, and in the right way &mdash; that is
          not within everybody&rsquo;s power and is not easy.
        </blockquote>
        <figcaption class="mt-3 text-sm font-semibold uppercase tracking-[0.16em] text-sand-700">
          Aristotle, <span class="normal-case italic tracking-normal">Nicomachean Ethics</span>
        </figcaption>
      </figure>

      <div class="mt-12 flex flex-wrap gap-3">
        <a href="/services/individual-therapy"
           class="rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">
          Individual therapy
        </a>
        <a href="<?= $site['phone_href'] ?>"
           class="rounded-full border-2 border-ink/15 px-7 py-3.5 text-sm font-semibold text-ink transition hover:border-ink">
          Call <?= $site['phone'] ?>
        </a>
      </div>
    </div>
  </section>

  <?php require __DIR__ . '/../../partials/resource-more.php'; ?>
</main>
<?php require __DIR__ . '/../../partials/footer.php'; ?>
