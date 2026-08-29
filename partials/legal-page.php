<?php
/** Shared shell for the three footer legal pages. $lTitle, $lIntro, $lBody required. */
$site = $site ?? require __DIR__ . '/../data/site.php';
?>
<main id="main" class="relative z-20 bg-paper-lighter shadow-curtain">
  <section class="px-5 pb-16 pt-36 lg:px-8 lg:pb-20 lg:pt-44">
    <div class="mx-auto max-w-3xl" data-motion="reveal">
      <nav aria-label="Breadcrumb" data-motion="item" class="text-[11px] font-semibold uppercase tracking-[0.2em] text-sand-700">
        <a href="/" class="transition hover:text-ink">Home</a>
        <span class="px-2 text-sand-400">/</span>
        <span>Legal</span>
      </nav>
      <h1 data-motion="item" class="mt-5 font-display text-4xl font-semibold leading-[1.08] tracking-tight text-ink md:text-5xl">
        <?= htmlspecialchars($lTitle) ?>
      </h1>
      <p data-motion="item" class="mt-6 border-l-2 border-citron pl-6 text-lg leading-relaxed text-sand-700">
        <?= $lIntro ?>
      </p>
      <div data-motion="item" class="mt-10 space-y-5 text-base leading-relaxed text-sand-700">
        <?= $lBody ?>
      </div>
      <p data-motion="item" class="mt-12 border-t border-sand-200 pt-6 text-sm text-sand-700">
        Questions about this page? Call
        <a href="<?= $site['phone_href'] ?>" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4"><?= $site['phone'] ?></a>
        or use the <a href="/contact" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4">contact form</a>.
      </p>
    </div>
  </section>
</main>
