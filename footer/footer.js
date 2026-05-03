// footer.js — Footer interactions

(function () {
  const sendBtn = document.getElementById('footerSendBtn');
  const msgBox  = document.getElementById('footerMsg');
  const note    = document.getElementById('footerNote');

  if (!sendBtn || !msgBox) return;

  sendBtn.addEventListener('click', function () {
    const msg = msgBox.value.trim();

    if (!msg) {
      msgBox.style.borderColor = 'rgba(255, 80, 80, 0.7)';
      msgBox.focus();
      setTimeout(() => { msgBox.style.borderColor = ''; }, 1500);
      return;
    }

    // Open WhatsApp with the message pre-filled
    const phone   = '94760487277'; // replace with actual number (no + or spaces)
    const encoded = encodeURIComponent(msg);
    window.open(`https://wa.me/${phone}?text=${encoded}`, '_blank');

    // Success feedback
    if (note) {
      note.textContent = 'Opening WhatsApp...';
      note.classList.add('visible');
    }

    sendBtn.style.opacity = '0.6';
    sendBtn.style.pointerEvents = 'none';
    msgBox.value = '';

    setTimeout(() => {
      sendBtn.style.opacity = '';
      sendBtn.style.pointerEvents = '';
      if (note) {
        note.textContent = '';
        note.classList.remove('visible');
      }
    }, 3000);
  });

  // Smooth scroll for footer nav anchor links
  document.querySelectorAll('.footer-nav a').forEach(link => {
    link.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
})();