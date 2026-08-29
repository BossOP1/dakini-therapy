<?php
$site = require __DIR__ . '/../data/site.php';

$title = "Rates & Insurance | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = 'Individual therapy $185, couples $222, 2HR Couples Intensive $400. In network with Aetna, Oxford, Oscar and UnitedHealthcare via Headway for individual therapy.';
$path  = '/rates-and-insurance';

$heroOverlay = true;

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';

$rates = $site['rates'];
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[40vh] items-end overflow-hidden px-5 pb-16 pt-36 md:min-h-[46vh] md:pb-20 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/locations/stp2-1200.webp">
      <source type="image/webp" srcset="/assets/img/locations/stp2-700.webp">
      <img src="/assets/img/locations/stp2.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-center">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">No surprises</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Rates &amp; insurance
      </h1>
    </div>
  </section>

  <!-- ═══ RATES ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">
      <div class="grid gap-5 md:grid-cols-3 lg:gap-6">
        <?php foreach ($rates as $i => $r): ?>
          <article class="flex flex-col rounded-[1.75rem] border border-sand-200 bg-white p-8 shadow-soft">
            <h2 class="font-display text-lg font-semibold text-sand-700"><?= $r['label'] ?></h2>
            <p class="mt-3 font-display text-5xl font-semibold text-ink">$<?= $r['price'] ?></p>
            <p class="mt-3 text-sm leading-relaxed text-sand-700"><?= $r['note'] ?></p>
            <p class="mt-auto pt-6 text-[10px] font-semibold uppercase tracking-[0.2em] <?= $i === 0 ? 'text-olive-600' : 'text-sand-700' ?>">
              <?= $i === 0 ? 'Insurance accepted' : 'Self-pay only' ?>
            </p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ INSURANCE ═══ -->
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-14 sm:px-10 lg:px-14 lg:py-16">
      <div class="mx-auto grid max-w-6xl gap-10 lg:grid-cols-[1fr_1fr] lg:gap-16">
        <div>
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Using insurance</p>
          <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl">
            In network for individual therapy
          </h2>
          <ul class="mt-7 flex flex-wrap gap-2">
            <?php foreach ($site['insurers'] as $ins): ?>
              <li class="rounded-full border border-ink/20 px-4 py-2 text-sm font-medium text-ink"><?= $ins ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="<?= $site['headway'] ?>" rel="noopener"
             class="group mt-8 inline-flex items-center gap-2 rounded-full bg-ink px-7 py-3.5 text-sm font-semibold text-citron transition hover:bg-ink-800">
            Check your co-pay on Headway
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
          </a>
        </div>

        <div class="space-y-5 text-lg leading-relaxed text-ink/80">
          <p>
            I accept the following insurance plans for Individual therapy: <?= implode(', ', $site['insurers']) ?>,
            via the Headway platform. I recommend completing a complimentary 15-minute consult first, so that I
            can guide you in booking your first appointment.
          </p>
          <p class="border-l-2 border-ink/25 pl-5 font-semibold text-ink">
            Unfortunately, I do not accept insurance for Couples therapy.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══ SELF-PAY ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
      <div class="lg:sticky lg:top-32 lg:self-start">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Paying privately</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          The advantages of self-pay
        </h2>
      </div>
      <div class="space-y-5 text-lg leading-relaxed text-sand-700">
        <p>
          Choosing to invest in therapy through self-pay offers greater flexibility, privacy, and control over
          your care. Without the requirements and limitations often imposed by insurance companies, treatment
          is guided by your unique goals rather than a diagnosis, predetermined session limits, or
          authorization requirements. Self-pay also provides an added level of confidentiality, allowing your
          therapy to remain between you and your therapist while supporting a more personalized, collaborative
          approach to healing and growth.
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ GOOD FAITH ESTIMATE ═══ -->
  <section class="bg-paper px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-3xl">
      <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Your rights</p>
      <h2 class="mt-4 font-display text-2xl font-semibold tracking-tight md:text-3xl">Good Faith Estimate</h2>
      <div class="mt-6 space-y-4 text-base leading-relaxed text-sand-700">
        <p>
          Under the No Surprises Act, you have the right to receive a Good Faith Estimate explaining how much
          your care will cost if you are uninsured or not using insurance.
        </p>
        <p>
          You have the right to receive a Good Faith Estimate for the total expected cost of any non-emergency
          services. Make sure to save a copy or picture of your Good Faith Estimate. If you receive a bill that
          is at least $400 more than your Good Faith Estimate, you can dispute the bill.
        </p>
        <p>
          For questions or more information about your right to a Good Faith Estimate, ask at your consultation
          or call <a href="<?= $site['phone_href'] ?>" class="font-semibold text-ink underline underline-offset-4"><?= $site['phone'] ?></a>.
        </p>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
