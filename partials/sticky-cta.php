<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<div data-sticky-cta class="fixed inset-x-0 bottom-0 z-50 border-t border-sand-200 bg-paper-lighter p-3 md:hidden">
  <div class="flex gap-2.5">
    <a href="<?= $site['phone_href'] ?>" class="flex flex-1 items-center justify-center gap-2 rounded-full bg-gold px-5 py-3.5 text-sm font-semibold text-ink">
      <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.6a1.5 1.5 0 0 1 1.46 1.14l.5 2a1.5 1.5 0 0 1-.42 1.45l-.9.9a11.5 11.5 0 0 0 5.37 5.37l.9-.9a1.5 1.5 0 0 1 1.45-.42l2 .5A1.5 1.5 0 0 1 18 13.4V15a1.5 1.5 0 0 1-1.5 1.5A14.5 14.5 0 0 1 2 3.5Z"/></svg>
      Call now
    </a>
    <a href="<?= $site['headway'] ?>" rel="noopener" class="flex flex-1 items-center justify-center rounded-full border-2 border-ink/15 px-5 py-3.5 text-sm font-semibold text-ink">Check insurance</a>
  </div>
</div>
