<?php
$site   = require __DIR__ . '/../../data/site.php';
$office = $site['offices']['st-petersburg'];

$title = "{$office['area']} Office, {$office['city']} FL | {$site['legal']}";
$desc  = "Therapy with Maureen ‘Ziji’ Drake, LMHC at {$office['street']}, {$office['city']}, {$office['region']} {$office['zip']}. {$office['days']}, {$office['hours']}.";
$path  = $office['url'];

$heroOverlay = true;
$shots = ['stp1', 'stp2', 'stp3', 'stp4'];

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';
require __DIR__ . '/../../partials/location-page.php';
require __DIR__ . '/../../partials/footer.php';
