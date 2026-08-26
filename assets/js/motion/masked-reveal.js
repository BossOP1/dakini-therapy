import { animate, stagger } from 'motion'
import { ease, reduced } from './tokens.js'
import { whenVisible } from './in-view.js'

/**
 * Word-by-word masked reveal — the reference does this with GSAP ScrollTrigger;
 * Motion is already in the bundle, so this uses inView + stagger instead.
 *
 * Each word is wrapped in an overflow-hidden span and slid up from 110%.
 * The wrapping happens at runtime, so the markup ships as plain readable text
 * and a JS failure leaves the copy fully visible.
 */
function makeMask(word) {
  const mask = document.createElement('span')
  mask.style.display = 'inline-block'
  mask.style.overflow = 'hidden'
  mask.style.verticalAlign = 'bottom'
  mask.style.paddingBottom = '0.1em'   // descenders would clip otherwise

  const inner = document.createElement('span')
  inner.style.display = 'inline-block'
  inner.style.transform = 'translateY(110%)'
  inner.style.willChange = 'transform'
  inner.className = 'reveal-word'
  inner.textContent = word

  mask.appendChild(inner)
  return mask
}

/**
 * Walk the tree and wrap only the words inside text nodes, so nested markup —
 * <br>, and inline spans that colour part of a heading — survives intact.
 * Splitting innerHTML on whitespace instead would tear those tags apart.
 */
function wrapWords(node) {
  Array.from(node.childNodes).forEach((child) => {
    if (child.nodeType === Node.ELEMENT_NODE) {
      if (child.tagName !== 'BR') wrapWords(child)
      return
    }
    if (child.nodeType !== Node.TEXT_NODE) return

    const parts = child.textContent.split(/(\s+)/)
    if (!parts.some((part) => part.trim())) return

    const fragment = document.createDocumentFragment()
    parts.forEach((part) => {
      if (!part) return
      if (!part.trim()) fragment.appendChild(document.createTextNode(' '))
      else fragment.appendChild(makeMask(part))
    })
    child.replaceWith(fragment)
  })
}

export function initMaskedReveal() {
  const targets = document.querySelectorAll('[data-reveal-words]')
  if (!targets.length || reduced()) return

  targets.forEach((el) => {
    wrapWords(el)
    const words = el.querySelectorAll('.reveal-word')
    if (!words.length) return

    whenVisible(el, () => {
      animate(words,
        { transform: ['translateY(110%)', 'translateY(0%)'] },
        { duration: 0.85, ease: ease.out, delay: stagger(0.04) })
    }, { amount: 0.1 })
  })
}
