import { animate, scroll } from 'motion'
import { ease, duration } from './tokens.js'

/** Header: solid navy always; gains a shadow once the page scrolls under it. */
export function initHeader() {
  const header = document.querySelector('[data-header]')
  if (!header) return

  let lifted = false
  let ticking = false

  const sync = () => {
    const should = window.scrollY > 8
    if (should !== lifted) {
      lifted = should
      header.classList.toggle('shadow-lift', should)
    }
    ticking = false
  }

  addEventListener('scroll', () => {
    if (!ticking) { ticking = true; requestAnimationFrame(sync) }
  }, { passive: true })
  sync()
}

/** Reading-progress bar for long-form pages (essays). No-op elsewhere. */
export function initProgressBar() {
  const bar = document.querySelector('[data-progress]')
  const article = document.querySelector('article[data-article]')
  if (!bar || !article) return

  scroll(
    animate(bar, { transform: ['scaleX(0)', 'scaleX(1)'] }, { ease: 'linear' }),
    { target: article, offset: ['start start', 'end end'] }
  )
}

export const easeTokens = { ease, duration }
