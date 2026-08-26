import { animate } from 'motion'
import { whenVisible } from './in-view.js'
import { ease, duration, spring, reduced } from './tokens.js'

/** Mobile navigation panel. */
export function initNav() {
  const btn   = document.querySelector('[data-nav-toggle]')
  const panel = document.querySelector('[data-nav-panel]')
  if (!btn || !panel) return

  const links = panel.querySelectorAll('[data-nav-link]')
  let open = false

  const setOpen = (next) => {
    open = next
    btn.setAttribute('aria-expanded', String(open))

    if (open) {
      panel.hidden = false
      if (reduced()) return
      animate(panel, { opacity: [0, 1] }, { duration: duration.fast, ease: ease.out })
      animate(links, { opacity: [0, 1], transform: ['translateY(-6px)', 'translateY(0px)'] },
        { duration: duration.fast, ease: ease.out, delay: (i) => i * 0.04 })
    } else if (reduced()) {
      panel.hidden = true
    } else {
      animate(panel, { opacity: 0 }, { duration: 0.18, ease: ease.soft })
        .then(() => { if (!open) panel.hidden = true })
    }
  }

  btn.addEventListener('click', () => setOpen(!open))
  links.forEach((a) => a.addEventListener('click', () => setOpen(false)))
  addEventListener('keydown', (e) => { if (e.key === 'Escape' && open) setOpen(false) })
  matchMedia('(min-width: 1024px)').addEventListener('change', (e) => { if (e.matches && open) setOpen(false) })
}

/** Accordions: grid-row height is compositor-friendly, unlike animating `height`. */
export function initAccordions() {
  document.querySelectorAll('[data-accordion]').forEach((el) => {
    const body = el.querySelector('[data-accordion-body]')
    if (!body) return

    el.addEventListener('toggle', () => {
      if (reduced()) return
      animate(body,
        { gridTemplateRows: el.open ? '1fr' : '0fr', opacity: el.open ? 1 : 0 },
        { duration: duration.base, ease: ease.inOut })
    })
  })
}

/** Rate figures count up once, when they scroll into view. */
export function initCountUp() {
  const nodes = document.querySelectorAll('[data-count-to]')
  if (!nodes.length) return

  nodes.forEach((node) => {
    const target = Number(node.dataset.countTo)
    if (!Number.isFinite(target)) return

    if (reduced()) { node.textContent = String(target); return }

    node.textContent = '0'
    whenVisible(node, () => {
      animate(0, target, {
        duration: duration.ambient,
        ease: ease.out,
        onUpdate: (v) => { node.textContent = Math.round(v).toString() },
      })
    }, { amount: 0.6 })
  })
}

/** Lightbox for the photo essay. No-op on pages without one. */
export function initLightbox() {
  const dialog = document.querySelector('[data-lightbox]')
  if (!dialog) return

  const img = dialog.querySelector('img')
  const cap = dialog.querySelector('[data-lightbox-caption]')

  document.querySelectorAll('[data-lightbox-open]').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const source = trigger.querySelector('img')
      if (source && img) { img.src = source.currentSrc || source.src; img.alt = source.alt }
      if (cap) cap.textContent = trigger.dataset.caption || ''
      dialog.showModal()
      if (!reduced()) {
        animate(dialog, { opacity: [0, 1], transform: ['scale(0.96)', 'scale(1)'] }, spring.snappy)
      }
    })
  })

  dialog.addEventListener('click', (e) => { if (e.target === dialog) dialog.close() })
}
