<?php
$site = require __DIR__ . '/../../data/site.php';
require __DIR__ . '/../../lib/contact-handler.php';

// Reuses the contact handler: a signup is just a short enquiry with a fixed
// message, so there is one mail path to configure rather than two.
$result = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $result = contact_handle($_POST + [
        'name'    => trim($_POST['name'] ?? ''),
        'message' => 'Please add me to the workshops mailing list.',
    ], $_SERVER);
}
$errors = ($result['ok'] ?? true) ? [] : ($result['errors'] ?? []);

$title = "Workshops | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = 'Group workshops with Maureen ‘Ziji’ Drake, LMHC, drawing on thirteen years at the Omega Institute. Dates are announced to the mailing list.';
$path  = '/services/workshops';

$heroOverlay = true;

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[40vh] items-end overflow-hidden px-5 pb-16 pt-36 md:min-h-[46vh] md:pb-20 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/journey/j08-1200.webp">
      <source type="image/webp" srcset="/assets/img/journey/j08-640.webp">
      <img src="/assets/img/journey/j08.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-[50%_30%]">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
        <span class="px-2 text-paper-lighter/40">/</span>
        <span class="text-paper-lighter/70">Services</span>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">Group sessions</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Workshops
      </h1>
    </div>
  </section>

  <!-- ═══ INTRO ═══ -->
  <section class="px-5 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
      <div class="lg:sticky lg:top-32 lg:self-start">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">What to expect</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl lg:text-5xl">
          Shaped by thirteen years at Omega
        </h2>
      </div>

      <div class="space-y-5 text-lg leading-relaxed text-sand-700">
        <p>
          Before opening my private practice, I spent thirteen years at the Omega Institute in Rhinebeck,
          New York, immersed in an environment dedicated to psychology, medicine, mindfulness, creativity, and
          human potential.
        </p>
        <p>
          Workshops draw on that experience and on more than twenty years of meditation, yoga, and
          contemplative study &mdash; offered as group sessions rather than individual therapy.
        </p>
        <p class="border-l-2 border-citron pl-5 text-ink">
          Dates are announced to the mailing list first. Add your name below and you will hear about the next
          one before it is posted anywhere else.
        </p>
      </div>
    </div>
  </section>

  <!-- ═══ MAILING LIST ═══ -->
  <section class="px-4 pb-10 md:px-8 lg:px-12 lg:pb-14">
    <div class="mx-auto max-w-7xl rounded-[2rem] bg-citron px-6 py-14 sm:px-10 lg:px-14 lg:py-16">
      <div class="mx-auto max-w-xl text-center">
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-ink/60">Stay in the loop</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-ink md:text-4xl">
          Join the mailing list
        </h2>

        <?php if ($result && ($result['ok'] ?? false)): ?>
          <p role="status" class="mx-auto mt-8 max-w-md rounded-2xl bg-paper-lighter p-5 text-base leading-relaxed text-ink">
            Thank you — you are on the list. You will hear about the next workshop before it is posted.
          </p>
        <?php else: ?>
          <p role="status" data-form-success hidden
             class="mx-auto mt-8 max-w-md rounded-2xl bg-paper-lighter p-5 text-base leading-relaxed text-ink">
            Thank you &mdash; you are on the list. You will hear about the next workshop before it is posted.
          </p>

          <form data-form name="workshops" method="post" action="/services/workshops/?sent=1"
                data-netlify="true" data-netlify-honeypot="website"
                class="mx-auto mt-8 max-w-md text-left" novalidate>
            <input type="hidden" name="form-name" value="workshops">
            <p class="hidden" aria-hidden="true">
              <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </p>

            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label for="ws-name" class="block text-sm font-semibold text-ink">Your name</label>
                <input id="ws-name" name="name" type="text" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                       class="mt-2 w-full rounded-xl border border-ink/15 bg-paper-lighter px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/30">
              </div>
              <div>
                <label for="ws-email" class="block text-sm font-semibold text-ink">Email</label>
                <input id="ws-email" name="email" type="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       class="mt-2 w-full rounded-xl border border-ink/15 bg-paper-lighter px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-ink/30">
              </div>
            </div>

            <?php if ($errors): ?>
              <p role="alert" class="mt-4 text-sm font-medium text-ink">
                <?= htmlspecialchars(reset($errors)) ?>
              </p>
            <?php endif; ?>

            <button type="submit"
                    class="mt-6 w-full rounded-full bg-ink px-8 py-4 text-sm font-semibold text-citron transition hover:bg-ink-800 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-ink/30 sm:w-auto">
              Add me to the list
            </button>

            <p class="mt-4 text-xs leading-relaxed text-ink/60">
              Workshop announcements only. No clinical information is collected here, and you can ask to be
              removed at any time.
            </p>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ═══ MEANWHILE ═══ -->
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto max-w-6xl">
      <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">In the meantime</p>
      <h2 class="mt-4 max-w-2xl font-display text-3xl font-semibold tracking-tight md:text-4xl">
        One-to-one work is available now
      </h2>

      <div class="mt-10 grid gap-5 md:grid-cols-2 lg:gap-6">
        <?php foreach (array_slice($site['services'], 0, 2) as $s): ?>
          <a href="<?= $s['url'] ?>" class="group flex flex-col rounded-[1.75rem] border border-sand-200 bg-white p-8 transition hover:-translate-y-1 hover:shadow-lift">
            <h3 class="font-display text-xl font-semibold text-ink"><?= $s['title'] ?></h3>
            <p class="mt-3 text-sm leading-relaxed text-sand-700"><?= $s['blurb'] ?></p>
            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition group-hover:gap-3">
              Learn more
              <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M4 10h12M11 5l5 5-5 5"/></svg>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/../../partials/footer.php'; ?>
