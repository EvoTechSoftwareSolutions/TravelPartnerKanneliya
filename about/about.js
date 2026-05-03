/* ============================================================
   about.js — Contact Form Handler
   Travel Partner Kanneliya
============================================================ */

(function () {
  'use strict';

  // ── Country selector (runs immediately when DOM is ready) ─────────────────
  // NOTE: The country dropdown logic is already in its own IIFE below.
  //       This file handles form submission only.

  // ── Form submit ───────────────────────────────────────────────────────────
  document.addEventListener('DOMContentLoaded', function () {

    const submitBtn = document.querySelector('.ct--sec01--submitbtn');
    if (!submitBtn) return;

    submitBtn.addEventListener('click', function () {
      sendMessage();
    });

  });

  function sendMessage() {

    // ── Grab values ───────────────────────────────────────────────────────
    const fname   = (document.querySelector('.ct--sec01--formpanel input[placeholder="Enter Your First Name"]')?.value   || '').trim();
    const lname   = (document.querySelector('.ct--sec01--formpanel input[placeholder="Enter Your Last Name"]')?.value    || '').trim();
    const email   = (document.querySelector('.ct--sec01--formpanel input[type="email"]')?.value                          || '').trim();
    const mobile  = (document.getElementById('ctMobileInput')?.value                                                     || '').trim();
    const message = (document.querySelector('.ct--sec01--textarea')?.value                                               || '').trim();
    const countryCode = (document.getElementById('ctSelCode')?.textContent || '+94').trim();

    // Combine country code + number (digits only)
    const phone = countryCode + mobile.replace(/\D/g, '');

    // ── Client-side validation ─────────────────────────────────────────────
    if (!fname) { showAlert('Please enter your first name.', 'error'); return; }
    if (!lname) { showAlert('Please enter your last name.',  'error'); return; }
    if (!email || !isValidEmail(email)) { showAlert('Please enter a valid email address.', 'error'); return; }
    if (!mobile) { showAlert('Please enter your mobile number.', 'error'); return; }
    if (!message) { showAlert('Please enter your message.', 'error'); return; }

    // ── Build form data ───────────────────────────────────────────────────
    const f = new FormData();
    f.append('fname',   fname);
    f.append('lname',   lname);
    f.append('phone',   phone);
    f.append('email',   email);
    f.append('message', message);

    // ── Disable button & show loading state ───────────────────────────────
    const btn = document.querySelector('.ct--sec01--submitbtn');
    setButtonLoading(btn, true);

    // ── AJAX request ──────────────────────────────────────────────────────
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState !== 4) return;

      setButtonLoading(btn, false);

      if (xhr.responseText === 'Message Sent successfully') {

        // Clear form fields
        clearForm();

        showAlert('Your message has been sent! We\'ll get back to you soon.', 'success');

      } else {
        showAlert(xhr.responseText || 'Something went wrong. Please try again.', 'error');
      }
    };

    xhr.open('POST', '/mail/sendEmailProcess.php', true);
    xhr.send(f);
  }

  // ── Helpers ───────────────────────────────────────────────────────────────

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function clearForm() {
    const panel = document.querySelector('.ct--sec01--formpanel');
    if (!panel) return;
    panel.querySelectorAll('input, textarea').forEach(function (el) {
      el.value = '';
    });
  }

  function setButtonLoading(btn, loading) {
    if (!btn) return;
    if (loading) {
      btn.disabled = true;
      btn.dataset.originalText = btn.innerHTML;
      btn.innerHTML = `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             style="width:14px;height:14px;animation:tpkSpin 0.9s linear infinite;">
          <circle cx="12" cy="12" r="10" stroke-dasharray="32" stroke-dashoffset="10"/>
        </svg>
        Sending…`;
    } else {
      btn.disabled = false;
      if (btn.dataset.originalText) {
        btn.innerHTML = btn.dataset.originalText;
      }
    }
  }

  // ── Toast / Alert ─────────────────────────────────────────────────────────
  function showAlert(msg, type) {

    // Remove existing toast
    const existing = document.getElementById('tpk--toast');
    if (existing) existing.remove();

    const isSuccess = type === 'success';

    const toast = document.createElement('div');
    toast.id = 'tpk--toast';
    toast.innerHTML = `
      <span style="font-size:18px;">${isSuccess ? '✓' : '✕'}</span>
      <span>${msg}</span>
    `;

    Object.assign(toast.style, {
      position:       'fixed',
      bottom:         '32px',
      right:          '32px',
      zIndex:         '99999',
      display:        'flex',
      alignItems:     'center',
      gap:            '12px',
      padding:        '14px 22px',
      borderRadius:   '8px',
      background:     isSuccess ? '#0f3a34' : '#3a1010',
      border:         `1px solid ${isSuccess ? 'rgba(78,205,196,0.6)' : 'rgba(220,80,80,0.6)'}`,
      color:          isSuccess ? '#4ecdc4' : '#e57373',
      fontFamily:     "'Jost', sans-serif",
      fontSize:       '14px',
      fontWeight:     '400',
      letterSpacing:  '0.02em',
      boxShadow:      '0 8px 32px rgba(0,0,0,0.5)',
      opacity:        '0',
      transform:      'translateY(16px)',
      transition:     'opacity 0.35s ease, transform 0.35s ease',
      maxWidth:       '360px',
      lineHeight:     '1.5',
    });

    document.body.appendChild(toast);

    // Animate in
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        toast.style.opacity   = '1';
        toast.style.transform = 'translateY(0)';
      });
    });

    // Auto-remove after 5 s
    setTimeout(function () {
      toast.style.opacity   = '0';
      toast.style.transform = 'translateY(16px)';
      setTimeout(function () { toast.remove(); }, 400);
    }, 5000);
  }

  // ── Spinner keyframe (injected once) ─────────────────────────────────────
  if (!document.getElementById('tpk--spin-style')) {
    const style = document.createElement('style');
    style.id = 'tpk--spin-style';
    style.textContent = '@keyframes tpkSpin { to { transform: rotate(360deg); } }';
    document.head.appendChild(style);
  }

})();


/* ============================================================
   Country Selector
============================================================ */
(function () {

  const COUNTRIES = [
    { flag:"🇱🇰", name:"Sri Lanka",     code:"+94",  fmt:"07X XXXXXXX" },
    { flag:"🇮🇳", name:"India",          code:"+91",  fmt:"XXXXX XXXXX" },
    { flag:"🇺🇸", name:"United States",  code:"+1",   fmt:"(XXX) XXX-XXXX" },
    { flag:"🇬🇧", name:"United Kingdom", code:"+44",  fmt:"07XXX XXXXXX" },
    { flag:"🇦🇺", name:"Australia",      code:"+61",  fmt:"04XX XXX XXX" },
    { flag:"🇩🇪", name:"Germany",        code:"+49",  fmt:"0XXX XXXXXXX" },
    { flag:"🇫🇷", name:"France",         code:"+33",  fmt:"0X XX XX XX XX" },
    { flag:"🇸🇬", name:"Singapore",      code:"+65",  fmt:"XXXX XXXX" },
    { flag:"🇯🇵", name:"Japan",          code:"+81",  fmt:"0XX-XXXX-XXXX" },
    { flag:"🇦🇪", name:"UAE",            code:"+971", fmt:"05X XXX XXXX" },
    { flag:"🇸🇦", name:"Saudi Arabia",   code:"+966", fmt:"05X XXX XXXX" },
    { flag:"🇲🇾", name:"Malaysia",       code:"+60",  fmt:"0XX-XXX XXXX" },
    { flag:"🇵🇰", name:"Pakistan",       code:"+92",  fmt:"03XX XXXXXXX" },
    { flag:"🇧🇩", name:"Bangladesh",     code:"+880", fmt:"017X XXXXXXX" },
    { flag:"🇳🇿", name:"New Zealand",    code:"+64",  fmt:"02X XXX XXXX" },
    { flag:"🇵🇭", name:"Philippines",    code:"+63",  fmt:"09XX XXX XXXX" },
    { flag:"🇮🇩", name:"Indonesia",      code:"+62",  fmt:"08XX XXXX XXXX" },
    { flag:"🇹🇭", name:"Thailand",       code:"+66",  fmt:"0X XXXX XXXX" },
    { flag:"🇷🇺", name:"Russia",         code:"+7",   fmt:"8 (XXX) XXX-XX-XX" },
    { flag:"🇿🇦", name:"South Africa",   code:"+27",  fmt:"0XX XXX XXXX" },
  ];

  let open          = false;
  let selectedIndex = 0;

  // Wait for DOM
  document.addEventListener('DOMContentLoaded', function () {

    const btn    = document.getElementById('ctCountryBtn');
    const dd     = document.getElementById('ctCountryDropdown');
    const chev   = document.getElementById('ctChevron');
    const search = document.getElementById('ctCountrySearch');
    const list   = document.getElementById('ctCountryList');
    const flag   = document.getElementById('ctSelFlag');
    const code   = document.getElementById('ctSelCode');
    const note   = document.getElementById('ctFormatNote');

    if (!btn) return;

    function render(data) {
      list.innerHTML = data.map(function (c) {
        const i = COUNTRIES.indexOf(c);
        return '<div class="ct--country--option" data-i="' + i + '">' +
          '<span>' + c.flag + '</span>' +
          '<span class="cn">' + c.name + '</span>' +
          '<span class="cc">' + c.code + '</span>' +
          '</div>';
      }).join('');

      list.querySelectorAll('.ct--country--option').forEach(function (el) {
        el.addEventListener('click', function (e) {
          e.stopPropagation();
          select(+this.dataset.i);
        });
      });
    }

    function select(i) {
      selectedIndex = i;
      flag.textContent = COUNTRIES[i].flag;
      code.textContent = COUNTRIES[i].code;
      note.textContent = 'Format: ' + COUNTRIES[i].fmt;
      close();
    }

    function close() {
      open = false;
      dd.classList.remove('open');
      chev.classList.remove('open');
    }

    function openDropdown() {
      open = true;
      dd.classList.add('open');
      chev.classList.add('open');
      search.value = '';
      render(COUNTRIES);
      requestAnimationFrame(function () { search.focus(); });
    }

    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      e.preventDefault();
      if (open) { close(); return; }
      openDropdown();
    });

    search.addEventListener('input', function (e) {
      e.stopPropagation();
      const q = this.value.toLowerCase();
      render(COUNTRIES.filter(function (c) {
        return c.name.toLowerCase().includes(q) || c.code.includes(q);
      }));
    });

    search.addEventListener('click', function (e) { e.stopPropagation(); });

    document.addEventListener('click', function (e) {
      const selector = document.getElementById('ctCountrySelector');
      if (selector && !selector.contains(e.target)) close();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && open) close();
    });

    render(COUNTRIES);
    select(0);
  });

})();