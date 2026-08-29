<?php
$site = require __DIR__ . '/../../data/site.php';
$title = "Good Faith Estimate | {$site['legal']}";
$desc  = 'Your right to a Good Faith Estimate for the cost of care under the No Surprises Act.';
$path  = '/legal/good-faith-estimate';
require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';

$lTitle = 'Good Faith Estimate';
$lIntro = 'You have the right to receive a &ldquo;Good Faith Estimate&rdquo; explaining how much your care will cost.';
// Standard notice wording published by CMS under the No Surprises Act.
$lBody = <<<HTML
<p>
  Under the law, health care providers need to give patients who don&rsquo;t have insurance or who are not
  using insurance an estimate of the bill for medical items and services.
</p>
<ul class="list-disc space-y-3 pl-5 marker:text-citron-600">
  <li>You have the right to receive a Good Faith Estimate for the total expected cost of any non-emergency
      items or services.</li>
  <li>Make sure your health care provider gives you a Good Faith Estimate in writing at least one business day
      before your service. You can also ask any provider you choose for a Good Faith Estimate before you
      schedule an item or service.</li>
  <li>If you receive a bill that is at least \$400 more than your Good Faith Estimate, you can dispute the bill.</li>
  <li>Make sure to save a copy or picture of your Good Faith Estimate.</li>
</ul>
<p>
  For questions or more information about your right to a Good Faith Estimate, visit
  <a href="https://www.cms.gov/nosurprises" rel="noopener" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4">cms.gov/nosurprises</a>
  or call 1-800-985-3059.
</p>
<p>
  A written estimate for your own care is provided before your first session. Current session fees are listed
  on the <a href="/rates-and-insurance" class="font-semibold text-ink underline decoration-citron decoration-2 underline-offset-4">rates and insurance</a> page.
</p>
HTML;
require __DIR__ . '/../../partials/legal-page.php';
require __DIR__ . '/../../partials/footer.php';
