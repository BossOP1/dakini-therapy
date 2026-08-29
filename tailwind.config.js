/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php', './assets/js/**/*.js'],
  // Accent classes are composed in PHP (e.g. `bg-<?= $accent ?>-500`), so the
  // content scanner never sees a complete class name. Safelist the permutations.
  safelist: [
    { pattern: /^(bg|text|border|from|via|to|ring|decoration)-(gold|olive|ink|sand|paper|citron)-(50|100|300|500|600|700)$/ },
  ],
  theme: {
    extend: {
      colors: {
        // ── The live site's own theme palette ──────────────────────────────
        // Lifted verbatim from the Squarespace 7.1 --*-hsl custom properties on
        // dakini-therapy.com, then extended into tonal scales. Every value below
        // sits on one of those five hues — no colour outside the existing site.
        //   logo navy         212.8, 100%, 10.4%  → ink.DEFAULT   (#001835)
        //   logo gold          41.1,  67%,  57.3%  → gold.DEFAULT  (#DBAD49)
        //   --darkAccent-hsl   56.79, 28.57%, 38.43% → olive.DEFAULT
        //   --lightAccent-hsl  32.73, 17.46%, 87.65% → sand.DEFAULT
        //   --white-hsl         9, 20%,   89%     → paper.DEFAULT
        // --- from the logo: deep navy #001835 -------------------------------
        ink: {
          DEFAULT:'#001835',
          50:'#F2F5F8', 100:'#E0E7F0', 200:'#C1D0E2', 300:'#92ABC9', 400:'#5980B1',
          500:'#385D8A', 600:'#22446D', 700:'#113055', 800:'#062346', 900:'#001835',
        },
        // --- from the logo: gold #DBAD49 (shadow #7D531D, highlight #FBF7C1) -
        gold: {
          DEFAULT:'#DBAD49',
          50:'#FBF7EF', 100:'#F6ECD5', 200:'#EED8AA', 300:'#E6C57F', 400:'#E0B861',
          500:'#DBAD49', 600:'#C79529', 700:'#8C691D', 800:'#765A1E', 900:'#544118',
        },
        olive: {
          DEFAULT:'#7E7B46',
          50:'#F6F6F3', 100:'#EDECE3', 200:'#DCDAC7', 300:'#C6C49F', 400:'#AFAB6F',
          500:'#979354', 600:'#767342', 700:'#5C5A33', 800:'#484628', 900:'#34331D',
        },
        sand: {
          DEFAULT:'#E5E0DA',
          50:'#F6F5F4', 100:'#EBE8E5', 200:'#D8D2CB', 300:'#BFB4A6', 400:'#A2917B',
          500:'#8A7761', 600:'#6C5D4C', 700:'#54493B', 800:'#42392E', 900:'#302922',
        },
        // --- the green: #DADA72, the live site's own --accent-hsl ----------
        citron: {
          DEFAULT:'#DADA72',
          50:'#FBFBEF', 100:'#F6F6DA', 200:'#EEEEB5', 300:'#E5E58A', 400:'#E1E16B',
          500:'#DADA72', 600:'#C1C133', 700:'#919127', 800:'#6F6F1F', 900:'#4F4F17',
        },
        paper: { DEFAULT:'#E9DFDD', light:'#F7F1F0', lighter:'#FBF7F6' },
      },
      fontFamily: {
        display: ['Fraunces', 'Georgia', 'serif'],
        sans:    ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
      },
      borderRadius: { '4xl': '2rem' },
      boxShadow: {
        soft: '0 2px 8px -2px rgb(0 24 53 / 0.07), 0 8px 24px -8px rgb(0 24 53 / 0.12)',
        lift: '0 8px 24px -6px rgb(0 24 53 / 0.14), 0 20px 48px -12px rgb(0 24 53 / 0.16)',
        glow: '0 0 0 1px rgb(140 105 29 / 0.30)',
        curtain: '0 24px 48px -24px rgb(0 24 53 / 0.45)',
      },
      keyframes: {
        // Track holds two identical sets; -50% lands set 2 exactly where set 1
        // began, so the loop is seamless. Spacing lives in the cards' margin
        // rather than a flex gap, or the half-width would be off by half a gap.
        marquee: { '0%': { transform: 'translateX(0)' }, '100%': { transform: 'translateX(-50%)' } },
        fadeUp: { '0%': { opacity:'0', transform:'translateY(16px)' }, '100%': { opacity:'1', transform:'translateY(0)' } },
      },
      animation: {
        marquee: 'marquee 70s linear infinite',
        fadeUp: 'fadeUp 0.7s cubic-bezier(0.22,1,0.36,1) both',
      },
    },
  },
  plugins: [require('@tailwindcss/typography'), require('@tailwindcss/forms')],
}
