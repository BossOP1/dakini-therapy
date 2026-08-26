<?php
/**
 * Single source of truth for practice details.
 * Never hard-code a phone number, address or price in a template.
 */
return [
  'name'        => 'Dakini Therapy',
  'legal'       => 'Dakini Therapy, LLC',
  'clinician'   => "Maureen 'Ziji' Drake",
  'credential'  => 'LMHC',
  'licence'     => '',                      // TODO: FL LMHC licence number — legally required
  'tagline'     => 'Cutting through confusion, revealing wisdom and compassion.',
  'ethos'       => ['Grounded in Science.', 'Guided by Compassion.', 'Inspired by Wisdom.'],
  'phone'       => '(561) 343-1985',
  'phone_href'  => 'tel:+15613431985',
  'headway'     => 'https://care.headway.co/providers/maureen-ziji-drake',
  'base_url'    => 'https://www.dakini-therapy.com',

  'insurers'    => ['Aetna', 'Oxford', 'Oscar', 'UnitedHealthcare'],

  'rates' => [
    ['label' => 'Individual session',    'price' => 185, 'note' => '60 min initial · 50 min follow-up'],
    ['label' => 'Couples session',       'price' => 222, 'note' => '60 min initial · 50 min follow-up'],
    ['label' => 'Couples 2HR Intensive', 'price' => 400, 'note' => 'Hyde Park Village only'],
  ],

  'offices' => [
    'st-petersburg' => [
      'name'    => 'St. Petersburg',
      'area'    => 'Crescent Heights',
      'street'  => '675 30th Ave. N., Suite 101',
      'city'    => 'St. Petersburg',
      'region'  => 'FL',
      'zip'     => '33704',
      'days'    => 'Wed, Fri, Sat',
      'hours'   => '8:00 am – 8:00 pm',
      'parking' => 'Please use the designated parking spaces for Soul Purpose Wellness Guild.',
      'accent'  => 'olive',
      'geo'     => ['lat' => 27.7936, 'lng' => -82.6403],
      'map'     => 'https://maps.google.com/?q=675+30th+Ave+N+Suite+101+St+Petersburg+FL+33704',
      'url'     => '/locations/st-petersburg',
    ],
    'tampa' => [
      'name'    => 'Tampa',
      'area'    => 'Hyde Park Village',
      'street'  => '1405 W. Swann Ave., 2nd Floor',
      'city'    => 'Tampa',
      'region'  => 'FL',
      'zip'     => '33606',
      'days'    => 'Mon, Tue',
      'hours'   => '8:00 am – 8:00 pm',
      'parking' => 'No designated client parking. Two free garages in Hyde Park Village off Swann Ave.',
      'accent'  => 'gold',
      'geo'     => ['lat' => 27.9375, 'lng' => -82.4838],
      'map'     => 'https://maps.google.com/?q=1405+W+Swann+Ave+Tampa+FL+33606',
      'url'     => '/locations/tampa-hyde-park-village',
    ],
  ],

  'services' => [
    [
      'title'  => 'Individual Therapy',
      'accent' => 'gold',
      'url'    => '/services/individual-therapy',
      'image'  => 'https://images.unsplash.com/photo-1527689368864-3a821dbccc34?auto=format&fit=crop&w=1600&q=80',
      'blurb'  => 'A dedicated space to understand yourself, navigate what is hard, and build practical tools for lasting change.',
      'points' => ['Anxiety, stress & emotional regulation', 'Grief, loss & trauma', 'Boundaries & communication', 'Life transitions & direction'],
      'meta'   => 'Insurance accepted',
    ],
    [
      'title'  => 'Couples Therapy',
      'accent' => 'olive',
      'url'    => '/services/couples-therapy',
      'image'  => 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?auto=format&fit=crop&w=1600&q=80',
      'blurb'  => 'Move through conflict with more clarity and compassion — whether you are repairing, deepening, or thoughtfully parting.',
      'points' => ['Communication & repair', 'Recurring patterns', 'Attachment & intimacy', 'Major life decisions'],
      'meta'   => '2HR Intensives in Hyde Park',
    ],
    [
      'title'  => 'Workshops',
      'accent' => 'ink',
      'url'    => '/services/workshops',
      'image'  => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=1600&q=80',
      'blurb'  => 'Group sessions drawing on two decades of contemplative practice and thirteen years at the Omega Institute.',
      'points' => ['Mindfulness fundamentals', 'Working with anger', 'Working with sadness', 'Seasonal gatherings'],
      'meta'   => 'Join the mailing list',
    ],
  ],

  'nav' => [
    ['label' => 'About',     'url' => '/about'],
    ['label' => 'Services',  'url' => '/services/',  'children' => [
      ['label' => 'Individual Therapy', 'url' => '/services/individual-therapy'],
      ['label' => 'Couples Therapy',    'url' => '/services/couples-therapy'],
      ['label' => 'Workshops',          'url' => '/services/workshops'],
    ]],
    ['label' => 'Locations', 'url' => '/locations/', 'children' => [
      ['label' => 'St. Petersburg',      'url' => '/locations/st-petersburg'],
      ['label' => 'Hyde Park Village',   'url' => '/locations/tampa-hyde-park-village'],
    ]],
    ['label' => 'Rates',     'url' => '/rates-and-insurance'],
    ['label' => 'Resources', 'url' => '/resources/', 'children' => [
      ['label' => 'Working with Anger',   'url' => '/resources/working-with-anger'],
      ['label' => 'Working with Sadness', 'url' => '/resources/working-with-sadness'],
      ['label' => 'Recommended Books',    'url' => '/resources/recommended-books'],
      ['label' => 'The Journey',          'url' => '/the-journey'],
    ]],
  ],
];
