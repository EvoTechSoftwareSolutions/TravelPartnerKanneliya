// footer.js — Footer interactions

(function () {
  const sendBtn = document.getElementById('footerSendBtn');
  const msgBox  = document.getElementById('footerMsg');

  if (!sendBtn || !msgBox) return;

  sendBtn.addEventListener('click', function () {
    const msg = msgBox.value.trim();
    if (!msg) {
      msgBox.style.borderColor = 'rgba(255,80,80,0.7)';
      msgBox.focus();
      setTimeout(() => { msgBox.style.borderColor = ''; }, 1500);
      return;
    }

    // Success feedback
    sendBtn.textContent = '✓ Sent!';
    sendBtn.style.borderColor = '#4ecdc4';
    sendBtn.style.color = '#4ecdc4';
    msgBox.value = '';

    setTimeout(() => {
      sendBtn.innerHTML = `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:15px;height:15px">
          <line x1="22" y1="2" x2="11" y2="13"/>
          <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
        SEND
      `;
      sendBtn.style.borderColor = '';
      sendBtn.style.color = '';
    }, 2500);
  });

  // Smooth scroll for footer nav links
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