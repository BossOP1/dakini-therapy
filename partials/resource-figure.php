<?php
/**
 * Framed figure for the resource pages.
 *
 * These are artworks and interiors, not wide photography — all three source
 * images are close to square, so they are shown whole on a mat rather than
 * cropped into a band. $fImage, $fAlt required; $fCaption optional.
 */
?>
<figure class="mx-auto mt-12 max-w-2xl" data-motion="reveal">
  <div data-motion="item" class="overflow-hidden rounded-2xl bg-sand-100 p-3 shadow-soft ring-1 ring-ink/5">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="/assets/img/resources/<?= $fImage ?>-1200.webp">
      <source type="image/webp" srcset="/assets/img/resources/<?= $fImage ?>-700.webp">
      <img src="/assets/img/resources/<?= $fImage ?>.jpg"
           alt="<?= htmlspecialchars($fAlt) ?>" loading="lazy" decoding="async"
           class="w-full rounded-xl object-contain">
    </picture>
  </div>
  <?php if (!empty($fCaption)): ?>
    <figcaption data-motion="item" class="mt-4 text-center text-sm leading-relaxed text-sand-700">
      <?= $fCaption ?>
    </figcaption>
  <?php endif; ?>
</figure>
<?php unset($fImage, $fAlt, $fCaption); ?>
