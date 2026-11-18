(function () {
  // Sticky header shadow
  var header = document.getElementById('header');
  window.addEventListener('scroll', function () {
    header.classList.toggle('is-scrolled', window.scrollY > 20);
  }, { passive: true });

  // Mobile drawer
  var drawer = document.getElementById('drawer');
  document.getElementById('burger').addEventListener('click', function () { drawer.classList.add('is-open'); });
  document.getElementById('drawerClose').addEventListener('click', function () { drawer.classList.remove('is-open'); });
  drawer.addEventListener('click', function (e) {
    if (e.target === drawer || e.target.tagName === 'A') drawer.classList.remove('is-open');
  });

  // Hero slider
  var slides = document.querySelectorAll('.hero__slide');
  var dots = document.querySelectorAll('.hero__dot');
  var current = 0, timer;
  function go(i) {
    slides[current].classList.remove('is-active');
    dots[current].classList.remove('is-active');
    current = (i + slides.length) % slides.length;
    slides[current].classList.add('is-active');
    // restart progress animation
    void dots[current].offsetWidth;
    dots[current].classList.add('is-active');
    clearInterval(timer);
    timer = setInterval(function () { go(current + 1); }, 6000);
  }
  dots.forEach(function (d, i) { d.addEventListener('click', function () { go(i); }); });
  document.getElementById('heroPrev').addEventListener('click', function () { go(current - 1); });
  document.getElementById('heroNext').addEventListener('click', function () { go(current + 1); });
  timer = setInterval(function () { go(current + 1); }, 6000);

  // Generic tabs: buttons with data-{key} toggle #{prefix}-{value}
  function tabs(buttonSel, attr, prefix, panelSel) {
    var buttons = document.querySelectorAll(buttonSel);
    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('is-active'); });
        document.querySelectorAll(panelSel).forEach(function (p) { p.classList.remove('is-active'); });
        btn.classList.add('is-active');
        var panel = document.getElementById(prefix + btn.getAttribute(attr));
        panel.classList.add('is-active', 'is-in');
      });
    });
  }
  tabs('.brand-list button', 'data-brand', 'brand-', '.brand-panel');
  tabs('.aud-tab', 'data-aud', 'aud-', '.aud-panel');

  // Reveal on scroll + counters
  function countUp(el) {
    var target = +el.getAttribute('data-count');
    var start = performance.now(), dur = 1600;
    function step(now) {
      var p = Math.min((now - start) / dur, 1);
      el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))).toLocaleString();
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      var el = entry.target;
      var siblings = el.parentElement.querySelectorAll(':scope > .reveal');
      var idx = Array.prototype.indexOf.call(siblings, el);
      el.style.transitionDelay = (idx > 0 ? Math.min(idx, 6) * 80 : 0) + 'ms';
      el.classList.add('is-in');
      el.querySelectorAll('[data-count]').forEach(countUp);
      io.unobserve(el);
    });
  }, { threshold: 0.15 });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

  // Projects gallery lightbox
  var gallery = document.querySelector('[data-gallery]');
  var lightbox = document.getElementById('lightbox');
  if (gallery && lightbox) {
    var items = Array.prototype.slice.call(gallery.querySelectorAll('.gallery__item'));
    var lbImg = lightbox.querySelector('img');
    var lbCap = lightbox.querySelector('figcaption');
    var lbClose = lightbox.querySelector('.lightbox__close');
    var lbIndex = 0, lastFocus = null;
    function show(i) {
      lbIndex = (i + items.length) % items.length;
      var it = items[lbIndex];
      lbImg.src = it.getAttribute('href');
      lbImg.alt = it.querySelector('img').alt;
      lbCap.textContent = it.getAttribute('data-caption') || '';
    }
    function openLb(i) {
      lastFocus = document.activeElement;
      show(i);
      lightbox.hidden = false;
      document.documentElement.classList.add('lightbox-open');
      setTimeout(function () { lbClose.focus(); }, 30);
    }
    function closeLb() {
      lightbox.hidden = true;
      document.documentElement.classList.remove('lightbox-open');
      if (lastFocus) lastFocus.focus({ preventScroll: true });
    }
    items.forEach(function (it, i) {
      it.addEventListener('click', function (e) { e.preventDefault(); openLb(i); });
    });
    lbClose.addEventListener('click', closeLb);
    lightbox.querySelector('.lightbox__nav--prev').addEventListener('click', function () { show(lbIndex - 1); });
    lightbox.querySelector('.lightbox__nav--next').addEventListener('click', function () { show(lbIndex + 1); });
    lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLb(); });
    document.addEventListener('keydown', function (e) {
      if (lightbox.hidden) return;
      if (e.key === 'Escape') closeLb();
      if (e.key === 'ArrowLeft') show(lbIndex - 1);
      if (e.key === 'ArrowRight') show(lbIndex + 1);
    });
  }
})();
