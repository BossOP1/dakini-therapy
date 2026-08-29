<?php
$site   = require __DIR__ . '/../../data/site.php';
$office = $site['offices']['tampa'];

$title = "{$office['area']} Office, {$office['city']} FL | {$site['legal']}";
$desc  = "Therapy with Maureen ‘Ziji’ Drake, LMHC at {$office['street']}, {$office['city']}, {$office['region']} {$office['zip']}. {$office['days']}, {$office['hours']}. 2HR Couples Intensives held here.";
$path  = $office['url'];

$heroOverlay = true;
$shots = ['hpv1', 'hpv2', 'hpv3', 'hpv4', 'hpv5', 'hpv6'];

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/header.php';
require __DIR__ . '/../../partials/location-page.php';
require __DIR__ . '/../../partials/footer.php';
