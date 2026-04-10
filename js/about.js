/* ============================================
   KANNELIYA — About Section JS
   about.js
   ============================================ */

(function () {
  'use strict';

  /* IDs to observe and animate */
  var targets = [
    'aboutEyebrow',
    'aboutHeading',
    'aboutImgTop',
    'aboutImgMain',
    'aboutImgBtm',
    'aboutExploreBtn',
    'aboutTxt1',
    'aboutTxt2',
    'aboutTxt3'
  ];

  /* If IntersectionObserver supported */
  if (!('IntersectionObserver' in window)) {
    /* Fallback: show all immediately */
    targets.forEach(function (id) {
      var el = document.getElementById(id);
      if (el) el.classList.add('visible');
    });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  targets.forEach(function (id) {
    var el = document.getElementById(id);
    if (el) observer.observe(el);
  });

  /* Trigger immediately for elements already in viewport on load */
  window.addEventListener('load', function () {
    targets.forEach(function (id) {
      var el = document.getElementById(id);
      if (!el) return;
      var rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight) {
        el.classList.add('visible');
        observer.unobserve(el);
      }
    });
  });

})();
