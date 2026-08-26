/**
 * Entry point — always loaded. Motion + UI only.
 */
import { initReveal } from './motion/reveal.js'
import { initHeader, initProgressBar } from './motion/scroll.js'
import { initMagnetic } from './motion/gestures.js'
import { initNav, initAccordions, initCountUp, initLightbox } from './motion/ui.js'
import { initFooterReveal } from './motion/footer-reveal.js'
import { initMaskedReveal } from './motion/masked-reveal.js'

const boot = () => {
  initHeader()
  initNav()
  initReveal()
  initProgressBar()
  initMagnetic()
  initAccordions()
  initCountUp()
  initLightbox()
  initFooterReveal()
  initMaskedReveal()
}

document.readyState === 'loading'
  ? document.addEventListener('DOMContentLoaded', boot, { once: true })
  : boot()
