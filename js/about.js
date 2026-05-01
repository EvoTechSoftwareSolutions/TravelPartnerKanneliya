(function() {
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

  let open = false;
  let selectedIndex = 0;

  const btn    = document.getElementById('ctCountryBtn');
  const dd     = document.getElementById('ctCountryDropdown');
  const chev   = document.getElementById('ctChevron');
  const search = document.getElementById('ctCountrySearch');
  const list   = document.getElementById('ctCountryList');
  const flag   = document.getElementById('ctSelFlag');
  const code   = document.getElementById('ctSelCode');
  const note   = document.getElementById('ctFormatNote');

  function render(data) {
    list.innerHTML = data.map((c) =>
      `<div class="ct--country--option" data-i="${COUNTRIES.indexOf(c)}">
        <span>${c.flag}</span>
        <span class="cn">${c.name}</span>
        <span class="cc">${c.code}</span>
      </div>`
    ).join('');

    list.querySelectorAll('.ct--country--option').forEach(el => {
      el.addEventListener('click', function(e) {
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
    requestAnimationFrame(() => {
      search.focus();
    });
  }

  btn.addEventListener('click', function(e) {
    e.stopPropagation();
    e.preventDefault();
    if (open) { 
      close(); 
      return; 
    }
    openDropdown();
  });

  search.addEventListener('input', function(e) {
    e.stopPropagation();
    const q = this.value.toLowerCase();
    render(COUNTRIES.filter(c => c.name.toLowerCase().includes(q) || c.code.includes(q)));
  });

  search.addEventListener('click', function(e) {
    e.stopPropagation();
  });

  document.addEventListener('click', function(e) {
    const selector = document.getElementById('ctCountrySelector');
    if (selector && !selector.contains(e.target)) {
      close();
    }
  });

  // Keyboard support - Escape to close
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && open) {
      close();
    }
  });

  // Initialize
  render(COUNTRIES);
  select(0);
})();