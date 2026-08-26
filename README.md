# Dakini Therapy — Website Revamp

> **Cutting through confusion, revealing wisdom and compassion.**
> Grounded in Science. Guided by Compassion. Inspired by Wisdom.

A ground-up rebuild of [dakini-therapy.com](https://www.dakini-therapy.com/) — the private practice of
**Maureen 'Ziji' Drake, LMHC**, a licensed psychotherapist serving Tampa and St. Petersburg, Florida.

Current site: Squarespace 7.1. Target: a hand-built, fast, **modern, aesthetic and colourful** site
styled **exclusively with Tailwind CSS**.

---

## 1. Table of Contents

1. [Audit of the Existing Site](#2-audit-of-the-existing-site)
2. [What's Working / What's Broken](#3-whats-working--whats-broken)
3. [Business & Content Reference](#4-business--content-reference)
4. [Design Direction](#5-design-direction)
5. [Colour System](#6-colour-system)
6. [Typography](#7-typography)
7. [Information Architecture](#8-information-architecture)
8. [Page-by-Page Build Spec](#9-page-by-page-build-spec)
9. [Component Library](#10-component-library)
10. [Motion System](#11-motion-system)
11. [Tech Stack & Conventions](#12-tech-stack--conventions)
12. [Project Structure](#13-project-structure)
13. [Getting Started](#14-getting-started)
14. [SEO & Compliance](#15-seo--compliance)
15. [Accessibility](#16-accessibility)
16. [Performance Budget](#17-performance-budget)
17. [Build Roadmap](#18-build-roadmap)
18. [Open Questions for the Client](#19-open-questions-for-the-client)

---

## 2. Audit of the Existing Site

| Attribute | Finding |
|---|---|
| **Platform** | Squarespace 7.1 (template family `sqs-seven-one`) |
| **Pages** | 13 live pages + 1 unused `/cart` |
| **Homepage HTML weight** | ~697 KB of raw HTML for a single page |
| **Scripts on homepage** | 25 external `<script>` tags |
| **Fonts** | Libre Baskerville (headings), Almarai (body) |
| **Palette** | Near-monochrome — `#fff`, `#000`, `#272727`, `#3e3e3e`, `#f6f6f6` |
| **`<h1>` on homepage** | **0** — no primary heading anywhere on the landing page |
| **Structured data** | 2 × `ld+json` blocks (Squarespace defaults, not health-provider schema) |
| **Canonical / OG tags** | Present and correct |
| **Sitemap** | `/sitemap.xml` returns 200 |
| **`robots.txt`** | Squarespace default — blocks `anthropic-ai`, `AI2Bot`, `Amazonbot`, `Applebot-Extended`, etc. |
| **Image `alt` text** | Present on all homepage images |
| **Social profiles** | None linked |
| **Online booking** | None — phone only |
| **Contact form / email** | None published |
| **Analytics / pixels** | No GA4, no Meta Pixel detected |

### URL slugs (the biggest structural problem)

The existing slugs are Squarespace auto-generated placeholders. They are unreadable, unrankable,
and impossible to share verbally:

| Live URL | Actual page |
|---|---|
| `/` | Meet Ziji (doubles as homepage) |
| `/new-page` | Testimonials |
| `/new-page-1` | Relationship Intensives (couples) |
| `/services_2` | Individual Therapy |
| `/faqs-1` | FAQs |
| `/appointments-3` | St. Pete office |
| `/gallery` | Hyde Park Village office |
| `/photographs` | The Journey (personal photo essay) |
| `/general-2` | Working with Sadness |
| `/working-with-anger` | Working with Anger ✅ *(only good slug)* |
| `/recommended-books` | Recommended Books ✅ |
| `/workshops` | Workshops (near-empty) |
| `/resources` | Folder / dropdown only |

---

## 3. What's Working / What's Broken

### Keep

- **The copy.** Ziji's bio and approach writing is genuinely excellent — warm, specific, non-generic. Migrate near-verbatim.
- **The positioning.** "Grounded in Science. Guided by Compassion. Inspired by Wisdom." is a strong, ownable three-beat.
- **The testimonial bank.** 12 individual + 3 couples reviews, all substantive. This is high-conversion material that is currently buried on `/new-page`.
- **The niche.** Neuroscience degree + 13 years at Omega Institute + 20 years contemplative practice is a rare, defensible differentiator.
- **The resource essays.** Working with Anger / Working with Sadness / ~60 recommended books = real SEO and trust assets.

### Fix

| Problem | Impact | Fix in the rebuild |
|---|---|---|
| Homepage **is** the bio page | No hero, no value prop, no funnel | Purpose-built homepage; bio moves to `/about` |
| No `<h1>` | Weak SEO, weak a11y | One semantic `<h1>` per page |
| Placeholder slugs | Unshareable, unrankable | Full slug rewrite + 301 map |
| Phone-only booking | Loses every after-hours visitor | Add online scheduling + contact form |
| Monochrome + heavy serif | Reads dated and clinical | Colourful, warm, contemporary system |
| ~697 KB homepage | Slow on mobile LTE | Static build, budget below |
| Rates buried in FAQ | Friction; price-shoppers bounce | Dedicated, transparent pricing block |
| Workshops page empty | Dead link in main nav | Either populate or hide until content exists |
| No social proof above fold | Trust deferred | Testimonial strip on the homepage |
| Two offices split across `/appointments-3` and `/gallery` | Confusing | One `/locations` page, two cards |
| No local business schema | Missing map pack signals | `LocalBusiness` + `MedicalBusiness` JSON-LD per office |
| No analytics | Flying blind | GA4 + call-click event tracking |

---

## 4. Business & Content Reference

**Legal entity:** Dakini Therapy, LLC
**Practitioner:** Maureen 'Ziji' Drake — Licensed Mental Health Counselor (LMHC)
**Phone:** (561) 343-1985 — *complimentary 15-minute consultation*
**Insurance portal:** [Headway profile](https://care.headway.co/providers/maureen-ziji-drake)

### Credentials

- B.A. Neuroscience, Smith College
- M.A. Clinical Mental Health Counseling
- 13 years at the Omega Institute, Rhinebeck, NY
- 20+ years meditation & yoga practice
- Shambhala Meditation community, NYC
- Traditional Buddhist training + Dathün (month-long silent retreat), Karme Chöling, Vermont
- Kundalini Yoga study; 3HO Summer Solstice organiser, New Mexico

### Services & Rates

| Service | Format | Rate |
|---|---|---|
| Individual therapy | 60 min initial / 50 min follow-up | **$185** |
| Couples therapy | 60 min initial / 50 min follow-up | **$222** |
| Couples 2-Hour Intensive | 120 min — **Hyde Park Village only** | **$400** |

- Insurance accepted for **individual therapy only**, via Headway: **Aetna, Oxford, Oscar, United Healthcare**
- **Couples therapy is self-pay only**
- Adults only; telehealth offered mainly as backup for existing clients
- Ziji does not transition couples clients into individual therapy — referrals provided instead

### Locations

**St. Petersburg — Crescent Heights**
675 30th Ave. N., Suite 101, St. Petersburg, FL 33704
Wed, Fri, Sat · 8:00 am – 8:00 pm
*Use designated parking for Soul Purpose Wellness Guild.*

**Tampa — Hyde Park Village**
1405 W. Swann Ave., 2nd Floor, Tampa, FL 33606
Mon, Tue · 8:00 am – 8:00 pm
*No designated client parking; two free garages in Hyde Park Village off Swann Ave.*

### Content inventory to migrate

- Bio + "My Approach" (2 long-form sections)
- Individual therapy — 9 outcome bullets
- Couples therapy — 9 outcome bullets
- FAQs — 5 questions
- Testimonials — 15 total
- Working with Anger — essay
- Working with Sadness — essay
- Recommended Books — ~60 titles across *Psychology & Consciousness* and *Spirituality*
- The Journey — 22 captioned photographs (Pema Chödrön, Shyalpa Rinpoche, Alex Grey, Omega, Karme Chöling, India, England, France)

---

## 5. Design Direction

**The brief:** modern, aesthetic, colourful — while remaining credible for a licensed clinical practice.

**The concept.** A *dakini* in Tibetan Buddhism is a "sky-dancer" — a wisdom figure
representing energy in motion that cuts through confusion. The design translates that into:

| Principle | Execution |
|---|---|
| **Colourful, not loud** | The site's own citron and olive accents on a generous warm paper ground. Colour arrives in gradient meshes, section washes and pill badges — never in wall-to-wall blocks. |
| **Warm over clinical** | Warm paper `#FBF7F6` base instead of pure white — derived from the live site's `--white-hsl`. |
| **Motion as metaphor** | A *dakini* is a "sky-dancer" — so the site moves. Motion choreographs every reveal, hover and transition, all of it gated behind `prefers-reduced-motion`. |
| **Generous air** | Section rhythm of `py-24 md:py-32`. Content max-width `max-w-3xl` for prose, `max-w-7xl` for layout. |
| **Soft geometry** | `rounded-3xl` cards, `rounded-full` pills. No hard corners, no harsh 1px hairlines. |
| **Photography-forward** | Ziji's real photographs (offices, Omega, travel) carry the warmth; no stock imagery. |
| **Trust anchors everywhere** | Credentials, licence, insurance logos, and testimonials surface on every page. |

**Signature moves**

1. **Bento hero** — three cards: the headline on paper, the offices on citron, the call to action full-width on navy.
2. **Gradient-text headline** — `bg-gradient-to-r ... bg-clip-text text-transparent` on the key phrase only.
4. **Colour-coded services** — Individual = Ink, Couples = Olive, Workshops = Citron. Consistent across cards, icons and page headers.
5. **Scroll-choreographed reveals** — Motion's `inView()` + `stagger()` bring sections up in sequence rather than all at once.
6. **Sticky book-a-call bar** — mobile-only bottom bar; tap-to-call + book online.
7. **Alternating section washes** — `paper-lighter` → `paper` → `paper-lighter`, so the page reads as movement rather than a stack of boxes.

**Explicitly avoid:** spinning logos, autoplaying video, parallax that hijacks the scrollbar, anything that strobes or pulses faster than 3 Hz, stock photos of hands on shoulders, sunsets on beaches, generic lotus clip-art, "Namaste" script fonts, pure-black text on pure-white.

---

## 6. Colour System

**The palette is the existing site's own.** Squarespace 7.1 stores its theme as five HSL custom
properties; these were read straight off `dakini-therapy.com` and are the seed for everything below.
No hue outside these five appears anywhere in the build.

| Squarespace variable | HSL on the live site | Hex | Becomes |
|---|---|---|---|
| `--black-hsl` | `225, 42%, 19%` | `#1C2645` | **ink** — headings, body copy, dark sections |
| `--accent-hsl` | `60, 58%, 65%` | `#DADA72` | **citron** — primary CTA, highlights |
| `--darkAccent-hsl` | `56.79, 28.57%, 38.43%` | `#7E7B46` | **olive** — secondary accent |
| `--lightAccent-hsl` | `32.73, 17.46%, 87.65%` | `#E5E0DA` | **sand** — muted text scale, borders |
| `--white-hsl` | `9, 20%, 89%` | `#E9DFDD` | **paper** — section washes |

Each seed is extended into a 50–900 tonal scale **on its own hue**, which is what gives the design
enough range to feel contemporary without introducing a colour the practice does not already own.

| Token | Hex | Use |
|---|---|---|
| `paper-lighter` | `#FBF7F6` | Page ground |
| `paper-light` | `#F7F1F0` | Card surface |
| `paper` | `#E9DFDD` | Alternating section wash — the site's own "white" |
| `sand-200` | `#D8D2CB` | Borders, dividers |
| `sand-700` | `#54493B` | Secondary / muted text |
| `citron` | `#DADA72` | Primary CTA fill |
| `citron-400` | `#D0D04E` | CTA hover |
| `olive-600` | `#767342` | Secondary accent, eyebrow text |
| `ink-500` | `#445DA7` | Tertiary accent — derived from the ink hue, the only real blue in the set |
| `ink` | `#1C2645` | Body text, dark CTA band |
| `ink-900` | `#18203A` | Footer ground |

**Service colour-coding:** Individual = `ink`, Couples = `olive`, Workshops = `citron`.

> **A note on the brief.** "Modern, aesthetic and colourful" and "existing site colours only" pull
> against each other: the live palette is one chroma family (yellow-olive) plus warm neutrals and a
> deep indigo — there is no rose, teal or orange in it to reach for. The build gets its energy from
> tonal range, generous white space and flat colour blocking rather than from hue variety. If more colour
> is wanted later, the cleanest move is adding **one** complementary hue (a muted terracotta or teal
> sits naturally against citron) rather than widening the whole set.

### `tailwind.config.js`

```js
// tailwind.config.js — ESM, because package.json sets "type": "module"
import typography from '@tailwindcss/typography'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./**/*.php', './assets/js/**/*.js'],
  // Accent classes are composed in PHP (e.g. `bg-<?= $accent ?>-500`), so the
  // content scanner never sees a complete class name. Safelist the permutations.
  safelist: [
    { pattern: /^(bg|text|border|from|via|to|ring|decoration)-(citron|olive|ink|sand|paper)-(50|100|300|500|600|700)$/ },
  ],
  theme: {
    extend: {
      colors: {
        ink:    { DEFAULT:'#1C2645', 50:'#F2F4F7', 100:'#E1E5EF', 200:'#C2C9E1', 300:'#96A4CF',
                  400:'#6077BE', 500:'#445DA7', 600:'#354982', 700:'#293865', 800:'#212C50', 900:'#18203A' },
        citron: { DEFAULT:'#DADA72', 50:'#F8F8F2', 100:'#F1F1DF', 200:'#E6E6BC', 300:'#DADA8B',
                  400:'#D0D04E', 500:'#B9B931', 600:'#919127', 700:'#71711E', 800:'#595918', 900:'#404011' },
        olive:  { DEFAULT:'#7E7B46', 50:'#F6F6F3', 100:'#EDECE3', 200:'#DCDAC7', 300:'#C6C49F',
                  400:'#AFAB6F', 500:'#979354', 600:'#767342', 700:'#5C5A33', 800:'#484628', 900:'#34331D' },
        sand:   { DEFAULT:'#E5E0DA', 50:'#F6F5F4', 100:'#EBE8E5', 200:'#D8D2CB', 300:'#BFB4A6',
                  400:'#A2917B', 500:'#8A7761', 600:'#6C5D4C', 700:'#54493B', 800:'#42392E', 900:'#302922' },
        paper:  { DEFAULT:'#E9DFDD', light:'#F7F1F0', lighter:'#FBF7F6' },
      },
      fontFamily: {
        display: ['Fraunces', 'Georgia', 'serif'],
        sans:    ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
      },
      borderRadius: { '4xl': '2rem' },
      boxShadow: {
        soft: '0 2px 8px -2px rgb(28 38 69 / 0.07), 0 8px 24px -8px rgb(28 38 69 / 0.12)',
        lift: '0 8px 24px -6px rgb(28 38 69 / 0.14), 0 20px 48px -12px rgb(28 38 69 / 0.16)',
        glow: '0 0 0 1px rgb(126 123 70 / 0.25), 0 12px 40px -12px rgb(218 218 114 / 0.60)',
      },
      keyframes: {
        float:  { '0%,100%': { transform:'translateY(0) scale(1)' }, '50%': { transform:'translateY(-24px) scale(1.05)' } },
        fadeUp: { '0%': { opacity:'0', transform:'translateY(16px)' }, '100%': { opacity:'1', transform:'translateY(0)' } },
      },
      animation: { float: 'float 14s ease-in-out infinite', fadeUp: 'fadeUp 0.7s cubic-bezier(0.22,1,0.36,1) both' },
    },
  },
  plugins: [typography, forms],
}
```

### Contrast — measured, WCAG AA

| Pair | Ratio | |
|---|---|---|
| `ink` on `paper-lighter` | **13.31:1** | ✅ body copy |
| `ink` on `paper` | **11.37:1** | ✅ on section washes |
| `sand-700` on `paper` | **6.71:1** | ✅ secondary copy |
| `ink` on `citron` | **10.09:1** | ✅ **primary CTA — dark text on citron** |
| `white` on `olive-600` | **4.88:1** | ✅ |
| `white` on `ink` | **14.87:1** | ✅ dark CTA band |
| `citron-300` on `ink` | **10.18:1** | ✅ accent text on dark |
| `citron-700` on `citron-50` | **4.83:1** | ✅ accent text on tint |

❌ Never place white text on `citron` or on any `-100`/`-200` tint — citron is a light yellow and
only ever carries dark text.

---

## 7. Typography

| Role | Family | Tailwind |
|---|---|---|
| Display / headings | **Fraunces** (variable, soft optical serif) | `font-display` |
| Body / UI | **Inter** (variable) | `font-sans` |

Fraunces replaces Libre Baskerville: same literary warmth, far more contemporary, and its variable
`SOFT`/`WONK` axes give personality that a static serif cannot.

**Scale**

| Element | Classes |
|---|---|
| Hero H1 | `font-display text-4xl sm:text-5xl lg:text-7xl font-semibold tracking-tight leading-[1.05]` |
| Section H2 | `font-display text-3xl md:text-4xl lg:text-5xl font-semibold tracking-tight` |
| Card H3 | `font-display text-xl md:text-2xl font-semibold` |
| Lead | `text-lg md:text-xl leading-relaxed text-sand-700` |
| Body | `text-base leading-relaxed` |
| Eyebrow | `text-xs font-semibold uppercase tracking-[0.2em]` |
| Quote | `font-display text-xl md:text-2xl italic leading-relaxed` |

Long-form pages (bio, essays, books) use `prose prose-lg prose-stone max-w-3xl` with the
`@tailwindcss/typography` plugin, overridden to the palette above.

Load both families via `@fontsource-variable` self-hosted with `font-display: swap` — **no
Google Fonts network request**, no CLS on first paint.

---

## 8. Information Architecture

### New sitemap

```
/                       Home — hero, proof, services, offices, CTA
/about                  Meet Ziji — bio, approach, credentials, The Journey teaser
/services/              Services overview
  /services/individual-therapy
  /services/couples-therapy      (incl. 2HR Intensives)
  /services/workshops            [hide from nav until content exists]
/locations/             Both offices
  /locations/st-petersburg
  /locations/tampa-hyde-park-village
/rates-and-insurance    Transparent pricing + Headway + self-pay case
/testimonials           All 15 reviews
/faq                    5 questions, expandable
/resources/             Resource hub
  /resources/working-with-anger
  /resources/working-with-sadness
  /resources/recommended-books
/the-journey            Photo essay, 22 captions
/contact                Form + phone + both maps
/privacy                Privacy policy
/accessibility          Accessibility statement
/good-faith-estimate    No Surprises Act notice
```

### Primary navigation (max 6 items)

`About` · `Services ▾` · `Locations ▾` · `Rates` · `Resources ▾` · **`Book a Consult`** *(citron pill)*

### 301 redirect map — **ship this on day one**

| Old | New |
|---|---|
| `/` | `/` *(now a real homepage; bio content → `/about`)* |
| `/new-page` | `/testimonials` |
| `/new-page-1` | `/services/couples-therapy` |
| `/services_2` | `/services/individual-therapy` |
| `/faqs-1` | `/faq` |
| `/appointments-3` | `/locations/st-petersburg` |
| `/gallery` | `/locations/tampa-hyde-park-village` |
| `/photographs` | `/the-journey` |
| `/general-2` | `/resources/working-with-sadness` |
| `/working-with-anger` | `/resources/working-with-anger` |
| `/recommended-books` | `/resources/recommended-books` |
| `/workshops` | `/services/workshops` |
| `/resources` | `/resources/` |
| `/cart` | `/` (410 or redirect — commerce is unused) |

---

## 9. Page-by-Page Build Spec

### `/` — Home

1. **Sticky header** — logo left, nav centre, citron `Book a Consult` pill right. Transparent over hero, `backdrop-blur-lg bg-paper-lighter/80 shadow-soft` after 40px scroll.
2. **Bento grid** — card 01 carries the `<h1>` and lead on `paper-lighter`; card 02 the two offices on `citron` with a 1.5rem grid overlay and the emblem watermark; card 03 spans full width on `ink` with the dual CTA.
   - Eyebrow: `Licensed Psychotherapist · Tampa & St. Petersburg`
   - H1: *Cutting through confusion, revealing* **wisdom and compassion** ← gradient-text on the last three words
   - Lead: one sentence on evidence-based + mindfulness-informed therapy for adults
   - Dual CTA: `Book a free 15-min consult` (citron, dark text) + `Check your insurance` (outline → Headway)
   - Trust row: `Aetna · Oxford · Oscar · United Healthcare` + `Insurance accepted via Headway`
3. **Three-beat band** — Grounded in Science / Guided by Compassion / Inspired by Wisdom. Three icon cards, one accent colour each, on a `bg-paper` wash.
4. **Meet Ziji strip** — portrait left (`rounded-4xl`, citron offset frame), 3-sentence intro + credential pills right, link to `/about`.
5. **Services grid** — three colour-coded cards (ink / olive / citron), revealed with `stagger(0.06)`. Hover lift via Motion's `spring.gentle`.
6. **Testimonial marquee** — 5 short pulls, horizontal scroll-snap on mobile, 3-up grid on desktop. Link to all 15.
7. **Two offices** — side-by-side cards with photo, address, days, parking note, map link.
8. **Rates teaser** — three price chips + "Insurance accepted for individual therapy" → `/rates-and-insurance`.
9. **Closing CTA** — full-bleed solid `bg-ink`, phone number as a giant tappable `tel:` link.
10. **Footer** — nav columns, both addresses, licence line, crisis resources (**988 Suicide & Crisis Lifeline**), legal links.

### `/about` — Meet Ziji

Portrait hero → "I believe healing begins in relationship" pull-quote → bio prose → **My Approach** on a tinted wash → credentials timeline (Smith → Master's → Omega 13 yrs → Shambhala → Karme Chöling → Kundalini) → "what clients say about working with me" (*calm, grounded, resourceful, practical, gently challenging*) → The Journey teaser (6-photo mosaic) → CTA.

### `/services/individual-therapy`

Ink header → intro paragraph → 9 outcome bullets as a 3-col icon grid → who it's for → rate + insurance card → 3 individual testimonials → FAQ accordion (3 items) → CTA.

### `/services/couples-therapy`

Olive header → **2HR Intensive** highlight banner (*exclusive to Hyde Park Village*) → intro → 9 outcome bullets → **self-pay only** callout → the 3 couples testimonials → rate card ($222 / $400) → CTA.

### `/locations/*`

Office photo gallery → address block with `tel:` and Apple/Google Maps deep links → schedule table → parking guidance in a bordered callout → embedded map (lazy-loaded, click-to-activate) → `LocalBusiness` JSON-LD.

### `/rates-and-insurance`

Three pricing cards → accepted plans grid → prominent Headway CTA → "Advantages of self-pay" (four benefit cards: flexibility, privacy, no diagnosis requirement, no session limits) → No Surprises Act / Good Faith Estimate notice.

### `/testimonials`

Masonry of all 15 reviews, filter pills `All / Individual / Couples` (filtering animated with Motion's `animate()`). Vary card accent colour by index. Initials avatar chips.

### `/faq`

5 accordions using native `<details>`/`<summary>` styled with `group-open:` variants — zero JS. `FAQPage` JSON-LD.

### `/resources/*`

Hub with three cards → essays in `prose prose-lg`, olive accent, sticky TOC on `lg:`, olive reading-progress bar bound to `scroll()` → **breath orb** embedded mid-essay in both the anger and sadness pieces, with pause control and text-only 4-7-8 fallback → Recommended Books as a filterable two-category list (~60 titles) with search-as-you-type.

### `/the-journey`

Full-bleed masonry of 22 photographs, each with its caption. Lightbox via `<dialog>`, animated open/close with Motion. `loading="lazy"` throughout.

### `/contact`

Split layout: form left (name, email, phone, preferred office, preferred contact method, message), contact details right. **Form must carry a visible "do not send confidential clinical information" notice and a crisis banner (988) above the submit button.**

---

## 10. Component Library

All components are Tailwind-utility compositions. Reusable patterns live in `partials/components/`.
Motion behaviour is attached declaratively via `data-motion-*` attributes and wired up once in `assets/js/motion/`.

| Component | Notes |
|---|---|
| `btn-primary` | `inline-flex items-center gap-2 rounded-full bg-citron px-7 py-3.5 font-semibold text-ink shadow-glow transition focus-visible:ring-4 focus-visible:ring-citron-300` + `data-motion="magnetic"` |
| `btn-secondary` | Outline, `border-2 border-ink/15 hover:border-ink-500 hover:text-ink-600` |
| `card` | `rounded-4xl border border-sand-200 bg-white p-8 shadow-soft` + `data-motion="lift"` |
| `card-accent` | Adds a 4px top border in the section's accent colour |
| `pill` | `rounded-full bg-{accent}-50 px-3 py-1 text-xs font-semibold text-{accent}-700` |
| `eyebrow` | `text-xs font-semibold uppercase tracking-[0.2em] text-{accent}-600` |
| `section` | `py-24 md:py-32` + optional `bg-paper` wash + `data-motion="reveal"` |
| `quote-card` | Serif italic, oversized accent-tinted `"` glyph, attribution row |
| `accordion` | `<details>` + `<summary>`, `group-open:rotate-180` chevron, height animated by Motion |
| `sticky-cta` | `fixed bottom-0 md:hidden` bar — call + book |
| `nav-dropdown` | `<details>` on mobile, hover/focus panel on desktop |
| `stat-count` | Rate figures, counted up by Motion's `animate()` on `inView` |

**Rules**

- **Tailwind utilities only.** No `<style>` blocks, no `.css` files beyond the Tailwind entry point, no inline `style=` attributes — with one exception: JS-driven animation writes to `element.style` and CSS custom properties at runtime, which is expected and fine.
- Repeated patterns use `@apply` inside `assets/css/main.css` — sparingly, and only after a pattern appears 3+ times.
- Every interactive element gets a visible `focus-visible:` ring.
- **Every component must render correctly and completely with JavaScript disabled.** Motion enhances; it never provides content. No element may start at `opacity: 0` in CSS.

---

## 11. Motion System

One library, used in its **vanilla JavaScript** form — no React, no build framework.

| Library | Package | Version | Role |
|---|---|---|---|
| **Motion** *(formerly Framer Motion)* | `motion` | `^13.1` | All UI motion — reveals, scroll, gestures, transitions |

> **On the name:** Framer Motion became an independent project in 2025 and was renamed **Motion**.
> The package is now `motion`; the React bindings live at `motion/react` and the vanilla API at the
> package root. We import from the root — `import { animate, scroll, inView, stagger, hover, press } from "motion"` —
> which is the same animation engine, minus React.

### 11.1 Motion tokens

One shared module so timing is a system, not a per-component guess.

```js
// assets/js/motion/tokens.js
export const ease = {
  out:   [0.22, 1, 0.36, 1],      // signature — reveals, page transitions
  inOut: [0.65, 0, 0.35, 1],      // symmetric — accordions, toggles
  soft:  [0.4, 0, 0.2, 1],        // utility — colour and opacity only
}

export const spring = {
  gentle: { type: 'spring', stiffness: 120, damping: 20 },  // cards, magnetic CTA
  snappy: { type: 'spring', stiffness: 300, damping: 26 },  // menus, chips
}

export const duration = { fast: 0.25, base: 0.45, slow: 0.7, ambient: 1.2 }
```

**Rules:** never animate `width`, `height`, `top` or `left` — only `transform` and `opacity`
(Motion hardware-accelerates these). Accordion height is the one exception and uses
`grid-template-rows: 0fr → 1fr`, which is compositor-friendly. Nothing exceeds `duration.ambient`.

### 11.2 Usage map

| Where | API | Behaviour |
|---|---|---|
| Section reveals | `inView()` + reveal token | Fade-up as each section enters, `once: true` |
| Lists — outcome bullets, testimonials, books | `inView()` + `stagger(0.06)` | Sequential cascade, capped at 12 items then instant |
| Headings | `inView()` + `stagger(0.04)` | Word-by-word masked reveal — see [§11.3](#113-masked-word-reveal) |
| Header | scroll listener | Shadow appears once the page scrolls under the bar |
| Essay pages | `scroll()` | Olive reading-progress bar bound to article extent |
| CTA buttons | `hover()` + `press()` + `spring.gentle` | Magnetic pull toward cursor, max 6 px; scale on press |
| Cards | CSS transition | `-translate-y-1`, shadow `soft → lift` |
| Accordions | `animate()` + `ease.inOut` | Grid-row height + chevron rotation |
| Mobile nav | `animate()` + `stagger(0.04)` | Panel slides, links cascade |
| Rate figures | `animate(0, 185, …)` on `inView` | Count-up, `once: true` |
| Lightbox | `animate()` on `<dialog>` | Scale + fade in |
| Footer | `scroll()` | Content lifts as the reveal panel is uncovered — see [§11.4](#114-the-footer-reveal) |
| Page transitions | **View Transitions API** | See below |

### 11.3 Masked word reveal

Headings marked `data-reveal-words` are split at runtime: each word is wrapped in an
`overflow: hidden` span and slid up from `110%`, staggered by 40 ms.

The wrapping **walks text nodes** rather than splitting `innerHTML` on whitespace. Splitting the
HTML string tears inline tags apart — a heading containing `<span class="text-gold-700">` renders
the attribute as literal text. Element nodes are left intact and recursed into instead.

Markup ships as ordinary readable text, so a JS failure leaves every heading fully visible.

### 11.4 The footer reveal

Three opaque layers, revealed in sequence as the page scrolls:

| Layer | z | Colour |
|---|---|---|
| Page content | 20 | `paper-lighter` |
| Navy footer — links, offices, crisis banner | 10 | `ink-900` |
| Reveal panel — logo + Book Now | 0, pinned | `citron` |

The panel is pinned with **inline styles, not classes**: the footer already carries `relative`, and
Tailwind emits `.relative` after `.fixed`, so a `fixed` class loses the cascade while the spacer
still reserves height — leaving a blank gap. Inline always wins.

It engages only when the panel fits in 92% of the viewport and the window is at least 640 px wide,
so it can never trap content. With JS off, or under reduced motion, the panel sits in normal flow.

### 11.5 Page transitions without a router

Flat PHP means real navigations. The native View Transitions API handles this with **zero JavaScript**:

```css
/* assets/css/main.css */
@view-transition { navigation: auto; }

@media (prefers-reduced-motion: reduce) {
  @view-transition { navigation: none; }
}
```

Unsupported browsers simply navigate normally — no polyfill, no penalty.

### 11.6 The reduced-motion contract

`prefers-reduced-motion: reduce` is honoured as a **hard stop**, not a softening:

- All Motion reveals resolve instantly to their final state (`duration: 0`), never skipped
- Headings render as plain text — no word splitting, no masking
- The footer reveal does not engage; the panel sits in normal flow
- `@view-transition: none`
- No parallax, no magnetic buttons, no count-ups, no auto-advancing carousels

This matters more here than on a typical marketing site: the audience includes people managing
anxiety, vestibular conditions and trauma responses. Motion sensitivity is a clinical reality for
part of this readership, and the reduced-motion path must be a genuinely complete experience.

---

## 12. Tech Stack & Conventions

| Layer | Choice | Rationale |
|---|---|---|
| Templating | **PHP** (flat files + partials) | Matches the existing `index.php`; runs on the current Hostinger plan; no server runtime to manage |
| Styling | **Tailwind CSS v3.4+ — exclusively** | Per project requirement |
| UI motion | **Motion `^13.1`** (vanilla API) | Framer Motion's engine without React |
| CSS build | Tailwind CLI | One dependency, no bundler needed |
| JS build | **esbuild** | Bundles + tree-shakes npm modules for the browser. ~30 ms builds |
| Plugins | `@tailwindcss/typography`, `@tailwindcss/forms` | Prose pages + form styling |
| Fonts | `@fontsource-variable/fraunces`, `@fontsource-variable/inter` | Self-hosted, GDPR-clean, no CLS |
| Icons | Inline SVG (Lucide set, hand-copied) | Zero runtime cost |
| Forms | PHP handler + PHPMailer, honeypot + rate-limit | No third-party service holding client data |
| Images | `.webp` with `.jpg` fallback, explicit `width`/`height` | Prevents layout shift |
| Hosting | Hostinger (existing) | Already provisioned; static output + PHP both supported |
| Analytics | GA4 with anonymised IP + consent gate | Health-adjacent — consent required |

**No React. No Next.js. No jQuery. No Bootstrap. No CSS framework other than Tailwind.**
**No CDN builds in production** — everything is bundled, versioned and self-hosted.

**JavaScript conventions**

- ES modules throughout; `type="module"` with `defer`
- One entry point: `site.js`
- No global state; each module owns its own teardown
- Every DOM query guarded — templates are shared and elements may be absent

---

## 13. Project Structure

```
Dakini Therapy/
├── index.php                     # Home
├── about.php
├── contact.php
├── faq.php
├── rates-and-insurance.php
├── testimonials.php
├── the-journey.php
├── services/
│   ├── index.php
│   ├── individual-therapy.php
│   ├── couples-therapy.php
│   └── workshops.php
├── locations/
│   ├── index.php
│   ├── st-petersburg.php
│   └── tampa-hyde-park-village.php
├── resources/
│   ├── index.php
│   ├── working-with-anger.php
│   ├── working-with-sadness.php
│   └── recommended-books.php
├── legal/
│   ├── privacy.php
│   ├── accessibility.php
│   └── good-faith-estimate.php
├── partials/
│   ├── head.php                  # meta, JSON-LD, font preload
│   ├── header.php                # sticky nav
│   ├── footer.php                # nav + crisis resources + legal
│   ├── sticky-cta.php            # mobile bottom bar
│   └── components/
│       ├── button.php
│       ├── card.php
│       ├── accordion.php
│       ├── quote.php
│       └── section.php
├── data/
│   ├── site.php                  # NAP, hours, rates — single source of truth
│   ├── testimonials.php          # all 15
│   ├── faqs.php
│   ├── books.php                 # ~60 titles
│   └── journey.php               # 22 photo captions
├── lib/
│   ├── contact-handler.php
│   └── schema.php                # JSON-LD builders
├── assets/
│   ├── css/
│   │   ├── main.css              # @tailwind + @view-transition + minimal @apply
│   │   └── build.css             # generated — gitignored
│   ├── js/
│   │   ├── site.js               # entry — the only bundle
│   │   ├── motion/
│   │   │   ├── tokens.js         # durations, easings, springs
│   │   │   ├── reveal.js         # inView + stagger
│   │   │   ├── masked-reveal.js  # word-by-word heading reveal
│   │   │   ├── footer-reveal.js  # pinned reveal panel
│   │   │   ├── scroll.js         # header, progress bar
│   │   │   ├── gestures.js       # magnetic CTA
│   │   │   └── ui.js             # accordion, nav, lightbox, count-up
│   │   └── dist/                 # esbuild output — gitignored
│   ├── img/
│   └── fonts/
├── .htaccess                     # 301 map, HTTPS, caching, security headers
├── robots.txt
├── sitemap.xml
├── tailwind.config.js
├── package.json
└── README.md
```

> **`data/site.php` is the single source of truth** for phone, addresses, hours and rates.
> Every template reads from it. Never hard-code a phone number or a price in a template.

---

## 14. Getting Started

```bash
cd "/Users/boss/Desktop/Dakini Therapy"

# Dependencies
npm install -D tailwindcss @tailwindcss/typography @tailwindcss/forms esbuild
npm install motion
npm install @fontsource-variable/fraunces @fontsource-variable/inter

# Development — three watchers
npm run dev        # runs css + js watchers concurrently
npm run serve      # php -S localhost:8000

# Production
npm run build
```

`package.json`:

```json
{
  "type": "module",
  "scripts": {
    "dev":       "npm-run-all --parallel dev:css dev:js",
    "dev:css":   "tailwindcss -i ./assets/css/main.css -o ./assets/css/build.css --watch",
    "dev:js":    "npm run clean && esbuild assets/js/site.js --bundle --outfile=assets/js/dist/site.js --watch",
    "build":     "npm run build:css && npm run build:js",
    "build:css": "tailwindcss -i ./assets/css/main.css -o ./assets/css/build.css --minify",
    "build:js":  "npm run clean && esbuild assets/js/site.js --bundle --outfile=assets/js/dist/site.js --minify --target=es2020",
    "clean":     "rm -rf assets/js/dist",
    "serve":     "php -S localhost:8000",
    "analyse":   "esbuild assets/js/site.js --bundle --outdir=/tmp/an --metafile=/tmp/meta.json --minify"
  }
}
```

Run `npm run analyse` before a release to confirm the bundle has not grown unexpectedly.

---

## 15. SEO & Compliance

### Per-page requirements

- Exactly **one** `<h1>`, containing the page's primary keyword
- Unique `<title>` ≤ 60 chars and `<meta name="description">` ≤ 155 chars
- `<link rel="canonical">` absolute
- OG + Twitter card tags with a per-page 1200×630 image
- Descriptive `alt` on every image
- **All copy lives in the HTML.** Motion is a decorative layer only — nothing a crawler needs is rendered by JavaScript.

### Structured data (`lib/schema.php`)

| Schema | Where |
|---|---|
| `MedicalBusiness` + `Psychotherapist` | Site-wide, in `head.php` |
| `LocalBusiness` (× 2, with `geo`, `openingHoursSpecification`) | Each location page |
| `Person` (Maureen Drake, credentials, `alumniOf`) | `/about` |
| `Service` + `Offer` (price, currency) | Each service page |
| `FAQPage` | `/faq` |
| `Review` / `AggregateRating` | `/testimonials` |
| `BreadcrumbList` | All nested pages |

### Local SEO targets

`therapist st petersburg fl` · `couples therapy tampa` · `mindfulness therapist hyde park village` ·
`LMHC st pete` · `couples intensive tampa` · `trauma therapist st petersburg`

Ensure NAP consistency between the site, Google Business Profile (both offices), Psychology Today
and the Headway profile.

### `robots.txt`

Replace the inherited Squarespace file. **Decide deliberately whether to keep blocking AI crawlers** —
the current default blocks `anthropic-ai`, `AI2Bot`, `Amazonbot`, `Applebot-Extended` and others,
which removes the practice from AI-assistant recommendations. For a local service business seeking
referrals, allowing them is usually the better call.

### Legal / regulatory

- **Privacy policy** — required; note the site is **not** a HIPAA-covered channel
- **Accessibility statement** — WCAG 2.1 AA conformance claim, including the motion policy in [§16](#16-accessibility)
- **Good Faith Estimate** — No Surprises Act notice for self-pay clients (**federally required**)
- **Contact form disclaimer** — "This form is not secure. Do not include confidential health information."
- **Crisis banner** — 988 Suicide & Crisis Lifeline, in the footer of every page
- **Licence disclosure** — "Maureen Drake, LMHC · Florida Licence #\_\_\_\_" *(number needed from client)*

---

## 16. Accessibility

Target: **WCAG 2.1 Level AA**.

- All colour pairings pre-verified in [§6](#6-colour-system); no combination ships below 4.5:1 for body text
- Full keyboard operability; visible `focus-visible:` ring on every interactive element
- Skip-to-content link as the first focusable element
- Semantic landmarks: `<header>`, `<nav>`, `<main>`, `<aside>`, `<footer>`
- Accordions built on native `<details>`/`<summary>`; lightbox on native `<dialog>`
- Minimum touch target 44 × 44 px
- Forms: real `<label>`s, `aria-describedby` for hints, inline errors announced via `role="alert"`
- Tested with VoiceOver (Safari) and NVDA (Firefox)

**Motion-specific requirements** — non-negotiable, given the audience:

- `prefers-reduced-motion` honoured as a hard stop across DOM and page transitions ([§11.6](#116-the-reduced-motion-contract))
- Nothing flashes more than **3 times per second** (WCAG 2.3.1)
- No motion is triggered by scroll position in a way that could induce vestibular discomfort — reveals are short, single-axis and ≤ 16 px of travel
- The site is fully usable, and looks finished, with JavaScript disabled entirely

---

## 17. Performance Budget

Nothing heavy is loaded. There is one JS bundle, one stylesheet, two self-hosted fonts, and no
runtime dependency beyond Motion.

| Metric | Current site | Target | Measured |
|---|---|---|---|
| Homepage HTML | ~697 KB | < 70 KB | **59.8 KB** |
| CSS (minified, purged) | Squarespace bundle | < 25 KB | **9.4 KB gzip** |
| JS (Motion + UI) | 25 scripts | < 30 KB | **27.8 KB gzip** |
| Total page weight (home) | — | **< 400 KB** | |
| Requests | 25+ scripts alone | **< 20** | |
| **LCP** (mobile 4G) | — | **< 2.0 s** | |
| **CLS** | — | **< 0.05** | |
| **INP** | — | **< 200 ms** | |
| Lighthouse mobile | — | **95+ across all four categories** | |

**Tactics:** purge unused Tailwind at build; self-hosted variable fonts with `preload` + `swap`;
WebP with explicit dimensions; `loading="lazy"` below the fold; click-to-activate map embeds;
inline critical SVG; `.htaccess` far-future caching + Brotli.

---

## 18. Build Roadmap

| Phase | Deliverable |
|---|---|
| **1 — Foundation** | Tailwind config, `data/site.php`, `head`/`header`/`footer` partials, component library, esbuild pipeline, `.htaccess` with the full 301 map |
| **2 — Motion layer** | `motion/tokens.js` + reveal, scroll, gesture and UI modules; View Transitions; reduced-motion contract verified before any page is built on top of it |
| **3 — Core pages** | `/`, `/about`, both service pages, `/contact` |
| **4 — Supporting pages** | Locations, rates, testimonials, FAQ |
| **5 — Content pages** | Resources hub, both essays, recommended books, The Journey |
| **7 — Compliance** | Privacy, accessibility, Good Faith Estimate, crisis resources, schema, sitemap, robots |
| **8 — Polish** | Image optimisation, `npm run analyse` bundle check, Lighthouse pass, a11y audit, VoiceOver + NVDA pass |
| **9 — Launch** | Verify all 301s resolve, submit sitemap to Search Console, GA4 live, GBP updated to new URLs |

The motion layer (phase 2) is a dependency of every page, so it lands before any page is built
on top of it — in particular the reduced-motion path, which must be verified first.

---

## 19. Open Questions for the Client

1. **Florida LMHC licence number** — legally required on the site; not published on the current version.
2. **Online booking** — add scheduling (Cal.com / SimplePractice / Headway deep-link), or keep phone-only? Phone-only is the single largest conversion leak on the current site.
3. **Workshops** — is there upcoming content? If not, hide the page from nav until there is.
4. **Email address** — none is published anywhere. Add one, or route everything through the contact form?
5. **Social profiles** — Instagram / Psychology Today / LinkedIn to link?
6. **Photography** — are there licensed, high-resolution photos of both offices? These carry the design.
7. **Logo** — is there a wordmark/mark, or should one be designed as part of this?
8. **AI crawlers** — keep the inherited Squarespace block, or allow them for referral visibility? ([§15](#15-seo--compliance))
9. **Newsletter** — the Workshops page has a mailing-list signup. Which platform, and should it appear site-wide?
10. **Telehealth** — currently backup-only for existing clients. Should the new site say so explicitly to filter enquiries?

---

## Quick Reference

```
Practice     Dakini Therapy, LLC
Clinician    Maureen 'Ziji' Drake, LMHC
Phone        (561) 343-1985
Headway      care.headway.co/providers/maureen-ziji-drake
St. Pete     675 30th Ave. N., Suite 101, St. Petersburg, FL 33704   Wed/Fri/Sat 8a–8p
Tampa        1405 W. Swann Ave., 2nd Fl, Tampa, FL 33606             Mon/Tue 8a–8p
Rates        Individual $185 · Couples $222 · 2HR Intensive $400
Insurance    Aetna, Oxford, Oscar, UnitedHealthcare (individual only)

Stack        PHP · Tailwind CSS · Motion (vanilla) · esbuild
Build        npm run dev  |  npm run build  |  npm run serve
```
