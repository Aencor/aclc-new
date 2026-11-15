import { gsap, ScrollTrigger } from './animations';

export default {
  init() {
    this.initMobileMenu();
    this.initHeroCanvas();
    this.initVideoModal();
    this.initCalendarFilter();
    this.initLeadForm();
    this.initNewsletter();
    this.initCookieBar();
    this.initGsapAnimations();
  },

  initMobileMenu() {
    const burger = document.getElementById('siteBurger');
    const menu = document.getElementById('mobileMenu');
    if (!burger || !menu) return;

    burger.addEventListener('click', () => {
      const isHidden = menu.hasAttribute('hidden');
      if (isHidden) {
        menu.removeAttribute('hidden');
      } else {
        menu.setAttribute('hidden', '');
      }
    });
  },

  initHeroCanvas() {
    const cv = document.getElementById('heroCanvas');
    if (!cv) return;

    const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) return;

    const ctx = cv.getContext('2d');
    let t = 0;
    const dots = [];

    function resize() {
      cv.width = cv.offsetWidth;
      cv.height = cv.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    for (let i = 0; i < 46; i++) {
      dots.push({
        x: Math.random(),
        y: Math.random(),
        r: Math.random() * 1.8 + 0.5,
        s: Math.random() * 0.14 + 0.03,
      });
    }

    function render() {
      if (!cv.offsetWidth) {
        requestAnimationFrame(render);
        return;
      }
      ctx.clearRect(0, 0, cv.width, cv.height);
      t += 0.0022;
      ctx.strokeStyle = 'rgba(235,171,33,0.16)';
      ctx.lineWidth = 1;

      for (let k = 0; k < 5; k++) {
        ctx.beginPath();
        const base = (k / 5) * cv.height;
        for (let x = 0; x < cv.width; x += 18) {
          const y = base + Math.sin(x * 0.004 + t + k) * 28 + Math.cos(x * 0.002 - t * 0.7) * 14;
          if (x === 0) ctx.moveTo(x, y);
          else ctx.lineTo(x, y);
        }
        ctx.stroke();
      }

      dots.forEach((d) => {
        d.y -= d.s * 0.25;
        if (d.y < 0) d.y = 1;
        ctx.fillStyle = 'rgba(245,217,62,' + (0.2 + Math.sin(t * 3 + d.x * 10) * 0.12) + ')';
        ctx.beginPath();
        ctx.arc(d.x * cv.width, d.y * cv.height, d.r, 0, Math.PI * 2);
        ctx.fill();
      });

      requestAnimationFrame(render);
    }
    render();
  },

  initVideoModal() {
    const playBtn = document.getElementById('playFilm');
    const modal = document.getElementById('filmModal');
    const closeBtn = document.getElementById('closeFilm');
    if (!playBtn || !modal) return;

    playBtn.addEventListener('click', () => {
      modal.removeAttribute('hidden');
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', () => {
        modal.setAttribute('hidden', '');
      });
    }

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.setAttribute('hidden', '');
      }
    });

    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !modal.hasAttribute('hidden')) {
        modal.setAttribute('hidden', '');
      }
    });
  },

  initCalendarFilter() {
    const tabsContainer = document.getElementById('calTabs');
    const list = document.getElementById('calList');
    if (!tabsContainer || !list) return;

    const tabs = tabsContainer.querySelectorAll('.cal-tab');
    const rows = list.querySelectorAll('.cal-row');

    tabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        tabs.forEach((t) => {
          t.classList.remove('on', 'bg-aclc-navy', 'text-white');
          t.classList.add('bg-slate-100', 'text-[#4A5764]');
        });

        tab.classList.add('on', 'bg-aclc-navy', 'text-white');
        tab.classList.remove('bg-slate-100', 'text-[#4A5764]');

        const format = tab.getAttribute('data-format');
        rows.forEach((row) => {
          const rowFmt = row.getAttribute('data-ev-format');
          if (format === 'All' || rowFmt === format) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    });
  },

  initLeadForm() {
    const form = document.getElementById('aclcRegForm');
    const doneState = document.getElementById('aclcRegDone');
    const successMsg = document.getElementById('aclcRegSuccessMsg');
    const resetBtn = document.getElementById('aclcRegResetBtn');
    if (!form || !doneState) return;

    // Interest chips
    const interestBtns = form.querySelectorAll('.interest-btn');
    const hiddenInterest = document.getElementById('hiddenInterest');

    interestBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        interestBtns.forEach((b) => {
          b.classList.remove('sel', 'bg-aclc-navy', 'text-white', 'border-aclc-navy');
          b.classList.add('border-aclc-line', 'text-[#4A5764]');
        });
        btn.classList.add('sel', 'bg-aclc-navy', 'text-white', 'border-aclc-navy');
        btn.classList.remove('border-aclc-line', 'text-[#4A5764]');
        if (hiddenInterest) {
          hiddenInterest.value = btn.getAttribute('data-value');
        }
      });
    });

    // Language buttons
    const langBtns = form.querySelectorAll('.lang-btn');
    const hiddenLang = document.getElementById('hiddenLang');

    langBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        langBtns.forEach((b) => {
          b.classList.remove('bg-aclc-navy', 'text-white', 'border-aclc-navy');
          b.classList.add('border-aclc-line', 'text-[#4A5764]');
        });
        btn.classList.add('bg-aclc-navy', 'text-white', 'border-aclc-navy');
        btn.classList.remove('border-aclc-line', 'text-[#4A5764]');
        if (hiddenLang) {
          hiddenLang.value = btn.getAttribute('data-lang');
        }
      });
    });

    // Form submit
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const firstName = document.getElementById('regFirstName')?.value.trim();
      const email = document.getElementById('regEmail')?.value.trim();
      const interest = hiddenInterest?.value || 'the programme';
      const lang = hiddenLang?.value || 'English';
      const wantsCall = document.getElementById('regCall')?.checked;

      if (!hiddenInterest?.value) {
        alert('Please select which programme you are interested in.');
        return;
      }

      form.setAttribute('hidden', '');
      doneState.removeAttribute('hidden');

      if (successMsg) {
        successMsg.textContent = `${firstName}, we have sent the ${interest.toLowerCase()} details to ${email} in ${lang}.${wantsCall ? ' A coach will also contact you to arrange an introductory call.' : ''}`;
      }
    });

    // Reset button
    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        form.reset();
        interestBtns.forEach((b) => {
          b.classList.remove('sel', 'bg-aclc-navy', 'text-white', 'border-aclc-navy');
          b.classList.add('border-aclc-line', 'text-[#4A5764]');
        });
        if (hiddenInterest) hiddenInterest.value = '';
        doneState.setAttribute('hidden', '');
        form.removeAttribute('hidden');
      });
    }
  },

  initNewsletter() {
    const bands = document.querySelectorAll('.newsband');
    bands.forEach((band) => {
      const goBtn = band.querySelector('.nGo');
      const mailInput = band.querySelector('.nMail');
      const privacyCheck = band.querySelector('.nOk');
      const form = band.querySelector('.newsForm');
      const doneState = band.querySelector('.newsDone');
      const txt = band.querySelector('.newsTxt');

      if (!goBtn || !mailInput || !form || !doneState) return;

      goBtn.addEventListener('click', () => {
        const val = mailInput.value.trim();
        if (!val || val.indexOf('@') < 1 || val.indexOf('.') < 0) {
          alert('Please enter a valid email address.');
          mailInput.focus();
          return;
        }

        if (privacyCheck && !privacyCheck.checked) {
          alert('Please accept the Privacy Policy to subscribe.');
          return;
        }

        if (txt) {
          txt.textContent = `The Thought of the Week goes to ${val} every Monday.`;
        }
        form.setAttribute('hidden', '');
        doneState.removeAttribute('hidden');
      });
    });
  },

  initCookieBar() {
    const bar = document.getElementById('cookieBar');
    if (!bar) return;

    const consent = localStorage.getItem('aclc_cookie_consent');
    if (!consent) {
      bar.removeAttribute('hidden');
    }

    const accept = document.getElementById('ckAccept');
    const reject = document.getElementById('ckReject');

    if (accept) {
      accept.addEventListener('click', () => {
        localStorage.setItem('aclc_cookie_consent', 'all');
        bar.setAttribute('hidden', '');
      });
    }

    if (reject) {
      reject.addEventListener('click', () => {
        localStorage.setItem('aclc_cookie_consent', 'essential');
        bar.setAttribute('hidden', '');
      });
    }
  },

  initGsapAnimations() {
    const cards = document.querySelectorAll('.card');
    if (!cards.length || typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    cards.forEach((card) => {
      gsap.from(card, {
        scrollTrigger: {
          trigger: card,
          start: 'top 88%',
          toggleActions: 'play none none none',
        },
        y: 20,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
      });
    });
  },
};
