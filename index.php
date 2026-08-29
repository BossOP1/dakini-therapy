<?php
$site         = require __DIR__ . '/data/site.php';
$testimonials = require __DIR__ . '/data/testimonials.php';

$title = "Dakini Therapy — Therapist in Tampa & St. Petersburg, FL | {$site['clinician']}, {$site['credential']}";
$desc  = 'Evidence-based, mindfulness-informed therapy for adults in Hyde Park Village, Tampa and Crescent Heights, St. Petersburg. Book a complimentary 15-minute consultation.';
$path  = '/';

$heroOverlay = true;   // full-bleed video hero sits under the header

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';

$featured = array_slice($testimonials, 0, 6);
$accents  = ['gold', 'olive', 'ink', 'olive', 'gold', 'olive'];
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO — Open Cinematic Video ═══ -->
  <section class="relative isolate flex min-h-[46vh] flex-col items-center justify-center overflow-hidden px-5 py-16 text-center sm:px-8 md:min-h-[56vh] md:py-20 lg:px-12">

    <!-- Hero Background Video (No Overlay) -->
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
      <video autoplay loop muted playsinline class="h-full w-full object-cover" style="object-position: center top;">
        <source src="/assets/video-bg/5174172-uhd_2560_1440_25fps.mp4" type="video/mp4">
      </video>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 mx-auto max-w-4xl text-paper-lighter">
      <!-- <div class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-ink/30 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] backdrop-blur-sm">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-4 w-4 text-gold" aria-hidden="true"><path d="M12 3 4 6v6c0 4.5 3.4 8.3 8 9 4.6-.7 8-4.5 8-9V6l-8-3Z"/></svg>
        Dakini Therapy · Tampa &amp; St. Pete
      </div> -->

      <h1 data-reveal-words class="mt-8 font-display text-4xl font-semibold leading-[1.08] tracking-tight drop-shadow-md sm:text-5xl md:text-6xl lg:text-7xl">
        Cutting through confusion,<br>revealing <span class="text-gold">wisdom</span><br>and <span class="text-gold">compassion</span>.
      </h1>

      <p class="mx-auto mt-6 max-w-2xl text-base leading-relaxed text-paper-lighter/90 drop-shadow sm:text-lg">
        Evidence-based psychotherapy woven with mindfulness practice, for adults navigating anxiety, grief, relationships and change.
      </p>

      <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
        <a href="<?= $site['phone_href'] ?>" data-motion="magnetic"
           class="w-full rounded-full bg-gold px-8 py-4 text-center text-sm font-semibold text-ink shadow-lift transition hover:bg-gold-400 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-gold sm:w-auto">
          Book a free consult
        </a>
        <a href="<?= $site['headway'] ?>" rel="noopener"
           class="w-full rounded-full border-2 border-white/40 bg-ink/20 px-8 py-4 text-center text-sm font-semibold text-paper-lighter backdrop-blur-sm transition hover:border-gold hover:text-gold sm:w-auto">
          Check insurance
        </a>
      </div>

      <p class="mt-8 text-xs font-semibold uppercase tracking-[0.18em] text-paper-lighter/80 drop-shadow">
        Insurance accepted via Headway · <?= implode(' · ', $site['insurers']) ?>
      </p>
    </div>

  </section>

  <!-- ═══ MEET ZIJI — Full Background Image with Wave ═══ -->
  <section class="relative isolate flex min-h-[58vh] flex-col justify-center overflow-hidden bg-citron py-16 sm:py-16 lg:min-h-[68vh] lg:py-20">
    
    <!-- Full Background Image with Readability Gradient -->
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
      <img src="/assets/dakini_banner_color.png" alt="Dakini Therapy — Maureen 'Ziji' Drake, LMHC"
           class="h-full w-full object-cover object-[right_top] translate-y-6 sm:translate-y-12 lg:translate-y-20 scale-105">
    </div>

    <!-- Content firmly aligned to the Left -->
    <div class="relative z-10 w-full max-w-6xl mx-auto px-5 sm:px-8 lg:px-12 flex justify-start">
      <div class="max-w-xl lg:max-w-2xl text-left" data-motion="reveal">
        <p data-motion="item" class="text-xs font-semibold uppercase tracking-[0.2em] text-olive-700">Meet Ziji</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl leading-[1.12]">
          Healing begins in relationship
        </h2>
        <p data-motion="item" class="mt-6 text-lg leading-relaxed text-sand-800">
          &ldquo;I believe that healing begins in relationship — with ourselves, with others, and with the
          deeper wisdom that often emerges when we feel truly seen and understood.&rdquo;
        </p>
        <p data-motion="item" class="mt-5 leading-relaxed text-sand-800">
          Before opening my private practice I spent thirteen years at the Omega Institute, working
          alongside internationally recognized psychologists, physicians and spiritual teachers. Clients
          often describe me as calm, grounded, resourceful, practical, and gently challenging.
        </p>

        <ul data-motion="item" class="mt-8 flex flex-wrap gap-2">
          <?php foreach ([
            ['B.A. Neuroscience, Smith College','gold'],
            ['M.A. Clinical Mental Health Counseling','ink'],
            ['13 years, Omega Institute','olive'],
            ['20+ years contemplative practice','olive'],
          ] as [$c,$a]): ?>
            <li class="rounded-full border border-sand-200/80 bg-white/90 px-3.5 py-1.5 text-xs font-semibold text-<?= $a ?>-800 shadow-xs backdrop-blur-xs"><?= $c ?></li>
          <?php endforeach; ?>
        </ul>

        <div data-motion="item" class="mt-9">
          <a href="/about" class="group inline-flex items-center gap-2 rounded-full bg-ink px-8 py-3.5 text-xs font-semibold uppercase tracking-wider text-paper-lighter shadow-lift transition hover:bg-ink-800 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-ink/30">
            Read Ziji's full story
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Organic Wave Divider at the Section Bottom -->
    <div class="pointer-events-none absolute bottom-0 left-0 right-0 overflow-hidden leading-none z-10">
      <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="relative block w-full h-10 sm:h-14 md:h-16 lg:h-20 text-paper-lighter" preserveAspectRatio="none">
        <path d="M0,32 C360,75 720,10 1080,48 C1260,65 1380,40 1440,32 L1440,80 L0,80 Z" fill="currentColor"></path>
      </svg>
    </div>
  </section>

  <!-- ═══ HOW DAKINI THERAPY WORKS (Talkspace-inspired exact aesthetic) ═══ -->
  <section class="bg-paper-lighter px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">

      <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
        
        <!-- Left Column: Headline & 4 Numbered Step Cards -->
        <div class="lg:col-span-7" data-motion="reveal">
          
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Getting started</p>
          <h2 data-motion="item" class="font-display text-3xl font-semibold tracking-tight text-ink sm:text-4xl lg:text-5xl">
            How Dakini Therapy works
          </h2>

          <div class="mt-8 space-y-4 sm:mt-10 sm:space-y-4.5">
            
            <!-- Step 1 Card -->
            <div data-motion="item" class="flex items-start rounded-xl border border-ink/15 bg-white p-5 shadow-xs transition-all duration-300 hover:border-ink/40 hover:shadow-soft sm:p-6">
              <span class="mr-6 shrink-0 font-display text-4xl font-semibold text-gold-700 sm:mr-8 sm:text-5xl">
                1
              </span>
              <div>
                <h3 class="font-display text-lg font-medium text-ink sm:text-xl">
                  Check eligibility
                </h3>
                <p class="mt-1.5 text-sm leading-relaxed text-sand-700">
                  We're in-network with major insurance plans via Headway (Aetna, UnitedHealthcare, Oscar, Oxford), and you can check your coverage in minutes. You can also pay out-of-pocket.
                </p>
              </div>
            </div>

            <!-- Step 2 Card -->
            <div data-motion="item" class="flex items-start rounded-xl border border-ink/15 bg-white p-5 shadow-xs transition-all duration-300 hover:border-ink/40 hover:shadow-soft sm:p-6">
              <span class="mr-6 shrink-0 font-display text-4xl font-semibold text-gold-700 sm:mr-8 sm:text-5xl">
                2
              </span>
              <div>
                <h3 class="font-display text-lg font-medium text-ink sm:text-xl">
                  Connect in a free consultation
                </h3>
                <p class="mt-1.5 text-sm leading-relaxed text-sand-700">
                  Schedule a complimentary 15-minute call to share what you're experiencing, ask questions, and ensure our clinical approach is the right mutual fit.
                </p>
              </div>
            </div>

            <!-- Step 3 Card -->
            <div data-motion="item" class="flex items-start rounded-xl border border-ink/15 bg-white p-5 shadow-xs transition-all duration-300 hover:border-ink/40 hover:shadow-soft sm:p-6">
              <span class="mr-6 shrink-0 font-display text-4xl font-semibold text-gold-700 sm:mr-8 sm:text-5xl">
                3
              </span>
              <div>
                <h3 class="font-display text-lg font-medium text-ink sm:text-xl">
                  Start therapy
                </h3>
                <p class="mt-1.5 text-sm leading-relaxed text-sand-700">
                  Meet in person at our peaceful private offices in Hyde Park (Tampa) or Crescent Heights (St. Pete), or connect through secure virtual sessions.
                </p>
              </div>
            </div>

            <!-- Step 4 Card -->
            <div data-motion="item" class="flex items-start rounded-xl border border-ink/15 bg-white p-5 shadow-xs transition-all duration-300 hover:border-ink/40 hover:shadow-soft sm:p-6">
              <span class="mr-6 shrink-0 font-display text-4xl font-semibold text-gold-700 sm:mr-8 sm:text-5xl">
                4
              </span>
              <div>
                <h3 class="font-display text-lg font-medium text-ink sm:text-xl">
                  Build sustainable tools
                </h3>
                <p class="mt-1.5 text-sm leading-relaxed text-sand-700">
                  Integrate neuroscience-backed nervous system regulation, relational repair frameworks, and actionable mindfulness practices you carry into everyday life.
                </p>
              </div>
            </div>

          </div>

        </div>

        <!-- Right Column: Stylized Smartphone Provider Interface Mockup -->
        <div class="relative flex items-center justify-center lg:col-span-5" data-motion="reveal">
          
          <!-- Abstract Pastel Mint Background Shape -->
          <div aria-hidden="true" class="absolute -right-2 top-4 -z-10 h-72 w-64 rounded-3xl bg-citron-100 sm:h-96 sm:w-80 sm:rounded-[2.5rem]"></div>
          
          <!-- Thin Outline Smartphone Frame -->
          <div data-motion="item" class="w-full max-w-[295px] sm:max-w-[315px] rounded-[2.8rem] border-[2.5px] border-ink bg-white p-4 shadow-xl">
            
            <!-- Phone Status Bar -->
            <div class="flex items-center justify-between px-2 text-[10px] font-semibold text-ink">
              <span>9:41</span>
              <div class="flex items-center gap-1.5">
                <svg viewBox="0 0 24 24" fill="currentColor" class="h-2.5 w-2.5"><path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L12 22l7.03-4.39C20.26 16.07 21 14.12 21 12c0-4.97-4.03-9-9-9z"/></svg>
                <div class="h-1.5 w-3.5 rounded-xs border border-ink"></div>
              </div>
            </div>

            <!-- Brand Header -->
            <div class="mt-3 text-center">
              <span class="font-display text-sm font-semibold tracking-tight text-ink">Dakini Therapy</span>
              <h4 class="mt-1 text-sm font-bold text-ink">Meet your provider</h4>
            </div>

            <!-- Clinician Profile Card -->
            <div class="mt-3.5 rounded-xl border border-sand-200/90 bg-white p-3.5 text-center shadow-xs">
              
              <!-- Circular Avatar with Play Icon Button -->
              <div class="relative mx-auto h-20 w-20">
                <img src="/assets/img/ziji-portrait.jpg" alt="Maureen 'Ziji' Drake, LMHC"
                     class="h-full w-full rounded-full object-cover shadow-soft"
                     onerror="this.src='/assets/logo/dakini-logo.webp'">
                <button type="button" aria-label="Intro video" class="absolute bottom-0 right-0 grid h-6 w-6 place-items-center rounded-full bg-ink text-white shadow-xs transition hover:scale-110">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="ml-0.5 h-3 w-3"><path d="M8 5v14l11-7z"/></svg>
                </button>
              </div>

              <h5 class="mt-2.5 font-display text-base font-bold text-ink">
                Maureen 'Ziji' Drake
              </h5>
              <p class="text-[10.5px] text-sand-600">
                LMHC, FL · <span class="font-medium text-emerald-700">● Online now</span>
              </p>

              <!-- Profile & Availability Tabs -->
              <div class="mt-3 flex gap-2 text-[10.5px]">
                <span class="flex-1 rounded-full border border-sand-300 bg-sand-50 py-1 font-semibold text-ink">Profile</span>
                <span class="flex-1 rounded-full py-1 text-sand-600">Availability</span>
              </div>

              <!-- Brief Bio with Read More -->
              <p class="mt-2.5 text-[10px] leading-relaxed text-sand-700 text-left">
                It is no secret that life can present us with challenges, making it hard to get by at times. Sometimes all it takes is a safe space to be seen... <span class="font-bold text-ink">Read more</span>
              </p>

              <!-- Verified Badges List -->
              <div class="mt-3 space-y-1 text-left text-[10px] text-sand-700 border-t border-sand-100 pt-2.5">
                <p class="flex items-center gap-1.5"><span class="text-ink font-bold">☑</span> 13+ years in practice</p>
                <p class="flex items-center gap-1.5"><span class="text-ink font-bold">💼</span> In-network with Headway</p>
                <p class="flex items-start gap-1.5 leading-tight"><span class="text-ink font-bold">♡</span> <span>Specialties: Anxiety, Relationships, Grief &amp; Transitions</span></p>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>

  <!-- ═══ SERVICES ═══ -->
  <section id="services" class="relative overflow-hidden bg-paper px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">

      <!-- Section Header & Category Pills -->
      <div class="mx-auto max-w-3xl text-center" data-motion="reveal">
        <p data-motion="item" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">How we can work together</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl lg:text-5xl">
          Reimagining what's possible in <span class="italic font-normal font-display text-gold-700">mental health</span>
        </h2>
        <p data-motion="item" class="mt-4 text-base leading-relaxed text-ink/70 sm:text-lg">
          Dakini Therapy is leading the way in:
        </p>

        <!-- Interactive Category Pills -->
        <div data-motion="item" class="mt-8 flex flex-wrap items-center justify-center gap-2.5 sm:gap-3" id="service-pills">
          <?php foreach ($site['services'] as $i => $s): ?>
            <button type="button" data-service-tab="<?= $i ?>"
                    class="service-pill rounded-full border px-5 py-2 text-xs font-semibold transition <?= $i === 0 ? 'border-ink bg-ink text-paper-lighter shadow-soft' : 'border-sand-300/80 bg-paper-lighter text-sand-700 hover:border-ink/40 hover:bg-white hover:text-ink' ?>">
              <?= $s['title'] ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Services Peeking Stage Carousel Wrapper -->
      <div class="relative mx-auto mt-10 w-full max-w-4xl min-h-[26rem] md:min-h-[29rem] lg:min-h-[31rem]" data-motion="reveal" id="services-slider-container">

        <!-- All 3 Slides in Seamless 3D Peeking Stack -->
        <?php foreach ($site['services'] as $i => $s): $a = $s['accent']; ?>
          <article data-service-slide="<?= $i ?>"
                   class="service-card absolute inset-0 flex flex-col justify-between overflow-hidden rounded-[2.5rem] border border-sand-200 p-8 text-paper-lighter shadow-soft transition-all duration-500 ease-out md:p-12">

            <!-- Card Background Image & Subtle Gradient -->
            <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden bg-ink">
              <img src="<?= $s['image'] ?>" alt="<?= htmlspecialchars($s['title']) ?>"
                   loading="eager" decoding="async"
                   class="h-full w-full object-cover object-center">
              <!-- Flat tint: one solid colour at a uniform opacity, no fade -->
              <div class="absolute inset-0 bg-ink/70"></div>
            </div>

            <!-- Top Pill Badge -->
            <div class="relative z-10 flex items-center justify-between">
              <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-ink/60 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-gold backdrop-blur-md">
                <?= $s['meta'] ?>
              </span>
              <span class="grid h-10 w-10 place-items-center rounded-full border border-white/15 bg-white/10 text-paper-lighter backdrop-blur-md transition group-hover:bg-gold group-hover:text-ink">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
              </span>
            </div>

            <!-- Bottom / Left Content Box -->
            <div class="relative z-10 mt-auto max-w-xl pt-24">
              <h3 class="font-display text-3xl font-semibold tracking-tight text-paper-lighter sm:text-4xl md:text-5xl">
                <?= $s['title'] ?>
              </h3>

              <p class="mt-4 text-base leading-relaxed text-paper-lighter/85 sm:text-lg">
                <?= $s['blurb'] ?>
              </p>

              <!-- Service Point Highlights -->
              <ul class="mt-6 grid gap-2.5 sm:grid-cols-2 text-sm text-paper-lighter/80">
                <?php foreach ($s['points'] as $pt): ?>
                  <li class="flex items-center gap-2">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-gold"><path d="m4 10 4 4 8-8"/></svg>
                    <span><?= $pt ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>

              <div class="mt-8 flex flex-wrap items-center gap-4 pt-5 border-t border-white/15">
                <a href="<?= $s['url'] ?>" class="rounded-full bg-gold px-7 py-3 text-xs font-semibold uppercase tracking-wider text-ink transition hover:bg-gold-400">
                  Explore Service
                </a>
                <a href="<?= $site['phone_href'] ?>" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-paper-lighter transition hover:text-gold">
                  Book a Consultation
                  <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-3.5 w-3.5 transition group-hover:translate-x-1"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
                </a>
              </div>
            </div>

          </article>
        <?php endforeach; ?>

      </div>

      <!-- Slider Controls: Prev / Next Buttons & Indicators -->
      <div class="mx-auto mt-6 flex max-w-4xl items-center justify-between px-2">
        <!-- Dots -->
        <div class="flex items-center gap-2">
          <?php foreach ($site['services'] as $i => $s): ?>
            <button type="button" data-slider-dot="<?= $i ?>" aria-label="Go to slide <?= $i + 1 ?>"
                    class="service-dot h-2.5 rounded-full transition-all duration-300 <?= $i === 0 ? 'w-8 bg-ink' : 'w-2.5 bg-sand-400 hover:bg-ink/50' ?>"></button>
          <?php endforeach; ?>
        </div>

        <!-- Arrows -->
        <div class="flex items-center gap-2">
          <button type="button" data-slider-prev aria-label="Previous slide"
                  class="grid h-11 w-11 place-items-center rounded-full border border-ink/20 bg-white text-ink shadow-soft transition hover:border-ink hover:bg-ink hover:text-paper-lighter focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ink">
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M12.5 15l-5-5 5-5"/></svg>
          </button>
          <button type="button" data-slider-next aria-label="Next slide"
                  class="grid h-11 w-11 place-items-center rounded-full border border-ink/20 bg-white text-ink shadow-soft transition hover:border-ink hover:bg-ink hover:text-paper-lighter focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ink">
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M7.5 5l5 5-5 5"/></svg>
          </button>
        </div>
      </div>

    </div>
  </section>

  <!-- ═══ TESTIMONIALS ═══ -->
  <?php $tQuotes = $featured; require __DIR__ . '/partials/testimonials.php'; ?>


  <!-- ═══ BAND ═══ -->
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[2rem]">
      <picture>
        <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/testimonial-1600.webp">
        <source type="image/webp" srcset="/assets/img/testimonial-900.webp">
        <img src="/assets/img/testimonial.jpg" width="1600" height="1204" loading="lazy" decoding="async"
             alt="" aria-hidden="true"
             class="h-[18rem] w-full object-cover object-[50%_60%] md:h-[24rem]">
      </picture>
      <div aria-hidden="true" class="absolute inset-0 bg-ink/50"></div>
      <div class="absolute inset-0 flex items-end p-8 lg:p-12">
        <p class="max-w-2xl font-display text-2xl font-semibold leading-snug text-paper-lighter md:text-3xl">
          Experience the difference that in-person therapy can make in a calm, thoughtfully designed
          environment.
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ OFFICES ═══ -->
  <section class="bg-paper px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-6xl">

      <div class="max-w-2xl" data-motion="reveal">
        <p data-motion="item" class="text-xs font-semibold uppercase tracking-[0.2em] text-olive-600">Two calm, private offices</p>
        <h2 data-motion="item" class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">Come sit with it, in person</h2>
        <p data-motion="item" class="mt-5 text-lg leading-relaxed text-sand-700">
          Adult clients are welcomed into two thoughtfully designed spaces where comfort, confidentiality
          and healing come together.
        </p>
      </div>

      <div class="mt-12 space-y-5 lg:space-y-6">
        <?php foreach (array_values($site['offices']) as $i => $o): ?>
          <article data-motion="reveal"
                   class="grid overflow-hidden rounded-[2rem] border border-sand-200 bg-paper-lighter shadow-soft lg:grid-cols-2">

            <!-- Photograph — sides alternate down the page -->
            <div data-motion="item" class="relative min-h-[14rem] lg:min-h-[20rem] <?= $i % 2 ? 'lg:order-2' : '' ?>">
              <picture>
                <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/<?= $o['photo'] ?>-1200.webp">
                <source type="image/webp" srcset="/assets/img/<?= $o['photo'] ?>-700.webp">
                <img src="/assets/img/<?= $o['photo'] ?>.jpg" alt="The <?= htmlspecialchars($o['area']) ?> therapy room"
                     loading="lazy" decoding="async"
                     class="absolute inset-0 h-full w-full object-cover">
              </picture>
              <span class="absolute left-5 top-5 rounded-full bg-ink px-3.5 py-1.5 text-[11px] font-semibold uppercase tracking-[0.16em] text-citron">
                <?= $o['city'] ?>, <?= $o['region'] ?>
              </span>
            </div>

            <!-- Details -->
            <div data-motion="item" class="flex flex-col justify-center p-8 lg:p-10">
              <h3 class="font-display text-2xl font-semibold tracking-tight md:text-3xl"><?= $o['area'] ?></h3>

              <address class="mt-4 not-italic text-lg leading-relaxed text-sand-700">
                <?= $o['street'] ?><br><?= $o['city'] ?>, <?= $o['region'] ?> <?= $o['zip'] ?>
              </address>

              <dl class="mt-7 grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-sand-200 bg-sand-200 text-sm">
                <div class="bg-paper-lighter px-5 py-4">
                  <dt class="text-[10px] font-semibold uppercase tracking-[0.16em] text-sand-700">Days</dt>
                  <dd class="mt-1 font-semibold text-ink"><?= $o['days'] ?></dd>
                </div>
                <div class="bg-paper-lighter px-5 py-4">
                  <dt class="text-[10px] font-semibold uppercase tracking-[0.16em] text-sand-700">Hours</dt>
                  <dd class="mt-1 font-semibold text-ink"><?= $o['hours'] ?></dd>
                </div>
              </dl>

              <p class="mt-5 border-l-2 border-citron pl-4 text-sm leading-relaxed text-sand-700">
                <strong class="font-semibold text-ink">Parking</strong><br><?= $o['parking'] ?>
              </p>

              <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="<?= $o['url'] ?>"
                   class="rounded-full bg-ink px-6 py-3 text-sm font-semibold text-citron transition hover:bg-ink-800">
                  Office details
                </a>
                <a href="<?= $o['map'] ?>" rel="noopener"
                   class="group inline-flex items-center gap-2 rounded-full border-2 border-ink/15 px-6 py-3 text-sm font-semibold text-ink transition hover:border-ink">
                  Directions
                  <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
