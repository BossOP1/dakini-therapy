/**
 * Dakini Therapy — Vanilla JavaScript
 * Zero dependencies, zero build step required.
 */
document.addEventListener('DOMContentLoaded', () => {
  const isReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches

  // ── 1. Header & Logo Scroll Behavior ────────────────────────
  const header = document.querySelector('[data-header]')
  const logo = header ? header.querySelector('[data-logo]') : null

  if (header) {
    let ticking = false
    const syncHeader = () => {
      const isScrolled = window.scrollY > 20
      header.classList.toggle('shadow-lift', isScrolled)

      // Only pages that opted into the overlay treatment fade between states.
      // A solid header must stay solid, or its white nav becomes unreadable.
      if (header.hasAttribute('data-header-overlay')) {
        header.classList.toggle('bg-ink/95', isScrolled)
        header.classList.toggle('bg-ink/20', !isScrolled)
        if (logo) {
          logo.classList.toggle('brightness-0', !isScrolled)
          logo.classList.toggle('invert', !isScrolled)
        }
      }
      ticking = false
    }

    window.addEventListener('scroll', () => {
      if (!ticking) {
        ticking = true
        requestAnimationFrame(syncHeader)
      }
    }, { passive: true })
    syncHeader()
  }

  // ── 2. Mobile Nav Drawer ───────────────────────────────────
  const navBtn = document.querySelector('[data-nav-toggle]')
  const navPanel = document.querySelector('[data-nav-panel]')

  if (navBtn && navPanel) {
    let isOpen = false
    const toggleNav = (open) => {
      isOpen = open
      navBtn.setAttribute('aria-expanded', String(isOpen))
      navPanel.hidden = !isOpen
    }

    navBtn.addEventListener('click', () => toggleNav(!isOpen))
    navPanel.querySelectorAll('[data-nav-link]').forEach(a => {
      a.addEventListener('click', () => toggleNav(false))
    })
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && isOpen) toggleNav(false)
    })
  }

  // ── 3. Scroll Reveal Animation ─────────────────────────────
  if (!isReduced && 'IntersectionObserver' in window) {
    const revealElements = document.querySelectorAll('[data-motion="reveal"], [data-motion="hero"]')
    revealElements.forEach(container => {
      const items = container.matches('[data-motion="hero"]')
        ? [container]
        : Array.from(container.querySelectorAll('[data-motion="item"]'))

      if (!items.length) return

      items.forEach((el, index) => {
        el.style.opacity = '0'
        el.style.transform = 'translateY(18px)'
        el.style.transition = `opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1) ${index * 0.05}s, transform 0.7s cubic-bezier(0.22, 1, 0.36, 1) ${index * 0.05}s`
      })

      const show = () => items.forEach(el => {
        el.style.opacity = '1'
        el.style.transform = 'translateY(0px)'
      })

      // Already on screen? Show it now. The observer is an enhancement — it must
      // never be the only route to visible, or a missed callback hides the
      // content for good.
      const box = container.getBoundingClientRect()
      if (box.top < window.innerHeight && box.bottom > 0 && box.height > 0) {
        show()
        return
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            show()
            observer.unobserve(entry.target)
          }
        })
      }, { threshold: 0.05 })

      observer.observe(container)

      // Last-resort safety net: if nothing has revealed it within 3s, reveal it.
      setTimeout(() => {
        if (items[0] && items[0].style.opacity === '0') show()
      }, 3000)
    })
  }

  // ── 4. Count-Up Numbers ────────────────────────────────────
  const countNodes = document.querySelectorAll('[data-count-to]')
  if (countNodes.length) {
    countNodes.forEach(node => {
      const target = Number(node.dataset.countTo)
      if (!Number.isFinite(target)) return
      if (isReduced) { node.textContent = String(target); return }

      node.textContent = '0'
      const obs = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          const duration = 1200
          const start = performance.now()
          const step = (now) => {
            const progress = Math.min((now - start) / duration, 1)
            const ease = 1 - Math.pow(1 - progress, 3)
            node.textContent = Math.round(ease * target).toString()
            if (progress < 1) requestAnimationFrame(step)
          }
          requestAnimationFrame(step)
          obs.unobserve(node)
        }
      }, { threshold: 0.5 })
      obs.observe(node)
    })
  }

  // ── 5. Services 3D Peeking Carousel Stage ──────────────────
  const container = document.getElementById('services-slider-container')
  const pills = Array.from(document.querySelectorAll('[data-service-tab]'))
  const dots = Array.from(document.querySelectorAll('[data-slider-dot]'))
  const prevBtn = document.querySelector('[data-slider-prev]')
  const nextBtn = document.querySelector('[data-slider-next]')

  if (container) {
    const slides = Array.from(container.querySelectorAll('[data-service-slide]'))
    const total = slides.length
    let activeIndex = 0
    let autoPlayTimer = null

    const updateStage = () => {
      const isMobile = window.innerWidth < 768
      const shiftPercent = isMobile ? 32 : 44

      slides.forEach((slide, i) => {
        // Calculate relative position around the circle: 0 = center, 1 = right, -1 = left
        let diff = (i - activeIndex) % total
        if (diff < -Math.floor(total / 2)) diff += total
        if (diff > Math.floor(total / 2)) diff -= total

        if (diff === 0) {
          // Center active card
          slide.style.transform = 'translateX(0%) scale(1)'
          slide.style.opacity = '1'
          slide.style.zIndex = '20'
          slide.style.pointerEvents = 'auto'
          slide.style.cursor = 'default'
          slide.style.visibility = 'visible'
          slide.classList.add('shadow-lift')
        } else if (diff === 1 || (total === 2 && diff === -1)) {
          // Right peeking card
          slide.style.transform = `translateX(${shiftPercent}%) scale(0.92)`
          slide.style.opacity = '0.5'
          slide.style.zIndex = '10'
          slide.style.pointerEvents = 'auto'
          slide.style.cursor = 'pointer'
          slide.style.visibility = 'visible'
          slide.classList.remove('shadow-lift')
        } else if (diff === -1) {
          // Left peeking card
          slide.style.transform = `translateX(-${shiftPercent}%) scale(0.92)`
          slide.style.opacity = '0.5'
          slide.style.zIndex = '10'
          slide.style.pointerEvents = 'auto'
          slide.style.cursor = 'pointer'
          slide.style.visibility = 'visible'
          slide.classList.remove('shadow-lift')
        } else {
          // Offstage cards (if more than 3)
          slide.style.transform = diff > 0 ? 'translateX(100%) scale(0.8)' : 'translateX(-100%) scale(0.8)'
          slide.style.opacity = '0'
          slide.style.zIndex = '0'
          slide.style.pointerEvents = 'none'
          slide.style.visibility = 'hidden'
        }
      })

      // Sync Category Pills
      pills.forEach((pill, i) => {
        const isActive = i === activeIndex
        pill.classList.toggle('border-ink', isActive)
        pill.classList.toggle('bg-ink', isActive)
        pill.classList.toggle('text-paper-lighter', isActive)
        pill.classList.toggle('shadow-soft', isActive)
        pill.classList.toggle('border-sand-300/80', !isActive)
        pill.classList.toggle('bg-paper-lighter', !isActive)
        pill.classList.toggle('text-sand-700', !isActive)
      })

      // Sync Dots
      dots.forEach((dot, i) => {
        const isActive = i === activeIndex
        dot.classList.toggle('w-8', isActive)
        dot.classList.toggle('bg-ink', isActive)
        dot.classList.toggle('w-2.5', !isActive)
        dot.classList.toggle('bg-sand-400', !isActive)
      })
    }

    const goToSlide = (index) => {
      activeIndex = (index + total) % total
      updateStage()
    }

    // Auto-advance loop (every 5 seconds)
    const startAutoPlay = () => {
      stopAutoPlay()
      autoPlayTimer = setInterval(() => {
        goToSlide(activeIndex + 1)
      }, 5000)
    }

    const stopAutoPlay = () => {
      if (autoPlayTimer) {
        clearInterval(autoPlayTimer)
        autoPlayTimer = null
      }
    }

    // Initial render
    updateStage()
    window.addEventListener('resize', updateStage, { passive: true })
    startAutoPlay()

    // Hover pause
    container.addEventListener('mouseenter', stopAutoPlay)
    container.addEventListener('mouseleave', startAutoPlay)

    // Click on cards
    slides.forEach((slide, idx) => {
      slide.addEventListener('click', (e) => {
        if (idx !== activeIndex && !e.target.closest('a') && !e.target.closest('button')) {
          e.preventDefault()
          goToSlide(idx)
        }
      })
    })

    // Pill click
    pills.forEach((pill) => {
      pill.addEventListener('click', (e) => {
        e.preventDefault()
        goToSlide(Number(pill.dataset.serviceTab))
      })
    })

    // Dot click
    dots.forEach((dot) => {
      dot.addEventListener('click', (e) => {
        e.preventDefault()
        goToSlide(Number(dot.dataset.sliderDot))
      })
    })

    // Arrow clicks
    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.preventDefault()
        goToSlide(activeIndex - 1)
      })
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.preventDefault()
        goToSlide(activeIndex + 1)
      })
    }

    // Touch Swipe support
    let touchStartX = 0
    let touchEndX = 0
    container.addEventListener('touchstart', (e) => {
      stopAutoPlay()
      touchStartX = e.changedTouches[0].screenX
    }, { passive: true })
    container.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX
      if (touchStartX - touchEndX > 50) goToSlide(activeIndex + 1)
      if (touchEndX - touchStartX > 50) goToSlide(activeIndex - 1)
      startAutoPlay()
    }, { passive: true })
  }

  // ── 6. Testimonial "Read more" ────────────────────────────
  document.querySelectorAll('[data-clamp]').forEach(quote => {
    const toggle = quote.parentElement.querySelector('[data-clamp-toggle]')
    if (!toggle) return

    // Only offer it where the text is genuinely cut off. Short reviews get no
    // button at all, rather than a control that does nothing.
    const clipped = () => quote.scrollHeight > quote.clientHeight + 2
    if (!clipped()) return
    toggle.hidden = false

    toggle.addEventListener('click', () => {
      const open = quote.classList.toggle('line-clamp-none')
      toggle.textContent = open ? 'Read less' : 'Read more'
    })
  })

  // ── 6. Gallery Lightbox ────────────────────────────────────
  const lightbox = document.querySelector('[data-lightbox]')
  if (lightbox) {
    const img = lightbox.querySelector('img')
    const cap = lightbox.querySelector('[data-lightbox-caption]')

    document.querySelectorAll('[data-lightbox-open]').forEach(trigger => {
      trigger.addEventListener('click', () => {
        img.src = trigger.dataset.full
        img.alt = trigger.dataset.caption || ''
        if (cap) cap.textContent = trigger.dataset.caption || ''
        lightbox.showModal()
      })
    })

    // Clicking the backdrop closes it. The dialog fills the whole viewport, so
    // compare against the figure's box rather than the event target.
    lightbox.addEventListener('click', e => {
      const box = lightbox.querySelector('figure').getBoundingClientRect()
      const outside = e.clientX < box.left || e.clientX > box.right ||
                      e.clientY < box.top  || e.clientY > box.bottom
      if (outside) lightbox.close()
    })
    lightbox.querySelector('[data-lightbox-close]')
      ?.addEventListener('click', () => lightbox.close())

    // Release the image once closed, so a long gallery does not hold every
    // full-size file in memory.
    lightbox.addEventListener('close', () => { img.removeAttribute('src') })
  }

  // ── 6. Green Section Curtain Reveal ────────────────────────
  const greenPanel = document.querySelector('[data-green-reveal]')
  const mainFooter = document.querySelector('[data-main-footer]')

  if (greenPanel && mainFooter) {
    const syncReveal = () => {
      const h = greenPanel.offsetHeight
      mainFooter.style.marginBottom = `${h}px`
    }

    syncReveal()
    window.addEventListener('resize', syncReveal, { passive: true })
    window.addEventListener('load', syncReveal, { passive: true })
    setTimeout(syncReveal, 150)
    setTimeout(syncReveal, 600)
  }
})

