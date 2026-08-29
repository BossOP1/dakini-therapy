<?php
$site = require __DIR__ . '/../../data/site.php';
$title = "Accessibility | {$site['legal']}";
$desc  = 'How this site is built for accessibility, and how to report a barrier you run into.';
$path  = '/legal/accessibility';
require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$lTitle = 'Accessibility';
$lIntro = 'This site is built to be usable by as many people as possible, and to be fixed quickly when it is not.';
$lBody = <<<HTML
<p>
  The site targets the <strong class="font-semibold text-ink">WCAG 2.1 Level AA</strong> guidelines. In
  practice that means text and background colours are checked for contrast, every control can be reached and
  operated from a keyboard, images carry text alternatives, headings run in order, and motion is reduced
  automatically for anyone whose device asks for that.
</p>
<p>
  Accessibility is never finished, and automated checks miss things that people notice. If any part of this
  site is difficult to use &mdash; a control you cannot reach, text you cannot read, something a screen reader
  announces wrongly &mdash; please say so. Tell me what you were trying to do and what got in the way, and I
  will fix it.
</p>
<p>
  If the website is a barrier, it should not stop you from getting care: call
  <a href="{$site['phone_href']}" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4">{$site['phone']}</a>
  and we can arrange everything by phone instead.
</p>
HTML;
require __DIR__ . '/../../partials/legal-page.php';
require __DIR__ . '/../../partials/footer.php';
