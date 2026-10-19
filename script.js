const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.main-nav');
if (toggle && nav) {
  toggle.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    toggle.textContent = open ? '×' : '☰';
  });
  nav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
    nav.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Open navigation');
    toggle.textContent = '☰';
  }));
}
const lightbox = document.getElementById('lightbox');
if (lightbox) {
  const image = lightbox.querySelector('img');
  document.querySelectorAll('.gallery-item').forEach(item => item.addEventListener('click', () => {
    image.src = item.dataset.full;
    image.alt = item.querySelector('img').alt;
    lightbox.classList.add('open');
    lightbox.setAttribute('aria-hidden', 'false');
  }));
  const close = () => {
    lightbox.classList.remove('open');
    lightbox.setAttribute('aria-hidden', 'true');
    image.src = '';
  };
  lightbox.querySelector('.lightbox-close').addEventListener('click', close);
  lightbox.addEventListener('click', event => { if (event.target === lightbox) close(); });
  document.addEventListener('keydown', event => { if (event.key === 'Escape') close(); });
}
const checkin = document.getElementById('checkin');
const checkout = document.getElementById('checkout');
if (checkin && checkout) {
  checkin.addEventListener('change', () => {
    checkout.min = checkin.value || checkout.min;
    if (checkout.value && checkout.value <= checkin.value) checkout.value = '';
  });
}