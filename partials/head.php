<?php
$site  = $site  ?? require __DIR__ . '/../data/site.php';
$title = $title ?? $site['legal'];
$desc  = $desc  ?? $site['tagline'];
$path  = $path  ?? '/';
$canonical = $site['base_url'] . $path;
?>
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="<?= htmlspecialchars($desc) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= htmlspecialchars($site['legal']) ?>">
<meta property="og:title" content="<?= htmlspecialchars($title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($desc) ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<meta property="og:image" content="<?= $site['base_url'] ?>/assets/img/logo.png">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">
<link rel="icon" type="image/png" sizes="192x192" href="/assets/img/logo-mark-192.png">
<link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
<meta name="theme-color" content="#001835">

<link rel="preload" as="font" type="font/woff2" href="/assets/fonts/fraunces-latin-wght-normal.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="/assets/fonts/inter-latin-wght-normal.woff2" crossorigin>
<link rel="stylesheet" href="/assets/css/build.css">

<script type="application/ld+json"><?= json_encode([
  '@context' => 'https://schema.org',
  '@type'    => ['MedicalBusiness', 'Psychotherapist'],
  'name'     => $site['legal'],
  'url'      => $site['base_url'],
  'telephone'=> $site['phone'],
  'slogan'   => $site['tagline'],
  'priceRange' => '$185–$400',
  'founder'  => [
    '@type' => 'Person',
    'name'  => $site['clinician'],
    'honorificSuffix' => $site['credential'],
    'jobTitle' => 'Licensed Mental Health Counselor',
    'alumniOf' => ['@type' => 'CollegeOrUniversity', 'name' => 'Smith College'],
  ],
  'location' => array_map(fn($o) => [
    '@type'   => 'LocalBusiness',
    'name'    => $site['legal'] . ' — ' . $o['area'],
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress'   => $o['street'],
      'addressLocality' => $o['city'],
      'addressRegion'   => $o['region'],
      'postalCode'      => $o['zip'],
      'addressCountry'  => 'US',
    ],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $o['geo']['lat'], 'longitude' => $o['geo']['lng']],
    'telephone' => $site['phone'],
  ], array_values($site['offices'])),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?></script>
</head>
<body class="overflow-x-hidden bg-paper-lighter font-sans text-ink antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-ink focus:px-5 focus:py-3 focus:text-sm focus:font-semibold focus:text-paper-lighter">Skip to content</a>
