/* Minimal store front-end — cart + checkout glue (localStorage) */

const CART_KEY = "mf_cart_v1";

const Cart = {
  get() {
    try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
    catch { return []; }
  },
  save(items) { localStorage.setItem(CART_KEY, JSON.stringify(items)); },
  add(item) {
    const cart = this.get();
    const found = cart.find(p => p.id === item.id && p.variant === item.variant);
    if (found) { found.qty += item.qty || 1; }
    else { cart.push({ ...item, qty: item.qty || 1 }); }
    this.save(cart);
    UI.refresh();
  },
  updateQty(id, variant, qty) {
    const cart = this.get().map(p => (p.id===id && p.variant===variant) ? ({...p, qty: Math.max(1, qty)}) : p);
    this.save(cart); UI.refresh();
  },
  remove(id, variant) {
    const cart = this.get().filter(p => !(p.id===id && p.variant===variant));
    this.save(cart); UI.refresh();
  },
  clear() { this.save([]); UI.refresh(); },
  totals() {
    const cart = this.get();
    const subtotal = cart.reduce((s,p)=> s + p.price * p.qty, 0);
    // flat shipping example (free over $100)
    const shipping = subtotal === 0 ? 0 : (subtotal >= 100 ? 0 : 5);
    return { subtotal, shipping, total: subtotal + shipping };
  }
};

const fmt = n => `$${n.toFixed(2)}`;

const UI = {
  refresh() {
    this.renderMiniCart();
    this.renderCartPage();
    this.renderCheckoutSummary();
  },
  renderMiniCart() {
    // Update header bubble & price if present
    document.querySelectorAll('.header__nav__option .price').forEach(el=>{
      el.textContent = fmt(Cart.totals().total);
    });
    document.querySelectorAll('.header__nav__option a[href*="cart"] span, .header__nav__option a[href*="shopping-cart"] span')
      .forEach(badge => { badge.textContent = Cart.get().reduce((a,b)=>a+b.qty,0); });
  },
  renderCartPage() {
    const table = document.querySelector('.shopping__cart__table table tbody, #cart-body');
    if (!table) return;
    const items = Cart.get();
    table.innerHTML = items.length ? items.map(p => `
      <tr data-id="${p.id}" data-variant="${p.variant}">
        <td class="product__cart__item">
          <div class="product__cart__item__pic"><img src="${p.image || 'img/product/product-1.jpg'}" alt="" style="width:70px;height:auto"></div>
          <div class="product__cart__item__text"><h6>${p.name}</h6><h5>${fmt(p.price)}</h5></div>
        </td>
        <td class="quantity__item">
          <div class="quantity"><div class="pro-qty-2">
            <input type="number" min="1" value="${p.qty}">
          </div></div>
        </td>
        <td class="cart__price">${fmt(p.price * p.qty)}</td>
        <td class="cart__close"><i class="fa fa-close" role="button" title="Remove"></i></td>
      </tr>
    `).join('') : `
      <tr><td colspan="4" style="text-align:center;padding:2rem">Your cart is empty.</td></tr>
    `;

    // totals on cart page
    const totals = Cart.totals();
    document.querySelectorAll('.cart__total ul, #cart-summary')
      .forEach(box=>{
        box.innerHTML = `
          <li>Subtotal <span>${fmt(totals.subtotal)}</span></li>
          <li>Shipping <span>${fmt(totals.shipping)}</span></li>
          <li>Total <span>${fmt(totals.total)}</span></li>
        `;
      });

    // qty change
    table.querySelectorAll('input[type="number"]').forEach(inp=>{
      inp.addEventListener('change', e=>{
        const tr = e.target.closest('tr');
        Cart.updateQty(tr.dataset.id, tr.dataset.variant, parseInt(e.target.value||"1",10));
      });
    });
    // remove
    table.querySelectorAll('.cart__close, .fa-close').forEach(btn=>{
      btn.addEventListener('click', e=>{
        const tr = e.target.closest('tr');
        Cart.remove(tr.dataset.id, tr.dataset.variant);
      });
    });
  },
  renderCheckoutSummary() {
    const box = document.getElementById('checkout-summary');
    if (!box) return;
    const items = Cart.get();
    const totals = Cart.totals();
    box.innerHTML = `
      <ul class="list-unstyled mb-3">
        ${items.map(p=>`<li class="d-flex justify-content-between"><span>${p.name} × ${p.qty}</span><span>${fmt(p.price*p.qty)}</span></li>`).join('') || '<li>Your cart is empty.</li>'}
      </ul>
      <hr class="my-2"/>
      <div class="d-flex justify-content-between"><strong>Subtotal</strong><strong>${fmt(totals.subtotal)}</strong></div>
      <div class="d-flex justify-content-between"><span>Shipping</span><span>${fmt(totals.shipping)}</span></div>
      <div class="d-flex justify-content-between fs-5 mt-2"><strong>Total</strong><strong>${fmt(totals.total)}</strong></div>
    `;
    // disable submit if empty
    const btn = document.querySelector('.checkout .site-btn, #place-order, form button[type="submit"]');
    if (btn) btn.disabled = items.length === 0;
  }
};

// attach add-to-cart handlers (shop & details)
function bindAddToCart() {
  // Elements with data-product JSON
  document.querySelectorAll('[data-product]').forEach(el=>{
    el.addEventListener('click', e=>{
      e.preventDefault();
      const data = JSON.parse(el.getAttribute('data-product'));
      const variant = data.variant || (data.size||'') + '|' + (data.color||'');
      Cart.add({
        id: data.id,
        name: data.name,
        price: parseFloat(data.price),
        image: data.image,
        variant,
        qty: data.qty ? parseInt(data.qty,10) : 1
      });
    });
  });

  // Fallback: product details “primary-btn” add to cart (reads DOM)
  const detailBtn = document.querySelector('.product__details__cart__option .primary-btn');
  const detailRoot = document.querySelector('.product__details__text');
  if (detailBtn && detailRoot) {
    detailBtn.addEventListener('click', e=>{
      e.preventDefault();
      const name = detailRoot.querySelector('h4')?.textContent?.trim() || 'Product';
      const priceText = detailRoot.querySelector('h3')?.textContent || '$0';
      const price = parseFloat((priceText.match(/\$([\d.]+)/)||[0,"0"])[1]);
      const qty = parseInt(document.querySelector('.product__details__cart__option input')?.value || "1", 10);
      Cart.add({
        id: name.toLowerCase().replace(/\s+/g,'-'),
        name, price, qty,
        image: document.querySelector('.product__details__pic__item img')?.src || ''
      });
    });
  }
}

// checkout submit -> confirmation
function bindCheckout() {
  const form = document.querySelector('.checkout form, #checkout-form');
  if (!form) return;
  form.addEventListener('submit', e=>{
    e.preventDefault();
    const items = Cart.get();
    if (!items.length) return alert('Your cart is empty.');
    // simple form validation
    const required = form.querySelectorAll('input[required], select[required]');
    for (const f of required) {
      if (!f.value.trim()) { f.focus(); return; }
    }
    const order = {
      id: 'ORD-' + Math.random().toString(36).slice(2,8).toUpperCase(),
      ts: new Date().toISOString(),
      items,
      totals: Cart.totals(),
      customer: Object.fromEntries(new FormData(form).entries())
    };
    sessionStorage.setItem('mf_last_order', JSON.stringify(order));
    Cart.clear();
    window.location.href = 'order-confirmation.html';
  });
}

document.addEventListener('DOMContentLoaded', () => {
  bindAddToCart();
  bindCheckout();
  UI.refresh();
});
