<?php
$site = require __DIR__ . '/../data/site.php';
require __DIR__ . '/../lib/contact-handler.php';

$result = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $result = contact_handle($_POST, $_SERVER);
}
$errors = $result['ok'] ?? true ? [] : ($result['errors'] ?? []);
$old    = fn($k) => htmlspecialchars($_POST[$k] ?? '');

$title = "Contact | {$site['legal']} — {$site['clinician']}, {$site['credential']}";
$desc  = "Book a complimentary 15-minute consultation with Maureen ‘Ziji’ Drake, LMHC. Call {$site['phone']}, or send a message. Tampa and St. Petersburg, Florida.";
$path  = '/contact';

$heroOverlay = true;

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/header.php';
?>

<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">

  <!-- ═══ HERO ═══ -->
  <section class="relative isolate flex min-h-[40vh] items-end overflow-hidden px-5 pb-16 pt-36 md:min-h-[46vh] md:pb-20 lg:px-8">
    <picture>
      <source type="image/webp" media="(min-width: 1024px)" srcset="/assets/img/locations/stp3-1200.webp">
      <source type="image/webp" srcset="/assets/img/locations/stp3-700.webp">
      <img src="/assets/img/locations/stp3.jpg" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="absolute inset-0 -z-20 h-full w-full object-cover object-center">
    </picture>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/60"></div>

    <div class="mx-auto w-full max-w-6xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-paper-lighter/70">
        <a href="/" class="transition hover:text-gold">Home</a>
      </nav>
      <p data-motion="item" class="mt-5 text-[10px] font-semibold uppercase tracking-[0.2em] text-gold">Get in touch</p>
      <h1 data-motion="item" class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.06] tracking-tight text-paper-lighter md:text-5xl lg:text-6xl">
        Start with a conversation
      </h1>
    </div>
  </section>

  <!-- ═══ CALL FIRST ═══ -->
  <section class="relative z-10 -mt-14 bg-transparent px-5 pb-16 lg:-mt-16 lg:px-8 lg:pb-20">
    <div class="mx-auto grid max-w-6xl gap-10 rounded-[1.75rem] border border-sand-200 bg-paper-lighter p-8 shadow-lift lg:grid-cols-[1fr_auto_1fr] lg:gap-12 lg:p-10">
      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">The quickest way</p>
        <a href="<?= $site['phone_href'] ?>" class="mt-3 block font-display text-3xl font-semibold text-ink transition hover:text-olive-700 md:text-4xl">
          <?= $site['phone'] ?>
        </a>
        <p class="mt-2 text-sm leading-relaxed text-sand-700">
          A complimentary 15-minute consultation — no pressure, no commitment.
        </p>
      </div>

      <div aria-hidden="true" class="hidden w-px bg-sand-200 lg:block"></div>

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Using insurance</p>
        <p class="mt-3 text-sm leading-relaxed text-ink">
          <?= implode(' &middot; ', $site['insurers']) ?>
        </p>
        <a href="<?= $site['headway'] ?>" rel="noopener"
           class="group mt-4 inline-flex items-center gap-2 text-sm font-semibold text-olive-700 transition hover:text-olive-600">
          Check your coverage on Headway
          <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 transition group-hover:translate-x-0.5"><path d="M5 15 15 5M7 5h8v8"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ═══ FORM ═══ -->
  <section class="px-5 pb-16 lg:px-8 lg:pb-20">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">

      <div>
        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Or send a message</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight md:text-4xl">Tell me a little</h2>

        <?php if ($result && ($result['ok'] ?? false)): ?>
          <p role="status" class="mt-8 rounded-2xl border-l-2 border-citron bg-paper p-5 text-base leading-relaxed text-ink">
            <?= htmlspecialchars($result['message']) ?>
          </p>
        <?php else: ?>

          <!-- Netlify has no PHP, so the static build posts to Netlify Forms.
               After a successful post Netlify returns to ?sent=1, which reveals
               this notice and hides the form. -->
          <p role="status" data-form-success hidden
             class="mt-8 rounded-2xl border-l-2 border-citron bg-paper p-5 text-base leading-relaxed text-ink">
            Thank you &mdash; your message has been sent.
          </p>

          <!-- This is not a secure channel; the notice below says so plainly. -->
          <form data-form name="contact" method="post" action="/contact/?sent=1"
                data-netlify="true" data-netlify-honeypot="website"
                class="mt-8 space-y-5" novalidate>
            <input type="hidden" name="form-name" value="contact">
            <p class="hidden" aria-hidden="true">
              <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </p>

            <div class="grid gap-5 sm:grid-cols-2">
              <div>
                <label for="name" class="block text-sm font-semibold text-ink">Your name</label>
                <input id="name" name="name" type="text" required value="<?= $old('name') ?>"
                       aria-describedby="<?= isset($errors['name']) ? 'err-name' : '' ?>"
                       class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron">
                <?php if (isset($errors['name'])): ?>
                  <p id="err-name" role="alert" class="mt-2 text-sm font-medium text-olive-700"><?= $errors['name'] ?></p>
                <?php endif; ?>
              </div>

              <div>
                <label for="phone" class="block text-sm font-semibold text-ink">Phone <span class="font-normal text-sand-700">(optional)</span></label>
                <input id="phone" name="phone" type="tel" value="<?= $old('phone') ?>"
                       class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron">
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm font-semibold text-ink">Email</label>
              <input id="email" name="email" type="email" value="<?= $old('email') ?>"
                     aria-describedby="<?= isset($errors['email']) ? 'err-email' : '' ?>"
                     class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron">
              <?php if (isset($errors['email'])): ?>
                <p id="err-email" role="alert" class="mt-2 text-sm font-medium text-olive-700"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
              <div>
                <label for="office" class="block text-sm font-semibold text-ink">Preferred office</label>
                <select id="office" name="office"
                        class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron">
                  <option value="">No preference</option>
                  <?php foreach ($site['offices'] as $o): ?>
                    <option value="<?= htmlspecialchars($o['area']) ?>" <?= ($_POST['office'] ?? '') === $o['area'] ? 'selected' : '' ?>>
                      <?= $o['area'] ?> &middot; <?= $o['city'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div>
                <label for="prefer" class="block text-sm font-semibold text-ink">Best way to reach you</label>
                <select id="prefer" name="prefer"
                        class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron">
                  <?php foreach (['No preference', 'Phone call', 'Text message', 'Email'] as $opt): ?>
                    <option <?= ($_POST['prefer'] ?? '') === $opt ? 'selected' : '' ?>><?= $opt ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div>
              <label for="message" class="block text-sm font-semibold text-ink">Message</label>
              <textarea id="message" name="message" rows="5" required
                        aria-describedby="msg-note<?= isset($errors['message']) ? ' err-message' : '' ?>"
                        class="mt-2 w-full rounded-xl border border-sand-200 bg-white px-4 py-3 text-base text-ink focus:border-ink focus:outline-none focus:ring-2 focus:ring-citron"><?= $old('message') ?></textarea>
              <p id="msg-note" class="mt-2 text-sm leading-relaxed text-sand-700">
                A sentence or two about what brings you here is plenty.
              </p>
              <?php if (isset($errors['message'])): ?>
                <p id="err-message" role="alert" class="mt-2 text-sm font-medium text-olive-700"><?= $errors['message'] ?></p>
              <?php endif; ?>
            </div>

            <p class="rounded-2xl border-l-2 border-citron bg-paper p-5 text-sm leading-relaxed text-ink">
              <strong class="font-semibold">This form is not a secure or confidential channel.</strong>
              Please do not include clinical details, diagnoses, or other protected health information.
              We can cover all of that safely once we speak.
            </p>

            <button type="submit"
                    class="rounded-full bg-ink px-8 py-4 text-sm font-semibold text-citron transition hover:bg-ink-800 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-citron">
              Send message
            </button>
          </form>
        <?php endif; ?>
      </div>

      <!-- ═══ WHERE ═══ -->
      <aside class="lg:sticky lg:top-32 lg:self-start">
        <div class="rounded-[1.75rem] border border-sand-200 bg-paper p-8">
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-olive-600">Where we meet</p>
          <ul class="mt-5 space-y-6">
            <?php foreach ($site['offices'] as $o): ?>
              <li>
                <a href="<?= $o['url'] ?>" class="font-display text-lg font-semibold text-ink transition hover:text-olive-700"><?= $o['area'] ?></a>
                <address class="mt-1 not-italic text-sm leading-relaxed text-sand-700">
                  <?= $o['street'] ?><br><?= $o['city'] ?>, <?= $o['region'] ?> <?= $o['zip'] ?>
                  <span class="mt-1 block"><?= $o['days'] ?> &middot; <?= $o['hours'] ?></span>
                </address>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="mt-5 rounded-[1.75rem] border border-lotus-500/0 bg-ink p-8 text-paper-lighter/85">
          <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-citron">In crisis?</p>
          <p class="mt-4 text-sm leading-relaxed">
            If you are in immediate danger call <strong class="font-semibold text-paper-lighter">911</strong>.
            For mental-health crisis support, call or text
            <a href="tel:988" class="font-semibold text-citron underline underline-offset-4">988</a> —
            the Suicide &amp; Crisis Lifeline, available 24/7.
          </p>
          <p class="mt-3 text-sm leading-relaxed">
            This website is not monitored and is not a substitute for emergency care.
          </p>
        </div>
      </aside>
    </div>
  </section>

</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
