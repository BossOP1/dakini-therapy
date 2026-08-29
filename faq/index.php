<?php
$site = require __DIR__ . '/../data/site.php';

$title = "FAQs | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = 'Who Ziji works with, insurance, rates, and how couples work differs from individual therapy. Tampa and St. Petersburg, Florida.';
$path  = '/faq';

$heroOverlay = true;

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';

$hydePark = $site['offices']['tampa'];

// Verbatim from dakini-therapy.com/faqs-1. Her wording, including "6o min."
// as published on the rates line, which is hers to correct rather than mine.
$faqItems = [
  ['What type of clients do you work with?',
   'I offer in-person Individual therapy for adults in two locations in St. Pete &amp; Tampa. I offer telehealth mostly as backup for existing clients. I also offer Couples therapy, traditional length sessions, as well as 2HR Intensives exclusively at the ' . $hydePark['area'] . ' location.'],

  ['Do you take insurance?',
   'I accept the following insurance plans for Individual therapy: ' . implode(', ', $site['insurers']) . ', via the Headway platform. You can find my profile <a href="' . $site['headway'] . '" rel="noopener" class="font-semibold underline underline-offset-4 hover:text-ink">here</a>. I recommend completing a complimentary 15-minute consult first, so that I can guide you in booking your first appointment. Unfortunately, I do not accept insurance for Couples therapy.'],

  ['What are your rates?',
   'Individual session: $185 (60 min. Initial; 50 min. follow-up sessions)<br>Couples session: $222 (60 min. Initial; 50 min. follow-up sessions)<br>Couples 2Hr Intensive: $400'],

  ['What are the advantages of self-pay?',
   'Choosing to invest in therapy through self-pay offers greater flexibility, privacy, and control over your care. Without the requirements and limitations often imposed by insurance companies, treatment is guided by your unique goals rather than a diagnosis, predetermined session limits, or authorization requirements. Self-pay also provides an added level of confidentiality, allowing your therapy to remain between you and your therapist while supporting a more personalized, collaborative approach to healing and growth.'],

  ['Can I see you for individual therapy now that Couples therapy is over?',
   'Unfortunately, the short answer is no. I work with many couples, and it is common for one or both partners to request individual therapy following the conclusion of couples work. I am happy to provide referrals for individual therapy during or after couples sessions. Sometimes, after time has passed, couples choose to return together to &ldquo;refresh&rdquo; their knowledge.'],
];
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[46vh] items-end overflow-hidden px-5 pb-16 pt-36 md:min-h-[56vh] md:pb-20 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/locations/hpv3-1200.webp">
      <source type="image/webp" srcset="/assets/img/locations/hpv3-700.webp">
      <img src="/assets/img/locations/hpv3.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[50%_55%]">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">Before you book</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Frequently asked questions
      </h1>
    </div>
  </section>

  <!-- ═══ FAQ ═══ -->
  <?php
  $faqHeading = 'Questions';
  $faqNote    = 'Who I work with, what it costs, how insurance fits in, and how couples work differs from individual therapy.';
  require __DIR__ . '/../partials/faqs.php';
  ?>

  <!-- ═══ STILL UNSURE ═══ -->
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-12 sm:px-10 lg:px-14 lg:py-14">
      <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-6">
        <div>
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Still have a question</p>
          <p class="mt-3 max-w-xl font-display text-2xl font-semibold leading-snug text-ink md:text-3xl">
            A complimentary 15-minute call is the quickest way to find out whether this is a good fit.
          </p>
        </div>
        <a href="<?= $site['phone_href'] ?>" class="shrink-0 rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">
          Call <?= $site['phone'] ?>
        </a>
      </div>
    </div>
  </section>

</main>

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => 'FAQPage',
  'mainEntity' => array_map(fn($f) => [
    '@type' => 'Question',
    'name'  => $f[0],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags(str_replace('<br>', ' ', $f[1]))],
  ], $faqItems),
], JSON_UNESCAPED_SLASHES) ?></script>

<?php require __DIR__ . '/../partials/footer.php'; ?>
