/* Male-Fashion demo → cart, checkout, and invoice glue logic (localStorage)
   Drop this file at: /js/cart.js
   Then include on EVERY page, just before main.js:
   <script src="js/cart.js"></script>
*/
(function() {
    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded. Please ensure jquery-3.3.1.min.js is included before cart.js.');
        return;
    }

    $(document).ready(function() {
        // Helper functions
        function getUserEmail() { return '{{ session("user.email") }}' || 'guest'; }
        function getCartKey() { return `mf_cart_${getUserEmail()}`; }
        function getOrdersKey() { return `mf_orders_${getUserEmail()}`; }
        function getCart() { try { return JSON.parse(localStorage.getItem(getCartKey()) || '[]'); } catch (e) { console.error('Cart parse error:', e); return []; } }
        function saveCart(cart) { localStorage.setItem(getCartKey(), JSON.stringify(cart)); updateCartUI(); }
        function getOrders() { try { return JSON.parse(localStorage.getItem(getOrdersKey()) || '[]'); } catch (e) { console.error('Orders parse error:', e); return []; } }
        function saveOrders(orders) { localStorage.setItem(getOrdersKey(), JSON.stringify(orders)); }
        function parsePrice(str) { return parseFloat(String(str).replace(/[^0-9.]/g, '')) || 0; }
        function fmtPrice(n) { return '$' + n.toFixed(2); }

        // Add to cart
        $('.add-cart').click(function(e) {
            e.preventDefault();
            if (!getUserEmail() || getUserEmail() === 'guest') {
                alert('Please login to add items to cart!');
                window.location.href = '{{ route("login") }}';
                return;
            }
            const $parent = $(this).closest('.product__item, .product__details__text');
            const item = {
                id: 'Ma' + Date.now().toString(36), // Generate ID starting with "Ma"
                name: $parent.find('h6').text() || $parent.find('h4').text(),
                price: parsePrice($parent.find('h5').text() || $parent.find('h3').text().split(' ')[0]),
                qty: parseInt($parent.find('.pro-qty-2 input').val()) || 1,
                img: $parent.find('img').attr('src') || "{{ asset('img/shop-details/product-big-2.png') }}"
            };
            const cart = getCart();
            const existing = cart.find(it => it.name === item.name); // Match by name only, as color is removed
            if (existing) existing.qty += item.qty;
            else cart.push(item);
            saveCart(cart);
            alert('Added to cart!');
        });

        //  cart UI
        function updateCartUI() {
            const cart = getCart();
            const tbody = $('.shopping__cart__table tbody');
            tbody.empty();
            let subtotal = 0;
            cart.forEach(item => {
                subtotal += item.price * item.qty;
                tbody.append(`
                    <tr>
                        <td class="product__cart__item">
                            <div class="product__cart__item__pic">
                                <img src="${item.img}" alt="${item.name}" style="max-width: 80px;">
                            </div>
                            <div class="product__cart__item__text">
                                <h6>${item.name}</h6>
                                <h5>${fmtPrice(item.price)}</h5>
                            </div>
                        </td>
                        <td class="quantity__item">
                            <div class="quantity">
                                <div class="pro-qty-2">
                                    <span class="dec qtybtn" data-id="${item.id}">-</span>
                                    <input type="number" value="${item.qty}" data-id="${item.id}" min="1">
                                    <span class="inc qtybtn" data-id="${item.id}">+</span>
                                </div>
                            </div>
                        </td>
                        <td class="cart__price">${fmtPrice(item.price * item.qty)}</td>
                        <td class="cart__close" data-id="${item.id}"><i class="fa fa-close"></i></td>
                    </tr>
                `);
            });

            // Handle "+" and "-" buttons for quantity change
            tbody.find('.inc.qtybtn').off('click').on('click', function() {
                const id = $(this).data('id');
                let cart = getCart();
                const item = cart.find(it => it.id === id);
                if (item) {
                    item.qty += 1;
                    saveCart(cart);
                }
            });
            tbody.find('.dec.qtybtn').off('click').on('click', function() {
                const id = $(this).data('id');
                let cart = getCart();
                const item = cart.find(it => it.id === id);
                if (item && item.qty > 1) {
                    item.qty -= 1;
                    saveCart(cart);
                }
            });

            // Update checkout summary
            const shipping = subtotal > 0 ? 5.00 : 0;
            const tax = subtotal * 0.08;
            const total = subtotal + shipping + tax;
            $('.cart__total ul').html(`
                <li>Subtotal <span>${fmtPrice(subtotal)}</span></li>
                <li>Tax (8%) <span>${fmtPrice(tax)}</span></li>
                <li>Total <span>${fmtPrice(total)}</span></li>
            `);
            $('.cart__total p').html(`
                You have ${cart.length} item${cart.length === 1 ? '' : 's'} in your cart.<br>
                Cart subtotal: ${fmtPrice(subtotal)}
            `);
            $('#summary-subtotal').text(fmtPrice(subtotal));
            $('#summary-shipping').text(fmtPrice(shipping));
            $('#summary-tax').text(fmtPrice(tax));
            $('#summary-total').html(`<strong>${fmtPrice(total)}</strong>`);
            updateHeaderCart(cart.length, total);

            // Update checkout page order items with images
            // const orderItems = $('#order-items');
            // orderItems.empty();
            // if (cart.length === 0) {
            //     orderItems.append('<li>No items</li>');
            // } else {
            //     cart.forEach(item => {
            //         orderItems.append(`
            //             <li>
            //                 <div class="checkout__order__item">
            //                     <img src="${item.img}" alt="${item.name}" style="max-width: 60px; vertical-align: middle; margin-right: 10px;">
            //                     <span class="item-name">${item.name} (x${item.qty})</span>
            //                     <span class="item-price">${fmtPrice(item.price * item.qty)}</span>
            //                 </div>
            //             </li>
            //         `);
            //     });
            // }
        }

        // Qty change
        $(document).on('change', '.pro-qty-2 input', function() {
            const id = $(this).data('id');
            const qty = parseInt($(this).val()) || 1;
            if (qty < 1) {
                $(this).val(1);
                return;
            }
            const cart = getCart();
            const item = cart.find(it => it.id === id);
            if (item) item.qty = qty;
            saveCart(cart);
        });

        // Remove item
        $(document).on('click', '.cart__close', function() {
            const id = $(this).data('id');
            let cart = getCart();
            cart = cart.filter(it => it.id !== id);
            saveCart(cart);
        });

        // Update header
        function updateHeaderCart(count, total) {
            $('.header__nav__option a[href="/cart"] span').text(count || 0);
            $('.header__nav__option .price').text(fmtPrice(total || 0));
            $('.offcanvas__nav__option a[href="/cart"] span').text(count || 0);
            $('.offcanvas__nav__option .price').text(fmtPrice(total || 0));
        }

        // Update cart on click
        $('#update-cart').click(function(e) {
            e.preventDefault();
            updateCartUI();
        });

        // Validate credit card details
        function validateCreditCard(formData) {
            const errors = [];
            if (!formData.card_name) errors.push('Cardholder name is required.');
            if (!formData.card_number || !/^\d{16}$/.test(formData.card_number.replace(/\s/g, ''))) {
                errors.push('Card number must be 16 digits.');
            }
            if (!formData.exp_month || !/^(0[1-9]|1[0-2])$/.test(formData.exp_month)) {
                errors.push('Expiration month must be between 01 and 12.');
            }
            if (!formData.exp_year || !/^\d{2}$/.test(formData.exp_year)) {
                errors.push('Expiration year must be a 2-digit number.');
            } else {
                const currentYear = new Date().getFullYear() % 100; // Last two digits
                const expYear = parseInt(formData.exp_year);
                if (expYear < currentYear || expYear > currentYear + 10) {
                    errors.push('Expiration year must be between ' + currentYear + ' and ' + (currentYear + 10) + '.');
                }
            }
            if (!formData.cvv || !/^\d{3,4}$/.test(formData.cvv)) {
                errors.push('CVV must be 3 or 4 digits.');
            }
            return errors;
        }

        // Place order
        $('#checkout-form').submit(function(e) {
            e.preventDefault();
            const cart = getCart();
            if (cart.length === 0) {
                alert('Cart is empty!');
                return;
            }
            const formData = $(this).serializeArray().reduce((obj, it) => { obj[it.name] = it.value; return obj; }, {});
            if (!formData.name || !formData.email || !formData.address) {
                alert('Please fill all required billing fields!');
                return;
            }
            const cardErrors = validateCreditCard(formData);
            if (cardErrors.length > 0) {
                alert('Payment errors:\n- ' + cardErrors.join('\n- '));
                return;
            }
            const subtotal = cart.reduce((s, it) => s + (it.price * it.qty), 0);
            const shipping = 5.00;
            const tax = subtotal * 0.08;
            const total = subtotal + shipping + tax;
            // const order = {
            //     id: 'INV-' + Date.now(),
            //     date: new Date().toLocaleDateString(),
            //     items: cart,
            //     billing: {
            //         name: formData.name,
            //         email: formData.email,
            //         address: formData.address,
            //         city: formData.city || ''
            //     },
            //     payment: {
            //         type: 'Credit Card',
            //         card_name: formData.card_name,
            //         card_number: formData.card_number,
            //         exp_month: formData.exp_month,
            //         exp_year: formData.exp_year,
            //         cvv: formData.cvv
            //     },
            //     subtotal,
            //     shipping,
            //     tax,
            //     total
            // };
            // let orders = getOrders();
            // orders.push(order);
            // saveOrders(orders);
            // localStorage.removeItem(getCartKey());
            // Show success modal
            $('#order-success-modal').modal('show');
            
        });

        // Initial update
        updateCartUI();
    });
})();