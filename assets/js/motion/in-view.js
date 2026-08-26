import { inView } from 'motion'

/**
 * Run `onEnter` when the element is on screen.
 *
 * If it is ALREADY within the viewport at init, run immediately rather than
 * waiting for IntersectionObserver. Content is hidden by JS before this point,
 * so a callback that never fires would leave it invisible for good — the
 * observer is an optimisation, never the only path to visible.
 */
export function whenVisible(element, onEnter, options = {}) {
  const box = element.getBoundingClientRect()
  const onScreen = box.top < innerHeight && box.bottom > 0 && box.height > 0

  if (onScreen) {
    onEnter()
    return
  }

  inView(element, () => {
    onEnter()
    return () => {}
  }, options)
}
