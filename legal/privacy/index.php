<?php
$site = require __DIR__ . '/../../data/site.php';
$title = "Privacy | {$site['legal']}";
$desc  = 'What this website collects, what it does not, and where clinical privacy is covered instead.';
$path  = '/legal/privacy';
require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$lTitle = 'Privacy';
$lIntro = 'This page covers the website only. Privacy inside the therapy relationship is covered separately by the Notice of Privacy Practices you receive before your first session.';
// DRAFT — describes how the site actually behaves today. The clinical HIPAA
// notice is a separate document and is deliberately not reproduced here.
$lBody = <<<HTML
<h2 class="pt-2 font-display text-2xl font-semibold tracking-tight text-ink">What this site collects</h2>
<p>
  Nothing, unless you send it. There are no advertising trackers and no third-party analytics on these pages.
</p>
<p>
  If you use the contact form or the workshop mailing list, what you type &mdash; your name, email, any phone
  number, and your message &mdash; is submitted to the site&rsquo;s hosting provider and forwarded by email.
  It is used to answer you, and for nothing else. It is never sold or shared for marketing.
</p>

<h2 class="pt-4 font-display text-2xl font-semibold tracking-tight text-ink">The form is not a secure channel</h2>
<p>
  Please keep what you send brief and general. Email and web forms are not encrypted end to end, so they are
  not the place for clinical detail, diagnoses, or anything you would consider sensitive. Anything of that
  kind is better discussed by phone or in session.
</p>
<p>
  This site is not monitored continuously and is not a crisis service. In an emergency call 911, or call or
  text 988 for the Suicide &amp; Crisis Lifeline.
</p>

<h2 class="pt-4 font-display text-2xl font-semibold tracking-tight text-ink">Clinical records</h2>
<p>
  Your treatment records are protected health information and are handled under HIPAA and Florida law, not
  under this page. The Notice of Privacy Practices given to you at intake sets out how those records are
  kept, when they may be disclosed, and your rights over them. Ask for another copy at any time.
</p>

<h2 class="pt-4 font-display text-2xl font-semibold tracking-tight text-ink">Links out</h2>
<p>
  Some pages link to services run by other people &mdash; the insurance portal and the booking provider among
  them. Once you follow one of those links you are on their site, under their privacy terms, not these.
</p>
HTML;
require __DIR__ . '/../../partials/legal-page.php';
require __DIR__ . '/../../partials/footer.php';
