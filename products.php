<?php
$page_title = "Products & Services - PurrfectStay";
$page_description = "Premium cat products and additional services to keep your feline friend happy and healthy.";
include 'includes/header.php';
?>

<div class="flex flex-col min-h-screen bg-gradient-to-br from-green-50 to-emerald-50">
    <?php include 'includes/navbar.php'; ?>
    
    <main class="flex-1">
        <?php include 'sections/product-section.php'; ?>
    </main>
    
    <?php include 'includes/footer.php'; ?>
</div>

<!-- ===== Cart Toggle + Drawer (no design changes to your cards) ===== -->
<button id="cartToggle" type="button"
  style="position:fixed; right:12px; top:40%; z-index:50; padding:10px 14px; border-radius:10px;
         background:#10b981; color:#fff; font-weight:600; box-shadow:0 4px 12px rgba(0,0,0,.15);">
  Cart (<span id="cartCount">0</span>)
</button>

<aside id="cartDrawer"
  style="position:fixed; top:0; right:-380px; width:360px; height:100vh; background:#fff; z-index:60;
         box-shadow:-12px 0 24px rgba(0,0,0,.15); transition:right .25s ease; overflow:auto;">
  <div style="display:flex; align-items:center; justify-content:space-between; padding:14px 16px; border-bottom:1px solid #eee;">
    <strong style="font-size:18px;">Your Cart</strong>
    <button id="cartClose" aria-label="Close" style="font-size:18px;line-height:1;border:none;background:none;cursor:pointer;">✕</button>
  </div>
  <div id="cartItems" style="padding:12px 14px;"></div>
  <div id="cartSummary" style="padding:12px 14px; border-top:1px solid #eee;">
    <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
      <span>Total</span>
      <strong>$<span id="cartTotal">0.00</span></strong>
    </div>
    <a href="checkout.php" style="display:block;text-align:center;padding:10px 12px;border-radius:8px;background:#10b981;color:#fff;font-weight:600;">
      Proceed to Checkout
    </a>
  </div>
</aside>

<script>
(function(){
  const toggle = document.getElementById('cartToggle');
  const drawer = document.getElementById('cartDrawer');
  const closeBtn = document.getElementById('cartClose');
  const countEl = document.getElementById('cartCount');
  const itemsEl = document.getElementById('cartItems');
  const totalEl = document.getElementById('cartTotal');

  function openDrawer(){ drawer.style.right = '0'; }
  function closeDrawer(){ drawer.style.right = '-380px'; }

  toggle.addEventListener('click', openDrawer);
  closeBtn.addEventListener('click', closeDrawer);

  function escapeHtml(s){ return (s||'').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }

  function render(state){
    countEl.textContent = state.count || 0;
    totalEl.textContent = Number(state.total || 0).toFixed(2);

    const items = state.items || [];
    if (!items.length) {
      itemsEl.innerHTML = '<p style="color:#666;">Your cart is empty.</p>';
      return;
    }

    itemsEl.innerHTML = items.map(it => `
      <div style="display:flex; gap:10px; align-items:center; padding:8px 0; border-bottom:1px solid #f1f1f1;">
        <img src="${it.img || ''}" alt="" style="width:56px;height:56px;object-fit:cover;border-radius:8px;">
        <div style="flex:1;">
          <div style="font-weight:600;">${escapeHtml(it.name)}</div>
          <div style="color:#666;">$${Number(it.price).toFixed(2)} × ${it.qty}</div>
        </div>
        <button class="js-remove" data-id="${it.id}"
          style="border:none;background:#ef4444;color:#fff;border-radius:8px;padding:6px 10px;cursor:pointer;">
          Remove
        </button>
      </div>
    `).join('');
  }

  async function refresh(){
    try{
      const res = await fetch('cart/cart-view.php', {credentials:'same-origin'});
      const data = await res.json();
      render(data);
    }catch(e){}
  }

  // Add to cart (listens to buttons you tagged with .js-add-to-cart in sections/product-section.php)
  document.addEventListener('click', async (e) => {
    const btn = e.target.closest('.js-add-to-cart');
    if (!btn) return;

    const payload = {
      id: btn.dataset.id,
      name: btn.dataset.name,
      price: btn.dataset.price,
      img: btn.dataset.img,
      qty: 1
    };

    try{
      const res = await fetch('cart/cart-add.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        credentials: 'same-origin',
        body: JSON.stringify(payload)
      });
      const data = await res.json();
      render(data);
      openDrawer();
    }catch(e){}
  });

  // Remove from cart (in drawer)
  document.getElementById('cartItems').addEventListener('click', async (e) => {
    const rm = e.target.closest('.js-remove');
    if (!rm) return;
    try{
      const res = await fetch('cart/cart-remove.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        credentials: 'same-origin',
        body: JSON.stringify({id: rm.dataset.id})
      });
      const data = await res.json();
      render(data);
    }catch(e){}
  });

  // Initial load
  refresh();
})();
</script>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
