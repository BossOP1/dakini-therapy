<?php
$site         = require __DIR__ . '/data/site.php';
$testimonials = require __DIR__ . '/data/testimonials.php';

$title = "Dakini Therapy — Therapist in Tampa & St. Petersburg, FL | {$site['clinician']}, {$site['credential']}";
$desc  = 'Evidence-based, mindfulness-informed therapy for adults in Hyde Park Village, Tampa and Crescent Heights, St. Petersburg. Book a complimentary 15-minute consultation.';
$path  = '/';

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';

$featured = array_slice($testimonials, 0, 6);
$accents  = ['gold', 'olive', 'ink', 'olive', 'gold', 'olive'];
?>

<main id="main" class="relative z-20 bg-paper-lighter">

  <!-- ═══ HERO — Bento ═══ -->
  <section class="px-4 pb-16 pt-28 md:px-8 md:pb-20 md:pt-32 lg:px-12">
    <div class="mx-auto grid w-full max-w-6xl grid-cols-1 gap-5 md:grid-cols-2 lg:gap-7">

      <!-- Card 01 — the headline, over the arc -->
      <article class="relative col-span-1 flex min-h-[26rem] flex-col justify-between overflow-hidden rounded-[2rem] border border-sand-200 bg-paper-lighter p-8 shadow-soft md:min-h-[30rem]">

        <header class="relative z-20 flex items-center justify-between text-sm">
          <span class="flex items-center gap-2 font-semibold tracking-tight">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-5 w-5 text-gold-700" aria-hidden="true"><path d="M12 3 4 6v6c0 4.5 3.4 8.3 8 9 4.6-.7 8-4.5 8-9V6l-8-3Z"/></svg>
            Dakini Therapy
          </span>
          <span class="text-[10px] uppercase tracking-[0.2em] text-sand-700">Tampa · St. Pete</span>
        </header>

        <div class="relative z-20 mt-auto">
          <h1 data-reveal-words class="font-display text-3xl font-semibold leading-[1.08] tracking-tight md:text-4xl lg:text-5xl">
            Cutting through confusion,<br>revealing <span class="text-gold-700">wisdom</span><br>and <span class="text-gold-700">compassion</span>.
          </h1>
          <p data-reveal-words class="mt-5 max-w-sm text-sm leading-relaxed text-sand-700">
            Evidence-based psychotherapy woven with mindfulness practice, for adults navigating anxiety, grief, relationships and change.
          </p>
        </div>
      </article>

      <!-- Card 02 — the offices, on citron -->
      <article class="relative col-span-1 flex min-h-[26rem] flex-col justify-between overflow-hidden rounded-[2rem] border border-citron-600/30 bg-citron p-8 shadow-soft md:min-h-[30rem]">

        <img src="/assets/img/logo-mark-alpha.png" width="424" height="424" loading="lazy" decoding="async" alt=""
             aria-hidden="true" class="pointer-events-none absolute -bottom-16 -right-16 z-0 w-72 opacity-20 md:w-80">

        <header class="relative z-20 flex items-center justify-between text-sm text-ink">
          <span class="font-semibold tracking-tight">Two private offices</span>
          <span class="text-[10px] uppercase tracking-[0.2em] text-ink/50">In person</span>
        </header>

        <div class="relative z-20 mt-auto text-ink">
          <h2 data-reveal-words class="font-display text-3xl font-semibold leading-[1.08] tracking-tight md:text-4xl">
            Calm rooms.<br>Real presence.
          </h2>
          <dl class="mt-7 grid gap-4 text-sm sm:grid-cols-2">
            <?php foreach ($site['offices'] as $o): ?>
              <div>
                <dt class="font-semibold"><?= $o['area'] ?></dt>
                <dd class="mt-1 text-ink/70"><?= $o['city'] ?>, <?= $o['region'] ?></dd>
                <dd class="text-ink/50"><?= $o['days'] ?></dd>
              </div>
            <?php endforeach; ?>
          </dl>
        </div>
      </article>

      <!-- Card 03 — the call to action, on navy -->
      <article class="relative col-span-1 flex min-h-[22rem] flex-col overflow-hidden rounded-[2rem] border border-white/10 bg-ink p-8 text-paper-lighter shadow-soft md:col-span-2 md:min-h-[20rem] md:flex-row md:justify-between">

        <header class="relative z-20 flex items-center justify-between gap-4 text-sm md:flex-col md:items-start md:justify-start">
          <span class="flex items-center gap-2 font-semibold tracking-tight">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-5 w-5 text-gold" aria-hidden="true"><path d="M12 3 4 6v6c0 4.5 3.4 8.3 8 9 4.6-.7 8-4.5 8-9V6l-8-3Z"/></svg>
            <?= htmlspecialchars($site['clinician']) ?>, <?= $site['credential'] ?>
          </span>
          <span class="text-[10px] uppercase tracking-[0.2em] text-paper-lighter/45">Licensed</span>
        </header>

        <div class="relative z-20 mt-auto w-full max-w-md md:mt-0 md:self-end md:text-right">
          <h2 data-reveal-words class="font-display text-3xl font-semibold uppercase leading-[1.08] tracking-tight md:text-4xl">
            Start with<br>a conversation.
          </h2>
          <p class="mt-4 text-sm leading-relaxed text-paper-lighter/70 md:ml-auto md:max-w-[16rem]">
            A complimentary 15-minute call — no pressure, no commitment.
          </p>
          <div class="mt-7 flex flex-col gap-3 sm:flex-row md:justify-end">
            <a href="<?= $site['phone_href'] ?>" data-motion="magnetic"
               class="rounded-full bg-gold px-7 py-3.5 text-center text-sm font-semibold text-ink transition hover:bg-gold-400 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-gold-300">
              Book a free consult
            </a>
            <a href="<?= $site['headway'] ?>" rel="noopener"
               class="rounded-full border-2 border-white/20 px-7 py-3.5 text-center text-sm font-semibold transition hover:border-gold hover:text-gold">
              Check insurance
            </a>
          </div>
        </div>
      </article>

    </div>

    <p class="mx-auto mt-8 max-w-6xl text-center text-xs font-semibold uppercase tracking-[0.18em] text-sand-700">
      Insurance accepted via Headway · <?= implode(' · ', $site['insurers']) ?>
    </p>
  </section>

  <!-- ═══ THREE-BEAT BAND ═══ -->
  <section class="bg-paper px-5 py-20 lg:px-8 lg:py-24">
    <div class="mx-auto grid max-w-6xl gap-6 md:grid-cols-3" data-motion="reveal">
      <?php
      $beats = [
        ['Grounded in Science.', 'gold', 'A B.A. in Neuroscience from Smith College and a Master\'s in Clinical Mental Health Counseling inform how we understand the brain, emotion and change.', 'M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2Z M9 22h6'],
        ['Guided by Compassion.', 'olive', 'A therapeutic relationship that is warm, collaborative and grounded in genuine curiosity — never a template applied to your life.', 'M12 20s-7-4.5-7-9.5A4 4 0 0 1 12 8a4 4 0 0 1 7 2.5C19 15.5 12 20 12 20Z'],
        ['Inspired by Wisdom.', 'ink', 'Twenty years of meditation and contemplative study, including traditional Buddhist retreat — offered only when it is meaningful to you.', 'M12 3v18M5 8l7-5 7 5M5 16l7 5 7-5'],
      ];
      foreach ($beats as [$h, $accent, $body, $d]): ?>
        <article data-motion="item" class="group rounded-4xl border border-sand-200 bg-white p-8 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift">
          <span class="grid h-12 w-12 place-items-center rounded-2xl bg-<?= $accent ?>-50 text-<?= $accent ?>-600">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6"><path d="<?= $d ?>"/></svg>
          </span>
          <h2 class="mt-6 font-display text-xl font-semibold md:text-2xl"><?= $h ?></h2>
          <p class="mt-3 leading-relaxed text-sand-700"><?= $body ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ═══ MEET ZIJI ═══ -->
  <section class="px-5 py-24 lg:px-8 lg:py-32">
    <div class="mx-auto grid max-w-6xl items-center gap-14 lg:grid-cols-2 lg:gap-20" data-motion="reveal">
      <div data-motion="item" class="relative mx-auto w-full max-w-sm lg:mx-0">
        <div aria-hidden="true" class="absolute -bottom-5 -right-5 -z-10 h-full w-full rounded-4xl bg-citron"></div>
        <div class="aspect-[4/5] overflow-hidden rounded-4xl border border-sand-200 bg-paper shadow-lift">
          <img src="/assets/img/ziji-portrait.jpg" width="640" height="800" loading="lazy" decoding="async"
               alt="Maureen 'Ziji' Drake, Licensed Mental Health Counselor"
               class="h-full w-full object-cover"
               onerror="this.replaceWith(Object.assign(document.createElement('div'),{className:'grid h-full w-full place-items-center font-display text-6xl text-ink/15',textContent:'ZD'}))">
        </div>
      </div>

      <div data-motion="item">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-olive-600">Meet Ziji</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Healing begins in relationship
        </h2>
        <p class="mt-6 text-lg leading-relaxed text-sand-700">
          &ldquo;I believe that healing begins in relationship — with ourselves, with others, and with the
          deeper wisdom that often emerges when we feel truly seen and understood.&rdquo;
        </p>
        <p class="mt-5 leading-relaxed text-sand-700">
          Before opening my private practice I spent thirteen years at the Omega Institute, working
          alongside internationally recognised psychologists, physicians and spiritual teachers. Clients
          often describe me as calm, grounded, resourceful, practical, and gently challenging.
        </p>

        <ul class="mt-8 flex flex-wrap gap-2">
          <?php foreach ([
            ['B.A. Neuroscience, Smith College','gold'],
            ['M.A. Clinical Mental Health Counseling','ink'],
            ['13 years, Omega Institute','olive'],
            ['20+ years contemplative practice','olive'],
          ] as [$c,$a]): ?>
            <li class="rounded-full bg-<?= $a ?>-50 px-3.5 py-1.5 text-xs font-semibold text-<?= $a ?>-700"><?= $c ?></li>
          <?php endforeach; ?>
        </ul>

        <a href="/about" class="group mt-9 inline-flex items-center gap-2 font-semibold text-ink-700 transition hover:text-ink-600">
          Read Ziji's full story
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ SERVICES ═══ -->
  <section class="bg-paper px-5 py-24 lg:px-8 lg:py-32">
    <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl" data-motion="reveal">
        <p data-motion="item" class="text-xs font-semibold uppercase tracking-[0.2em] text-ink-600">How we can work together</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">Therapy shaped around what matters to you</h2>
      </div>

      <div class="mt-14 grid gap-6 md:grid-cols-3" data-motion="reveal">
        <?php foreach ($site['services'] as $s): $a = $s['accent']; ?>
          <article data-motion="item" class="group flex flex-col overflow-hidden rounded-4xl border border-sand-200 bg-white shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift">
            <div class="h-1.5 w-full bg-<?= $a ?>-500"></div>
            <div class="flex flex-1 flex-col p-8">
              <span class="w-fit rounded-full bg-<?= $a ?>-50 px-3 py-1 text-xs font-semibold text-<?= $a ?>-700"><?= $s['meta'] ?></span>
              <h3 class="mt-5 font-display text-2xl font-semibold"><?= $s['title'] ?></h3>
              <p class="mt-3 leading-relaxed text-sand-700"><?= $s['blurb'] ?></p>
              <ul class="mt-6 space-y-2.5 text-sm">
                <?php foreach ($s['points'] as $pt): ?>
                  <li class="flex gap-2.5">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 h-4 w-4 shrink-0 text-<?= $a ?>-500"><path d="m4 10 4 4 8-8"/></svg>
                    <span class="text-ink/75"><?= $pt ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
              <a href="<?= $s['url'] ?>" class="mt-8 inline-flex items-center gap-2 pt-2 font-semibold text-<?= $a ?>-700 transition group-hover:gap-3">
                Learn more
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ TESTIMONIALS ═══ -->
  <section class="bg-paper">
    <div class="grid grid-cols-1 lg:grid-cols-2">

      <!-- Image, bleeding to the left edge, heading laid over it -->
      <div class="relative min-h-[22rem] overflow-hidden lg:min-h-[44rem]">
        <!-- Solid ground: shows through until a photograph is set -->
        <div aria-hidden="true" class="absolute inset-0 z-0 bg-citron"></div>

        <picture>
          <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/testimonial-1600.webp">
          <source type="image/webp" srcset="/assets/img/testimonial-900.webp">
          <img src="/assets/img/testimonial.jpg" width="1200" height="903" alt="" aria-hidden="true"
               loading="lazy" decoding="async"
               class="absolute inset-0 z-[1] h-full w-full object-cover object-[68%_center]"
               onerror="this.closest('picture').remove()">
        </picture>

        <h2 data-reveal-words class="relative z-10 max-w-[10em] p-8 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-ink md:text-5xl lg:p-12 lg:text-6xl">
          What clients<br>are saying
        </h2>
      </div>

      <!-- 2 × 2 quote grid -->
      <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:gap-5 lg:p-5">
        <?php foreach (array_slice($featured, 0, 4) as $t): ?>
          <figure class="flex flex-col rounded-2xl bg-paper-light p-7 lg:p-8">
            <blockquote class="font-display text-base leading-relaxed text-ink lg:text-lg">
              <?php
              // Trim to roughly the reference's card rhythm, breaking on a word.
              $q = $t['quote'];
              if (mb_strlen($q) > 240) {
                $q = mb_substr($q, 0, 240);
                $q = mb_substr($q, 0, mb_strrpos($q, ' ')) . '…';
              }
              ?>
              &ldquo;<?= htmlspecialchars($q) ?>&rdquo;
            </blockquote>
            <figcaption class="mt-auto pt-8 text-sm text-sand-700">
              <?= $t['id'] ?>, <?= $t['type'] === 'couples' ? 'Couples client' : 'Former client' ?>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>

    </div>

    <div class="px-4 pb-10 lg:px-5">
      <a href="/testimonials" class="group inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
        Read all <?= count($testimonials) ?> reviews
        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
      </a>
    </div>
  </section>

  <!-- ═══ OFFICES ═══ -->
  <section class="bg-paper px-5 py-24 lg:px-8 lg:py-32">
    <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl" data-motion="reveal">
        <p data-motion="item" class="text-xs font-semibold uppercase tracking-[0.2em] text-olive-600">Two calm, private offices</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">Come sit with it, in person</h2>
        <p data-motion="item" class="mt-5 text-lg leading-relaxed text-sand-700">
          Adult clients are welcomed into two thoughtfully designed spaces where comfort, confidentiality
          and healing come together.
        </p>
      </div>

      <div class="mt-14 grid gap-6 md:grid-cols-2" data-motion="reveal">
        <?php foreach ($site['offices'] as $o): $a = $o['accent']; ?>
          <article data-motion="item" class="group overflow-hidden rounded-4xl border border-sand-200 bg-white shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift">
            <div class="relative h-48 bg-<?= $a ?>-100">
              <span class="absolute left-6 top-6 rounded-full bg-white/85 px-3 py-1 text-xs font-semibold text-<?= $a ?>-700"><?= $o['city'] ?>, <?= $o['region'] ?></span>
            </div>
            <div class="p-8">
              <h3 class="font-display text-2xl font-semibold"><?= $o['area'] ?></h3>
              <address class="mt-3 not-italic leading-relaxed text-sand-700">
                <?= $o['street'] ?><br><?= $o['city'] ?>, <?= $o['region'] ?> <?= $o['zip'] ?>
              </address>
              <dl class="mt-5 flex flex-wrap gap-x-8 gap-y-2 text-sm">
                <div><dt class="text-xs font-semibold uppercase tracking-wider text-sand-700">Days</dt><dd class="mt-0.5 font-medium"><?= $o['days'] ?></dd></div>
                <div><dt class="text-xs font-semibold uppercase tracking-wider text-sand-700">Hours</dt><dd class="mt-0.5 font-medium"><?= $o['hours'] ?></dd></div>
              </dl>
              <p class="mt-5 rounded-2xl border border-sand-200 bg-paper-lighter p-4 text-sm leading-relaxed text-sand-700">
                <strong class="font-semibold text-ink">Parking · </strong><?= $o['parking'] ?>
              </p>
              <div class="mt-6 flex flex-wrap gap-4">
                <a href="<?= $o['url'] ?>" class="font-semibold text-<?= $a ?>-700 transition hover:text-<?= $a ?>-600">Office details</a>
                <a href="<?= $o['map'] ?>" rel="noopener" class="font-semibold text-sand-700 transition hover:text-ink">Directions ↗</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ RATES TEASER ═══ -->
  <section class="px-5 py-24 lg:px-8 lg:py-32">
    <div class="mx-auto max-w-6xl">
      <div class="max-w-2xl" data-motion="reveal">
        <p data-motion="item" class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-600">Straightforward pricing</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">No surprises, ever</h2>
      </div>

      <div class="mt-14 grid gap-6 md:grid-cols-3" data-motion="reveal">
        <?php foreach ($site['rates'] as $i => $r): $a = ['ink','olive','gold'][$i]; ?>
          <article data-motion="item" class="rounded-4xl border border-sand-200 bg-white p-8 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift">
            <h3 class="font-display text-lg font-semibold text-sand-700"><?= $r['label'] ?></h3>
            <p class="mt-3 font-display text-5xl font-semibold text-<?= $a ?>-700">
              $<span data-count-to="<?= $r['price'] ?>"><?= $r['price'] ?></span>
            </p>
            <p class="mt-3 text-sm leading-relaxed text-sand-700"><?= $r['note'] ?></p>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="mt-10 flex flex-col items-start gap-4 rounded-4xl border border-ink-100 bg-ink-50 p-7 sm:flex-row sm:items-center sm:justify-between" data-motion="reveal">
        <p data-motion="item" class="leading-relaxed text-ink-700">
          <strong class="font-semibold">Insurance accepted for individual therapy</strong> —
          <?= implode(', ', $site['insurers']) ?>, via Headway. Couples therapy is self-pay only.
        </p>
        <a data-motion="item" href="/rates-and-insurance" class="shrink-0 rounded-full bg-ink-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-ink-700">Rates &amp; insurance</a>
      </div>
    </div>
  </section>

  <!-- ═══ CLOSING CTA ═══ -->
  <section class="bg-ink px-5 py-24 lg:px-8 lg:py-32">

    <div class="mx-auto max-w-3xl text-center" data-motion="reveal">
      <h2 data-motion="item" class="font-display text-3xl font-semibold tracking-tight text-paper-lighter md:text-4xl lg:text-5xl">
        Start with a conversation
      </h2>
      <p data-motion="item" class="mx-auto mt-5 max-w-xl text-lg leading-relaxed text-paper-lighter/70">
        A complimentary 15-minute call — no pressure, no commitment. Just a chance to see whether
        this feels like the right fit.
      </p>
      <a data-motion="item" href="<?= $site['phone_href'] ?>"
         class="mt-10 inline-block font-display text-4xl font-semibold text-paper-lighter transition hover:text-gold-300 sm:text-5xl lg:text-6xl">
        <?= $site['phone'] ?>
      </a>
      <div data-motion="item" class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row">
        <a href="<?= $site['phone_href'] ?>" data-motion="magnetic" class="w-full rounded-full bg-gold px-8 py-4 font-semibold text-ink shadow-glow transition hover:bg-gold-400 sm:w-auto">Call to book</a>
        <a href="<?= $site['headway'] ?>" rel="noopener" class="w-full rounded-full border-2 border-white/20 px-8 py-4 font-semibold text-paper-lighter transition hover:border-gold-300 hover:text-gold-300 sm:w-auto">Check insurance</a>
      </div>
      <p data-motion="item" class="mt-12 font-display text-sm italic text-paper-lighter/45"><?= implode(' ', $site['ethos']) ?></p>
    </div>
  </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
