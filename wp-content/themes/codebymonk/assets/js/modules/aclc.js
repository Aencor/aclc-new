function q(s, r) { return (r || document).querySelector(s); }
function qa(s, r) { return Array.from((r || document).querySelectorAll(s)); }

export default {
  init() {
    this.initBurger();
    this.initHeroCanvas();
    this.initFilmModal();
    this.initReveal();
    this.initZones();
    this.initCalendar();
    this.initRegForm();
    this.initNewsletter();
    this.initCookies();
  },

  initBurger() {
    const b = q('.burger');
    const nav = q('nav.main');
    if (b && nav) {
      b.addEventListener('click', () => {
        nav.classList.toggle('open');
      });
    }
  },

  initHeroCanvas() {
    const cv = q('#heroCanvas');
    if (!cv) return;

    const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) return;

    const ctx = cv.getContext('2d');
    let t = 0;
    const dots = [];

    function size() {
      cv.width = cv.offsetWidth;
      cv.height = cv.offsetHeight;
    }
    size();
    window.addEventListener('resize', size);

    for (let i = 0; i < 46; i++) {
      dots.push({
        x: Math.random(),
        y: Math.random(),
        r: Math.random() * 1.8 + 0.5,
        s: Math.random() * 0.14 + 0.03,
      });
    }

    function loop() {
      if (!cv.offsetWidth) {
        requestAnimationFrame(loop);
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

      requestAnimationFrame(loop);
    }
    loop();
  },

  initFilmModal() {
    const pf = q('#playFilm');
    const fm = q('#filmModal');
    const cf = q('#closeFilm');

    if (pf && fm) {
      pf.onclick = () => {
        fm.hidden = false;
        fm.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      };
      if (cf) {
        cf.onclick = () => {
          fm.hidden = true;
        };
      }
    }
  },

  initReveal() {
    const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    qa('.g2>.card, .g3>.card, .g4>.card, .rowbox, .newsband, .ladder .st').forEach((el) => {
      if (!el.classList.contains('rv')) el.classList.add('rv');
    });

    const items = qa('.rv');
    if (reduce || !('IntersectionObserver' in window)) {
      items.forEach((el) => el.classList.add('in'));
      return;
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });

    items.forEach((el, i) => {
      if (el.closest('.vhero') || el.getBoundingClientRect().top < window.innerHeight) {
        el.classList.add('in');
      } else {
        el.style.transitionDelay = (Math.min(i, 6) * 70) + 'ms';
        io.observe(el);
      }
    });
  },

  initZones() {
    const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce || !('IntersectionObserver' in window)) return;
    const zo = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (!e.isIntersecting) return;
        qa('i', e.target).forEach((seg, i) => {
          seg.classList.add('zseg');
          seg.style.animationDelay = (i * 90) + 'ms';
        });
        zo.unobserve(e.target);
      });
    }, { threshold: 0.3 });
    qa('.zones').forEach((z) => zo.observe(z));
  },

  initCalendar() {
    const tabs = q('#calTabs');
    const list = q('#calList');
    if (!tabs || !list) return;

    let courses = [];
    try {
      const raw = tabs.getAttribute('data-events');
      if (raw) courses = JSON.parse(raw);
    } catch (e) {}

    if (!courses.length) {
      courses = [
        { m: 'SEP', d: '5', t: 'Redefine Your Self-Worth', w: '5 & 6 September 2026', f: 'Online', p: null, c: 1 },
        { m: 'SEP', d: '19', t: 'Vital Fundamentals', w: '19-26 September 2026', f: 'In person', p: '$3,997', c: 1 },
        { m: 'NOV', d: '2', t: 'Life Enhancement Course', w: '2, 3, 4, 8 & 9 November 2026', f: 'Online', p: null, c: 1 },
        { m: 'NOV', d: '14', t: 'Redefine Your Self-Worth', w: '14 & 15 November 2026', f: 'Online', p: null, c: 1 },
        { m: 'DEC', d: '5', t: 'Vital Fundamentals', w: '5-12 December 2026', f: 'In person', p: '$3,997', c: 1 },
        { m: 'JAN', d: 'TBC', t: 'Life Enhancement Course', w: 'Early 2027', f: 'Online', p: null, c: 0 },
      ];
    }

    let f = 'All';
    function drawCal() {
      tabs.innerHTML = ['All', 'Online', 'In person']
        .map((x) => `<button class="tab${x === f ? ' on' : ''}" data-f="${x}">${x}</button>`)
        .join('');

      qa('.tab', tabs).forEach((b) => {
        b.onclick = () => {
          f = b.dataset.f;
          drawCal();
        };
      });

      const rows = courses.filter((c) => f === 'All' || c.f === f);
      list.innerHTML =
        rows
          .map((c) => {
            const price = c.p
              ? `<span class="price" style="font-size:16px">${c.p}</span>`
              : `<span class="pending">price TBD</span>`;
            const status = c.c ? '' : `<span class="pill" style="margin-left:8px">Date to be confirmed</span>`;
            return (
              `<div class="row"><div class="datebox"><div class="tiny">${c.m}</div><div class="d">${c.d}</div></div>` +
              `<div class="grow"><div style="font-weight:600">${c.t}${status}</div>` +
              `<div class="xs">${c.w} · ${c.f}${c.f === 'In person' ? ', Letoli Ranch' : ''}</div></div>` +
              price +
              `<a class="btn btn-ghost btn-sm" href="#register">Get details</a></div>`
            );
          })
          .join('') || '<div class="row"><div class="grow"><p class="sm">No dates in this format yet.</p></div></div>';
    }
    drawCal();
  },

  initRegForm() {
    const form = q('#regForm');
    const done = q('#regDone');
    if (!form || !done) return;

    let interest = null;
    let lang = 'English';

    qa('#rInterest .choice').forEach((b) => {
      b.onclick = () => {
        qa('#rInterest .choice').forEach((x) => x.classList.remove('sel'));
        b.classList.add('sel');
        interest = b.dataset.v;
      };
    });

    qa('#rLang button').forEach((b) => {
      b.onclick = () => {
        qa('#rLang button').forEach((x) => x.classList.remove('sel'));
        b.classList.add('sel');
        lang = b.dataset.l;
      };
    });

    const go = q('#rGo');
    if (go) {
      go.onclick = () => {
        const name = (q('#rName').value || '').trim();
        const mail = (q('#rMail').value || '').trim();
        if (!name) {
          q('#rName').focus();
          alert('Enter your first name to continue.');
          return;
        }
        if (mail.indexOf('@') < 1 || mail.indexOf('.') < 0) {
          q('#rMail').focus();
          alert('Enter a valid email address.');
          return;
        }
        if (!interest) {
          alert('Pick what you are interested in.');
          return;
        }
        if (!q('#rOk').checked) {
          alert('Please accept the Privacy Policy to continue.');
          return;
        }
        const wantsCall = q('#rCall').checked;
        q('#regTxt').textContent =
          name +
          ', we have sent the ' +
          interest.toLowerCase() +
          ' details to ' +
          mail +
          ' in ' +
          lang +
          '.' +
          (wantsCall ? ' A coach will also contact you to arrange a call.' : '');
        form.hidden = true;
        done.hidden = false;
      };
    }

    const reset = q('#rReset');
    if (reset) {
      reset.onclick = () => {
        ['rName', 'rLast', 'rMail', 'rPhone'].forEach((id) => {
          if (q('#' + id)) q('#' + id).value = '';
        });
        if (q('#rOk')) q('#rOk').checked = false;
        if (q('#rCall')) q('#rCall').checked = false;
        qa('#rInterest .choice').forEach((x) => x.classList.remove('sel'));
        interest = null;
        done.hidden = true;
        form.hidden = false;
      };
    }
  },

  initNewsletter() {
    qa('.newsband').forEach((band) => {
      const go = q('.nGo', band);
      if (!go) return;
      go.onclick = () => {
        const mail = q('.nMail', band);
        const m = (mail.value || '').trim();
        if (m.indexOf('@') < 1 || m.indexOf('.') < 0) {
          mail.focus();
          alert('Enter a valid email address.');
          return;
        }
        if (!q('.nOk', band).checked) {
          alert('Please accept the Privacy Policy to subscribe.');
          return;
        }
        q('.newsTxt', band).textContent = 'The Thought of the Week goes to ' + m + ' every Monday.';
        q('.newsForm', band).hidden = true;
        q('.newsDone', band).hidden = false;
      };
    });
  },

  initCookies() {
    const bar = q('#cookieBar');
    if (!bar) return;

    const consent = localStorage.getItem('aclc_cookie_choice');
    if (!consent) {
      bar.hidden = false;
    }

    const acc = q('#ckAccept');
    const rej = q('#ckReject');

    if (acc) {
      acc.onclick = () => {
        localStorage.setItem('aclc_cookie_choice', 'all');
        bar.hidden = true;
      };
    }
    if (rej) {
      rej.onclick = () => {
        localStorage.setItem('aclc_cookie_choice', 'essential');
        bar.hidden = true;
      };
    }
  },
};
