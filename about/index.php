<?php
$site    = require __DIR__ . '/../data/site.php';
$journey = require __DIR__ . '/../data/journey.php';

$title = "Meet Ziji | {$site['clinician']}, {$site['credential']} — {$site['legal']}";
$desc  = 'Maureen ‘Ziji’ Drake, LMHC — Neuroscience at Smith College, thirteen years at the Omega Institute, and twenty years of contemplative practice. Therapy in Tampa and St. Petersburg.';
$path  = '/about';

$heroOverlay = true;

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';

// Verbatim from dakini-therapy.com. Her words, unedited.
$background = [
  'My path to becoming a therapist has been shaped by both science and contemplative practice. I earned a Bachelor of Arts in Neuroscience from Smith College before completing a Master\'s degree in Clinical Mental Health Counseling. Together, these experiences continue to inform how I understand the intricate relationship between the brain, emotions, relationships, and the human capacity for change.',
  'Before opening my private practice, I spent thirteen years at the Omega Institute in Rhinebeck, New York, immersed in an environment dedicated to psychology, medicine, mindfulness, creativity, and human potential. Working alongside internationally recognized psychologists, physicians, health practitioners, and spiritual teachers broadened my understanding of healing and reinforced my belief that lasting transformation comes from caring for the whole person&mdash;not simply reducing symptoms.',
  'For more than twenty years, meditation, yoga, and contemplative study have been an important part of my own life. I practiced with the Shambhala Meditation community in New York City, completed traditional Buddhist training and retreat at Karme Choling in Vermont, and studied Kundalini Yoga while helping organize Summer Solstice gatherings in New Mexico. These experiences have profoundly shaped how I listen, remain present, and accompany people through periods of uncertainty, loss, growth, and transition.',
];

$approach = [
  'My approach integrates evidence-based psychotherapy with mindfulness-informed practices that help clients develop greater awareness, emotional resilience, and lasting change. Depending on your needs and preferences, our work may explore the connections between thoughts, emotions, relationships, the nervous system, and&mdash;when meaningful to you&mdash;questions of purpose, identity, and personal growth.',
  'I strive to create a therapeutic relationship that is warm, collaborative, and grounded in genuine curiosity. Together, we work to understand long-standing patterns, strengthen your inner resources, and develop practical tools that support meaningful change in everyday life.',
  'Clients often describe me as calm, grounded, resourceful, practical, and gently challenging. I believe growth happens when compassion is balanced with honesty, and when insight is translated into action. My role is not to tell you who to become, but to help you reconnect with your own strengths, deepen self-understanding, and move toward a life that feels more authentic, connected, and fulfilling.',
];

$credentials = [
  ['Smith College',            'B.A. Neuroscience'],
  ['Clinical Mental Health',   'Master&rsquo;s degree in Counseling'],
  ['Omega Institute',          'Thirteen years, Rhinebeck NY'],
  ['Shambhala, New York City', 'Meditation community'],
  ['Karme Choling, Vermont',   'Buddhist training and retreat'],
  ['Guru Ram Das Puri',        'Kundalini Yoga, Summer Solstice'],
];

$peek = array_slice($journey, 0, 4);
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-14 pt-36 md:min-h-[56vh] md:pb-16 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/journey/j02-1200.webp">
      <source type="image/webp" srcset="/assets/img/journey/j02-640.webp">
      <img src="/assets/img/journey/j02.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[50%_40%]">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/55"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">
        Licensed psychotherapist
      </p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Meet Ziji
      </h1>
    </div>
  </section>

  <!-- ═══ OPENING ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">
      <blockquote class="mx-auto max-w-4xl text-center">
        <p class="font-display text-2xl font-semibold leading-snug tracking-tight text-ink sm:text-3xl lg:text-4xl">
          &ldquo;I believe that healing begins in relationship&mdash;with ourselves, with others, and with
          the deeper wisdom that often emerges when we feel truly seen and understood.&rdquo;
        </p>
      </blockquote>
    </div>
  </section>

  <!-- ═══ BACKGROUND ═══ -->
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[1.2fr_0.8fr] lg:gap-16">

      <div data-motion="reveal">
        <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Background</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Shaped by science and contemplative practice
        </h2>
        <div class="mt-7 space-y-5 text-lg leading-relaxed text-sand-700">
          <?php foreach ($background as $p): ?>
            <p data-motion="item"><?= $p ?></p>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="lg:sticky lg:top-32 lg:self-start">
        <div class="overflow-hidden rounded-[1.75rem]">
          <picture>
            <source type="image/webp" srcset="/assets/img/approach-737.webp">
            <img src="/assets/img/approach.jpg" width="737" height="737" loading="lazy" decoding="async"
                 alt="Maureen &lsquo;Ziji&rsquo; Drake at the Omega Institute"
                 class="aspect-square w-full object-cover">
          </picture>
        </div>
        <p class="mt-5 text-sm leading-relaxed text-sand-700">
          At the Omega Institute in Rhinebeck, New York.
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ CREDENTIALS ═══ -->
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-14 sm:px-10 lg:px-14 lg:py-16">
      <div class="mx-auto max-w-6xl">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Training and practice</p>
        <h2 class="mt-4 max-w-2xl font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">
          Where the work was learned
        </h2>

        <dl class="mt-12 grid gap-x-10 gap-y-px overflow-hidden sm:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($credentials as $i => [$place, $what]): ?>
            <div class="border-t border-ink/15 py-5">
              <dt class="font-display text-lg font-semibold text-ink"><?= $place ?></dt>
              <dd class="mt-1 text-sm text-ink/70"><?= $what ?></dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </div>
    </div>
  </section>

  <!-- ═══ APPROACH ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
      <div class="lg:sticky lg:top-32 lg:self-start">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">My approach</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Both a science and an art
        </h2>
        <p class="mt-5 max-w-sm text-lg leading-relaxed text-sand-700">
          I view therapy as both a science and an art.
        </p>
      </div>

      <div data-motion="reveal" class="space-y-5 text-lg leading-relaxed text-sand-700">
        <?php foreach ($approach as $p): ?>
          <p data-motion="item"><?= $p ?></p>
        <?php endforeach; ?>
        <p data-motion="item" class="border-l-2 border-citron pl-5 text-ink">
          While contemplative traditions have deeply influenced my perspective, therapy is never about
          asking clients to adopt my beliefs. Instead, I honor each person's unique values, worldview,
          and life experience. Whether your foundation is psychological, spiritual, religious, secular,
          or somewhere in between, our work together will always be centered on what is meaningful to you.
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ JOURNEY TEASER ═══ -->
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto max-w-6xl">
      <div class="flex flex-wrap items-end justify-between gap-6">
        <div class="max-w-xl">
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">In pictures</p>
          <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">The Journey</h2>
        </div>
        <a href="/the-journey" class="group inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
          See all photographs
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
        </a>
      </div>

      <div class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-5">
        <?php foreach ($peek as $ph): ?>
          <a href="/the-journey" class="group overflow-hidden rounded-[1.25rem] bg-paper">
            <picture>
              <source type="image/webp" srcset="/assets/img/journey/<?= $ph['slug'] ?>-640.webp">
              <img src="/assets/img/journey/<?= $ph['slug'] ?>.jpg" loading="lazy" decoding="async"
                   alt="<?= htmlspecialchars($ph['caption']) ?>"
                   class="aspect-square w-full object-cover transition duration-500 group-hover:scale-[1.04]">
            </picture>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ OFFICES ═══ -->
  <section class="bg-paper px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Where we meet</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Two calm, private offices
        </h2>
        <p class="mt-5 text-lg leading-relaxed text-sand-700">
          Experience the difference that in-person therapy can make in a calm, thoughtfully designed
          environment. I welcome adult clients into two beautiful, private offices located in
          Tampa's Hyde Park Village and St. Petersburg's Crescent Heights, where comfort,
          confidentiality, and healing come together.
        </p>
      </div>

      <div class="mt-12 grid gap-5 md:grid-cols-2 lg:gap-6">
        <?php foreach ($site['offices'] as $o): ?>
          <a href="<?= $o['url'] ?>" class="group overflow-hidden rounded-[1.75rem] border border-sand-200 bg-paper-lighter transition hover:-translate-y-1 hover:shadow-lift">
            <div class="relative aspect-[16/9] overflow-hidden">
              <picture>
                <source type="image/webp" media="(min-width: 768px)" srcset="/assets/img/<?= $o['photo'] ?>-1200.webp">
                <source type="image/webp" srcset="/assets/img/<?= $o['photo'] ?>-700.webp">
                <img src="/assets/img/<?= $o['photo'] ?>.jpg" alt="" aria-hidden="true" loading="lazy" decoding="async"
                     class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
              </picture>
            </div>
            <div class="p-7">
              <h3 class="font-display text-xl font-semibold text-ink"><?= $o['area'] ?></h3>
              <p class="mt-1 text-sm text-sand-700"><?= $o['city'] ?>, <?= $o['region'] ?> &middot; <?= $o['days'] ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'Person',
  'name'     => $site['clinician'],
  'honorificSuffix' => $site['credential'],
  'jobTitle' => 'Licensed Mental Health Counselor',
  'url'      => $site['base_url'] . $path,
  'telephone'=> $site['phone'],
  'alumniOf' => [
    ['@type' => 'CollegeOrUniversity', 'name' => 'Smith College'],
    ['@type' => 'Organization', 'name' => 'Omega Institute'],
  ],
  'worksFor' => ['@type' => 'MedicalBusiness', 'name' => $site['legal']],
], JSON_UNESCAPED_SLASHES) ?></script>

<?php require __DIR__ . '/../partials/footer.php'; ?>
