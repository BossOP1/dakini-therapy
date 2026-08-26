import { animate, scroll } from 'motion'
import { reduced } from './tokens.js'

/**
 * Footer reveal: the footer is pinned to the bottom of the viewport and the page
 * content slides up over it, uncovering it as you reach the end.
 *
 * Progressive enhancement — with JS off (or reduced motion, or a footer too tall
 * for the viewport) the footer stays in normal flow and the page is unaffected.
 */
export function initFooterReveal() {
  const footer = document.querySelector('[data-footer-reveal]')
  const main   = document.querySelector('main')
  if (!footer || !main || reduced()) return

  const spacer = document.createElement('div')
  spacer.setAttribute('aria-hidden', 'true')
  spacer.style.height = '0px'
  footer.parentNode.insertBefore(spacer, footer)

  // Pin via inline styles, not classes: the footer already carries `relative`
  // for its glow layer, and Tailwind emits `.relative` after `.fixed`, so a
  // `fixed` class would lose the cascade. Inline always wins.
  let pinned = false

  const unpin = () => {
    footer.style.position = ''
    footer.style.left = footer.style.right = footer.style.bottom = ''
    footer.style.zIndex = ''
    spacer.style.height = '0px'
    pinned = false
  }

  const sync = () => {
    if (pinned) unpin()                       // measure in natural flow
    const h = footer.offsetHeight
    // Only engage when the footer comfortably fits — otherwise it would trap content.
    if (h <= innerHeight * 0.92 && innerWidth >= 640) {
      footer.style.position = 'fixed'
      footer.style.left = '0'
      footer.style.right = '0'
      footer.style.bottom = '0'
      footer.style.zIndex = '0'
      spacer.style.height = `${h}px`
      pinned = true
    }
  }

  let t = 0
  const debounced = () => { clearTimeout(t); t = setTimeout(sync, 150) }

  sync()
  addEventListener('resize', debounced, { passive: true })
  // Re-measure once webfonts have settled, which can change the footer's height.
  if (document.fonts?.ready) document.fonts.ready.then(sync)

  // Footer content lifts into place as it is uncovered.
  const inner = footer.querySelector('[data-footer-inner]')
  if (inner) {
    scroll(
      animate(inner,
        { transform: ['translateY(48px)', 'translateY(0px)'], opacity: [0.4, 1] },
        { ease: 'linear' }),
      { target: spacer, offset: ['start end', 'end end'] }
    )
  }
}
