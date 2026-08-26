/** Shared motion tokens — timing is a system, not a per-component guess. */
export const ease = {
  out:   [0.22, 1, 0.36, 1],   // signature — reveals, transitions
  inOut: [0.65, 0, 0.35, 1],   // symmetric — accordions, toggles
  soft:  [0.4, 0, 0.2, 1],     // utility — colour and opacity only
}

export const spring = {
  gentle: { type: 'spring', stiffness: 120, damping: 20 },
  snappy: { type: 'spring', stiffness: 300, damping: 26 },
}

export const duration = { fast: 0.25, base: 0.45, slow: 0.7, ambient: 1.2 }

/** True when the visitor has asked for reduced motion. Re-read on every call. */
export const reduced = () =>
  window.matchMedia('(prefers-reduced-motion: reduce)').matches
