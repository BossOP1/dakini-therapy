import { animate, hover, press } from 'motion'
import { spring, reduced } from './tokens.js'

const PULL = 6   // px — maximum magnetic travel

/** Magnetic CTA: the button leans toward the cursor, then springs home. */
export function initMagnetic() {
  if (reduced()) return
  if (!matchMedia('(hover: hover) and (pointer: fine)').matches) return

  document.querySelectorAll('[data-motion="magnetic"]').forEach((el) => {
    let raf = 0

    const move = (e) => {
      cancelAnimationFrame(raf)
      raf = requestAnimationFrame(() => {
        const r = el.getBoundingClientRect()
        const dx = ((e.clientX - (r.left + r.width / 2)) / (r.width / 2)) * PULL
        const dy = ((e.clientY - (r.top + r.height / 2)) / (r.height / 2)) * PULL
        animate(el, { x: dx, y: dy }, spring.gentle)
      })
    }

    hover(el, () => {
      el.addEventListener('pointermove', move)
      return () => {
        el.removeEventListener('pointermove', move)
        cancelAnimationFrame(raf)
        animate(el, { x: 0, y: 0 }, spring.gentle)
      }
    })

    press(el, () => {
      animate(el, { scale: 0.96 }, spring.snappy)
      return () => animate(el, { scale: 1 }, spring.snappy)
    })
  })
}
