import { animate, stagger } from 'motion'
import { ease, duration, reduced } from './tokens.js'
import { whenVisible } from './in-view.js'

const HIDDEN = { opacity: 0, transform: 'translateY(16px)' }
const MAX_STAGGERED = 12

/**
 * Section reveals. Content ships visible in the HTML — we only hide it here,
 * at runtime, once we know JS is alive and motion is welcome. Nothing ever
 * starts at opacity:0 in CSS, so a JS failure can never hide the page.
 */
export function initReveal() {
  if (reduced()) return

  document.querySelectorAll('[data-motion="reveal"], [data-motion="hero"]').forEach((section) => {
    const items = section.matches('[data-motion="hero"]')
      ? [section]
      : Array.from(section.querySelectorAll('[data-motion="item"]'))

    if (!items.length) return

    items.forEach((el) => Object.assign(el.style, HIDDEN))

    whenVisible(section, () => {
      animate(
        items,
        { opacity: 1, transform: 'translateY(0px)' },
        {
          duration: duration.slow,
          ease: ease.out,
          delay: items.length > 1 ? stagger(items.length > MAX_STAGGERED ? 0 : 0.06) : 0,
        }
      )
    }, { amount: 0.15 })
  })
}
