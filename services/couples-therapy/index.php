<?php
$site         = require __DIR__ . '/../../data/site.php';
$testimonials = require __DIR__ . '/../../data/testimonials.php';

$title = "Couples Therapy in Tampa & St. Petersburg, FL | {$site['legal']}";
$desc  = 'Couples therapy with Maureen ‘Ziji’ Drake, LMHC. Communication, conflict, attachment and intimacy — plus 2-hour Couples Intensives in Hyde Park Village. Self-pay only.';
$path  = '/services/couples-therapy';

$heroOverlay = true;   // short image hero sits under the header

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$session   = $site['rates'][1];   // Couples session
$intensive = $site['rates'][2];   // Couples 2HR Intensive
$hydePark  = $site['offices']['tampa'];

// Verbatim from the existing site. Each pair concatenates back to her original
// sentence — the split exists only to emphasise the opening.
$outcomes = [
  ['Improve communication',                       ' with greater honesty, clarity, and compassion.'],
  ['Resolve conflict more effectively',           ' and repair more quickly after disagreements.'],
  ['Build on the strengths already present in your relationship', ' to deepen trust, resilience, and commitment.'],
  ['Recognize and change recurring patterns',     ' that weaken connection and emotional intimacy.'],
  ["Understand how each partner's attachment style", ' shapes communication, conflict, and closeness.'],
  ['Safely explore concerns related to sexuality and intimacy', ' to strengthen both emotional and physical connection.'],
  ['Navigate important life decisions',           '—including marriage, parenting, and other major transitions—with greater confidence.'],
  ['Receive compassionate guidance',              ' if you decide to separate or pursue a respectful, conscious uncoupling.'],
  ['Develop greater self-awareness, emotional regulation, and presence', '—skills that strengthen not only your relationship, but your individual well-being.'],
];

$types = [
  ['Relationship counseling', 'For partners at any stage who want to communicate better, repair more quickly, and understand the patterns they keep returning to.', 'type-relationship'],
  ['Marriage counseling',     'For married couples working through conflict, disconnection or a breach of trust — or wanting to deepen a partnership that is already strong.', 'type-marriage'],
  ['Premarital counseling',   'For couples preparing to marry: expectations, money, family, parenting and the conversations worth having before the wedding.', 'type-premarital'],
];

$faqs = [
  ['Do you take insurance for couples therapy?', 'No. Couples therapy is self-pay only. Insurance is accepted for individual therapy through Headway, but not for couples work.'],
  ['What does couples therapy cost?', '$' . $session['price'] . ' per session — ' . $session['note'] . '. A 2-hour Couples Intensive is $' . $intensive['price'] . '.'],
  ['What is a 2HR Couples Intensive?', 'A single two-hour session, offered exclusively at the ' . $hydePark['area'] . ' office in ' . $hydePark['city'] . '. It gives a couple room to work through something substantial without stopping at the fifty-minute mark.'],
  ['Can I see you for individual therapy afterwards?', 'Unfortunately not. I work with many couples, and it is common for one or both partners to ask for individual therapy afterwards. I am happy to provide referrals during or after our work together. Some couples return later to refresh what they learned.'],
];

$quotes = array_values(array_filter($testimonials, fn($t) => $t['type'] === 'couples'));
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-28 pt-36 md:min-h-[56vh] md:pb-32 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/hero-couples-1800.webp">
      <source type="image/webp" srcset="/assets/img/hero-couples-1000.webp">
      <img src="/assets/img/hero-couples.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[45%_60%]">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/55"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
        <span class="px-2 text-paper-lighter/40">/</span>
        <a href="/services/" class="transition hover:text-gold">Services</a>
      </nav>
      <h1 data-motion="item" class="mt-5 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Couples therapy
      </h1>
      <p data-motion="item" class="mt-5 max-w-xl text-lg leading-relaxed text-paper-lighter">
        A supportive, nonjudgmental space to understand one another, strengthen communication, and
        build practical tools for navigating life together.
      </p>
      <div data-motion="item" class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="<?= $site['phone_href'] ?>"
           class="rounded-full bg-gold px-8 py-4 text-center text-sm font-semibold text-ink transition hover:bg-gold-400">
          Book a free 15-min consult
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ AT A GLANCE ═══ -->
  <section class="relative z-10 -mt-14 bg-transparent px-5 pb-16 lg:-mt-16 lg:px-8 lg:pb-20">
    <div class="mx-auto grid max-w-6xl gap-10 rounded-[1.75rem] border border-sand-200 bg-paper-lighter p-8 shadow-lift lg:grid-cols-[1fr_auto_1fr] lg:gap-12 lg:p-10">

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Sessions</p>
        <dl class="mt-4 space-y-3 text-sm">
          <div class="flex items-baseline justify-between gap-4">
            <dt class="font-display text-lg font-semibold text-ink"><?= $session['label'] ?></dt>
            <dd class="font-display text-lg font-semibold text-ink">$<?= $session['price'] ?></dd>
          </div>
          <div class="flex items-baseline justify-between gap-4">
            <dt class="font-display text-lg font-semibold text-ink"><?= $intensive['label'] ?></dt>
            <dd class="font-display text-lg font-semibold text-ink">$<?= $intensive['price'] ?></dd>
          </div>
        </dl>
        <p class="mt-4 rounded-2xl border-l-2 border-citron bg-paper py-3 pl-4 pr-3 text-sm font-semibold text-ink">
          Couples therapy is self-pay only
        </p>
      </div>

      <div aria-hidden="true" class="hidden w-px bg-sand-200 lg:block"></div>

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">2HR Intensives</p>
        <p class="mt-4 font-display text-lg font-semibold text-ink">Exclusively in <?= $hydePark['area'] ?></p>
        <address class="mt-2 not-italic text-sm leading-relaxed text-sand-700">
          <?= $hydePark['street'] ?><br><?= $hydePark['city'] ?>, <?= $hydePark['region'] ?> <?= $hydePark['zip'] ?>
          <span class="mt-1 block"><?= $hydePark['days'] ?> · <?= $hydePark['hours'] ?></span>
        </address>
        <a href="<?= $hydePark['url'] ?>" class="group mt-4 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
          Office details
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ BENEFITS ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">

      <div class="lg:sticky lg:top-32 lg:self-start">
        <div class="overflow-hidden rounded-[1.75rem]">
          <picture>
            <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/office-st-pete-1200.webp">
            <source type="image/webp" srcset="/assets/img/office-st-pete-700.webp">
            <img src="/assets/img/office-st-pete.jpg" width="1200" height="891" loading="lazy" decoding="async"
                 alt="The Crescent Heights consulting room"
                 class="h-full w-full object-cover lg:aspect-[4/5]">
          </picture>
        </div>
        <p class="mt-5 max-w-xs text-sm leading-relaxed text-sand-700">
          Two private rooms, in St. Petersburg and Tampa. Intensives run at Hyde Park Village.
        </p>
      </div>

      <div>
        <div data-motion="reveal">
          <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Benefits</p>
          <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
            Through our work together, your potential is to
          </h2>
          <p data-motion="item" class="mt-5 text-lg leading-relaxed text-sand-700">
            Every relationship encounters challenges, but those challenges can also become opportunities
            for growth, healing, and deeper connection. Couples therapy provides a supportive,
            nonjudgmental space to better understand one another, strengthen communication, and develop
            practical tools for navigating life's complexities together. Whether you are hoping to repair
            your relationship, deepen an already strong partnership, or thoughtfully navigate a
            separation, therapy can help you move forward with greater clarity, compassion, and intention.
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

  <!-- ═══ TYPES ═══ -->
  <section class="px-4 py-10 md:px-8 lg:px-12 lg:py-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-14 sm:px-10 lg:px-14 lg:py-16">
      <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Types of couples therapy</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">
          Wherever you are together
        </h2>
      </div>

      <div class="mt-12 grid gap-6 md:grid-cols-3">
        <?php foreach ($types as $i => [$name, $body, $img]): ?>
          <article class="flex flex-col overflow-hidden rounded-[1.75rem] bg-paper-lighter">
            <div class="relative aspect-[4/3] overflow-hidden">
              <picture>
                <source type="image/webp" media="(min-width: 768px)" srcset="/assets/img/<?= $img ?>-900.webp">
                <source type="image/webp" srcset="/assets/img/<?= $img ?>-560.webp">
                <img src="/assets/img/<?= $img ?>.jpg" alt="" aria-hidden="true" loading="lazy" decoding="async"
                     class="absolute inset-0 h-full w-full object-cover">
              </picture>
              <span class="absolute left-5 top-5 grid h-9 w-9 place-items-center rounded-full bg-ink font-display text-sm font-semibold text-citron"><?= sprintf('%02d', $i + 1) ?></span>
            </div>
            <div class="flex flex-1 flex-col p-8">
              <h3 class="font-display text-xl font-semibold text-ink"><?= $name ?></h3>
              <p class="mt-3 text-sm leading-relaxed text-sand-700"><?= $body ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

      </div>
    </div>
  </section>

  <!-- ═══ TESTIMONIALS ═══ -->
  <?php
  $tQuotes  = $quotes;
  $tEyebrow = 'What couples say';
  $tHeading = 'In their words';
  require __DIR__ . '/../../partials/testimonials.php';
  ?>

  <!-- ═══ FAQ ═══ -->
  <?php
  $faqItems   = $faqs;
  $faqHeading = 'Questions';
  $faqNote    = 'Rates, the 2-hour Intensive, and how couples work differs from individual therapy.';
  require __DIR__ . '/../../partials/faqs.php';
  ?>

</main>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => 'Couples Therapy',
  'serviceType' => 'Couples Psychotherapy',
  'url'      => $site['base_url'] . $path,
  'provider' => ['@type' => 'MedicalBusiness', 'name' => $site['legal'], 'telephone' => $site['phone']],
  'areaServed' => array_map(fn($o) => ['@type' => 'City', 'name' => $o['city']], array_values($site['offices'])),
  'offers'   => [
    ['@type' => 'Offer', 'name' => $session['label'],   'price' => $session['price'],   'priceCurrency' => 'USD'],
    ['@type' => 'Offer', 'name' => $intensive['label'], 'price' => $intensive['price'], 'priceCurrency' => 'USD'],
  ],
], JSON_UNESCAPED_SLASHES) ?></script>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'FAQPage',
  'mainEntity' => array_map(fn($f) => [
    '@type' => 'Question', 'name' => $f[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
  ], $faqs),
], JSON_UNESCAPED_SLASHES) ?></script>

<?php require __DIR__ . '/../../partials/footer.php'; ?>
