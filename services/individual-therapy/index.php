<?php
$site         = require __DIR__ . '/../../data/site.php';
$testimonials = require __DIR__ . '/../../data/testimonials.php';

$title = "Individual Therapy in Tampa & St. Petersburg, FL | {$site['legal']}";
$desc  = 'Individual therapy for adults with Maureen ‘Ziji’ Drake, LMHC. Anxiety, grief, trauma, boundaries and life transitions. In-network via Headway. $185 per session.';
$path  = '/services/individual-therapy';

$heroOverlay = true;   // short image hero sits under the header

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$rate = $site['rates'][0];

// Page copy, verbatim from the existing site. Each pair concatenates back to
// her original sentence — the split exists only to emphasize the opening.
$outcomes = [
  ['Learn effective strategies',                 ' to reduce anxiety, manage stress, and regulate overwhelming emotions.'],
  ['Heal from grief, loss, trauma,',             ' or painful life experiences that may continue to impact your present.'],
  ['Build healthier boundaries',                 ' and improve communication in personal, family, and professional relationships.'],
  ['Better understand your attachment style',    ' and how early experiences continue to shape your relationships today.'],
  ['Reduce or eliminate unhealthy coping strategies,', ' addictive behaviors, or self-defeating patterns.'],
  ['Increase mindfulness',                       ' and cultivate a stronger connection between your mind, body, and emotions.'],
  ['Clarify your values, purpose, and direction', ' when navigating important life transitions or difficult decisions.'],
  ['Discover and build upon your natural strengths', ' rather than focusing solely on symptoms or problems.'],
  ['Experience greater confidence',              ' in expressing your needs, making decisions, and living more authentically.'],
];

$faqs = [
  ['Who do you work with?', 'I offer in-person individual therapy for adults at two locations, in St. Petersburg and Tampa. Telehealth is available mainly as a backup for existing clients.'],
  ['Do you take insurance?', 'Yes, for individual therapy. I am in network with ' . implode(', ', $site['insurers']) . ' through the Headway platform. I recommend a complimentary 15-minute consultation first so I can help you book your first appointment.'],
  ['What does a session cost?', '$' . $rate['price'] . ' per session — ' . $rate['note'] . '. If you are using insurance, Headway will give you a co-pay estimate in minutes.'],
  ['What are the advantages of self-pay?', 'Self-pay offers greater flexibility, privacy and control. Treatment is guided by your goals rather than by a diagnosis, session limits or authorization requirements, and your therapy stays between you and me.'],
];

$quotes = array_values(array_filter($testimonials, fn($t) => $t['type'] !== 'couples'));
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-14 pt-36 md:min-h-[56vh] md:pb-16 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/hero-individual-1800.webp">
      <source type="image/webp" srcset="/assets/img/hero-individual-1000.webp">
      <img src="/assets/img/hero-individual.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[60%_center]">
    </picture>
    <!-- Very light flat tint — just enough to hold the copy, photograph stays open -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/25"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.18em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
        <span class="px-2 text-paper-lighter/40">/</span>
        <a href="/services/" class="transition hover:text-gold">Services</a>
      </nav>

      <h1 data-motion="item" class="mt-5 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Individual therapy
      </h1>

      <p data-motion="item" class="mt-5 max-w-xl text-lg leading-relaxed text-paper-lighter">
        A dedicated space to better understand yourself, navigate life's challenges, and create
        meaningful, lasting change.
      </p>

      <div data-motion="item" class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?= $site['phone_href'] ?>"
           class="rounded-full bg-gold px-8 py-4 text-center text-sm font-semibold text-ink transition hover:bg-gold-400">
          Book a free 15-min consult
        </a>
        <a href="<?= $site['headway'] ?>" rel="noopener"
           class="rounded-full border-2 border-white/60 px-8 py-4 text-center text-sm font-semibold text-paper-lighter transition hover:border-gold hover:text-gold">
          Check your insurance
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ AT A GLANCE ═══ -->
  <section class="bg-paper px-5 py-14 lg:px-8 lg:py-16">
    <div class="mx-auto grid max-w-6xl gap-10 rounded-[1.75rem] border border-sand-200 bg-paper-lighter p-8 lg:grid-cols-[1fr_auto_1fr] lg:gap-12 lg:p-10">

      <!-- Insurance -->
      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-sand-700">In network via Headway</p>
        <ul class="mt-4 flex flex-wrap gap-2">
          <?php foreach ($site['insurers'] as $ins): ?>
            <li class="rounded-full border border-sand-300 px-3.5 py-1.5 text-sm font-medium text-ink"><?= $ins ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="<?= $site['headway'] ?>" rel="noopener"
           class="group mt-5 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
          Check your coverage in minutes
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
        </a>
      </div>

      <div aria-hidden="true" class="hidden w-px bg-sand-200 lg:block"></div>

      <!-- Where -->
      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-sand-700">Seen in person at</p>
        <ul class="mt-4 space-y-3.5">
          <?php foreach ($site['offices'] as $o): ?>
            <li class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
              <a href="<?= $o['url'] ?>" class="font-display text-lg font-semibold text-ink transition hover:text-olive-700"><?= $o['area'] ?></a>
              <span class="text-sm text-sand-700"><?= $o['city'] ?>, <?= $o['region'] ?></span>
              <span class="ml-auto text-sm font-medium text-ink/70"><?= $o['days'] ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ═══ OUTCOMES ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-16">

      <!-- Photograph, held alongside the list as it scrolls -->
      <div class="lg:sticky lg:top-32 lg:self-start">
        <div class="overflow-hidden rounded-[2rem]">
          <picture>
            <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/outcomes-1200.webp">
            <source type="image/webp" srcset="/assets/img/outcomes-700.webp">
            <img src="/assets/img/outcomes.jpg" width="1200" height="873" loading="lazy" decoding="async"
                 alt="Books and brass bookends on a shelf in the therapy room"
                 class="h-full w-full object-cover lg:aspect-[4/5]">
          </picture>
        </div>
        <p class="mt-5 max-w-xs text-sm leading-relaxed text-sand-700">
          Evidence-based practice alongside two decades of contemplative study — both inform the work.
        </p>
      </div>

      <div>
        <div data-motion="reveal">
          <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Benefits of individual therapy</p>
          <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
            Through our work together you may
          </h2>
          <p data-motion="item" class="mt-5 text-lg leading-relaxed text-sand-700">
            Individual therapy offers a dedicated space to better understand yourself, navigate life's
            challenges, and create meaningful, lasting change. Together, we will work to strengthen your
            emotional well-being while helping you develop practical tools that support a more fulfilling
            and authentic life.
          </p>
        </div>

        <ul class="mt-12 border-t border-sand-200" data-motion="reveal">
          <?php foreach ($outcomes as $i => [$heading, $body]): ?>
            <li data-motion="item" class="grid grid-cols-[2.25rem_1fr] gap-x-5 border-b border-sand-200 py-6 sm:grid-cols-[3rem_1fr]">
              <span class="pt-0.5 font-display text-lg font-semibold text-gold-700"><?= sprintf('%02d', $i + 1) ?></span>
              <p class="text-base leading-relaxed text-sand-700">
                <span class="font-semibold text-ink"><?= $heading ?></span><?= $body ?>
              </p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- ═══ APPROACH ═══ -->
  <section class="bg-citron px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl items-center gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">

      <div data-motion="reveal">
        <div data-motion="item" class="overflow-hidden rounded-[2rem]">
          <picture>
            <source type="image/webp" srcset="/assets/img/approach-737.webp">
            <img src="/assets/img/approach.jpg" width="737" height="737" loading="lazy" decoding="async"
                 alt="Maureen 'Ziji' Drake at the Omega Institute"
                 class="aspect-square w-full object-cover">
          </picture>
        </div>
      </div>

      <div data-motion="reveal">
        <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">How I work</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">
          Both a science and an art
        </h2>

        <div class="mt-7 space-y-5 text-lg leading-relaxed text-ink/80">
          <p data-motion="item">
            My approach integrates evidence-based psychotherapy with mindfulness-informed practices that
            help you develop greater awareness, emotional resilience and lasting change.
          </p>
          <p data-motion="item">
            I aim for a therapeutic relationship that is warm, collaborative and grounded in genuine
            curiosity. Together we work to understand long-standing patterns, strengthen your inner
            resources, and translate insight into action.
          </p>
          <p data-motion="item">
            Clients often describe me as calm, grounded, resourceful, practical, and gently challenging.
            My role is not to tell you who to become, but to help you reconnect with your own strengths.
          </p>
        </div>

        <p data-motion="item" class="mt-9">
          <a href="/about" class="group inline-flex items-center gap-2 rounded-full bg-ink px-6 py-3 text-sm font-semibold text-citron transition hover:bg-ink-800">
            Read Ziji's full story
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
          </a>
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ TESTIMONIALS ═══ -->
  <?php
  $tQuotes  = array_slice($quotes, 0, 6);   // individual clients only
  $tHeading = 'In their words';
  require __DIR__ . '/../../partials/testimonials.php';
  ?>


  <!-- ═══ FAQ ═══ -->
  <?php
  $faqItems   = $faqs;
  $faqHeading = 'Questions';
  $faqNote    = 'The practical details — who I work with, what it costs, and how insurance fits in.';
  require __DIR__ . '/../../partials/faqs.php';
  ?>


</main>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => 'Individual Therapy',
  'serviceType' => 'Psychotherapy',
  'url'      => $site['base_url'] . $path,
  'provider' => ['@type' => 'MedicalBusiness', 'name' => $site['legal'], 'telephone' => $site['phone']],
  'areaServed' => array_map(fn($o) => ['@type' => 'City', 'name' => $o['city']], array_values($site['offices'])),
  'offers'   => ['@type' => 'Offer', 'price' => $rate['price'], 'priceCurrency' => 'USD'],
], JSON_UNESCAPED_SLASHES) ?></script>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'FAQPage',
  'mainEntity' => array_map(fn($f) => [
    '@type' => 'Question',
    'name'  => $f[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
  ], $faqs),
], JSON_UNESCAPED_SLASHES) ?></script>

<?php require __DIR__ . '/../../partials/footer.php'; ?>
