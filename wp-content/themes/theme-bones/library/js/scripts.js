// Theme custom scripts
(function() {
  // Mobile menu toggle
  function bindMenuToggle() {
    var btn = document.getElementById('btnMenu');
    var menu = document.getElementById('mobileMenu');
    if (btn && menu) {
      btn.addEventListener('click', function() {
        menu.classList.toggle('hidden');
      });
    }
  }

  // Set year in footer
  function setYear() {
    var y = document.getElementById('year');
    if (y) y.textContent = new Date().getFullYear();
  }

  // Init AOS only for desktop (>=768px)
  function initAOSConditional() {
    var isDesktop = window.matchMedia('(min-width: 768px)').matches;
    if (isDesktop && typeof AOS !== 'undefined') {
      AOS.init({ duration: 800, once: true, offset: 80 });
    } else if (!isDesktop) {
      document.querySelectorAll('[data-aos]').forEach(function(el) {
        el.removeAttribute('data-aos');
        el.removeAttribute('data-aos-delay');
        el.removeAttribute('data-aos-duration');
      });
    }
  }

  function onResize() {
    var nowDesktop = window.matchMedia('(min-width: 768px)').matches;
    if (nowDesktop && typeof AOS !== 'undefined' && !document.documentElement.classList.contains('aos-initialized')) {
      AOS.init({ duration: 800, once: true, offset: 80 });
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    bindMenuToggle();
    setYear();
    initAOSConditional();
    window.addEventListener('resize', onResize);
  });
})();
