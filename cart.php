<?php
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
//include('../server/connection.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="View your cart at Dragon Stone and proceed to checkout.">
        <meta property="og:title" content="Dragon Stone - Your Cart">
        <meta property="og:description" content="Review your selected premium products at Dragon Stone before checkout.">
        <meta property="og:image" content="assets/images/GREEN.jpg">
        <meta property="og:url" content="https://www.dragonstone.com/cart.html">
        <meta name="twitter:card" content="summary_large_image">
        <title>DRAGON STONE-CART</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" />
        <!-- Custom Styles -->
        <style>
            body {
                background-image: url('assets/images/GREEN.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                min-height: 100vh;
            }
            
            .navbar-custom {
                background-color: #1b4d3e;
            }
            
            .navbar-custom .navbar-brand,
            .navbar-custom .nav-link {
                color: #ffffff;
                font-weight: 500;
                transition: color 0.3s ease;
            }
            
            .navbar-custom .nav-link:hover {
                color: #a5c9a1;
            }
            
            .navbar-custom .fa-cart-shopping,
            .navbar-custom .fa-user,
            .navbar-custom .fa-envelope {
                color: #ffffff;
            }
            
            .cart-counter {
                position: absolute;
                top: -10px;
                right: -10px;
                background: red;
                color: white;
                border-radius: 50%;
                padding: 2px 6px;
                font-size: 12px;
            }
            
            .footer-section {
                background-color: #1b4d3e;
                color: white;
                padding: 40px 0 20px;
            }
            
            .footer-title {
                font-weight: bold;
                margin-bottom: 15px;
            }
            
            .footer-description {
                font-size: 14px;
                margin-bottom: 10px;
            }
            
            .footer-links a {
                display: block;
                color: #a5c9a1;
                text-decoration: none;
                margin-bottom: 8px;
                transition: color 0.3s ease;
            }
            
            .footer-links a:hover {
                color: white;
            }
            
            .social-icons {
                margin-top: 15px;
            }
            
            .social-icons a {
                color: white;
                font-size: 20px;
                margin-right: 15px;
                transition: color 0.3s ease;
            }
            
            .social-icons a:hover {
                color: #a5c9a1;
            }
            
            .footer-divider {
                border-color: #a5c9a1;
                margin: 30px 0;
            }
            
            .newsletter-form {
                margin-top: 20px;
            }
            
            .newsletter-input {
                border: none;
                border-radius: 5px 0 0 5px;
            }
            
            .newsletter-btn {
                background-color: #a5c9a1;
                color: #1b4d3e;
                border: none;
                border-radius: 0 5px 5px 0;
                padding: 10px 20px;
            }
            
            .newsletter-text {
                color: #a5c9a1;
                font-size: 12px;
                margin-top: 5px;
                display: block;
            }
            
            .footer-copyright {
                font-size: 12px;
                color: #a5c9a1;
                margin-top: 20px;
            }
            
            .cart-section {
                margin: 50px auto;
                padding: 30px;
                background: rgba(0, 0, 0, 0.6);
                border-radius: 10px;
                max-width: 800px;
                color: white;
            }
            
            .cart-section h2 {
                color: white !important;
            }
            
            .cart-item {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 20px;
                border-bottom: 1px solid #a5c9a1;
            }
            
            .cart-item img {
                width: 100px;
                height: auto;
                margin-right: 20px;
                border-radius: 5px;
            }
            
            .cart-item-details {
                flex-grow: 1;
            }
            
            .cart-item-details h4 {
                margin: 0;
                color: white;
            }
            
            .cart-item-details p {
                margin: 5px 0;
                color: #a5c9a1;
            }
            
            .cart-item-actions {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            
            .cart-item-actions button {
                background-color: #a5c9a1;
                color: #1b4d3e;
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
            }
            
            .cart-item-actions button:hover {
                background-color: #8ba888;
            }
            
            .cart-total {
                text-align: right;
                margin-top: 20px;
            }
            
            .cart-total p {
                color: white;
                font-size: 18px;
                font-weight: bold;
            }
            
            .checkout-btn {
                background-color: #a5c9a1;
                color: #1b4d3e;
                border: none;
                padding: 12px 24px;
                border-radius: 5px;
                font-size: 16px;
            }
            
            .checkout-btn:hover {
                background-color: #8ba888;
            }
            
            .empty-cart {
                color: white;
                text-align: center;
                font-size: 18px;
            }
            
            .footer-social-img {
                width: 100px;
                height: auto;
                border-radius: 5px;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>

        <body>
            <!-- NAVBAR SECTION -->
            <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="index.html">DRAGON STONE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <!-- LEFTS LINKS -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="#home">HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="products.html">PRODUCTS</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-link" href="shop.html">SHOP</a></li>
                        </ul>

                        <!-- RIGHT LINKS -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                    <i class="fa-solid fa-cart-shopping"></i>CART
                                    <span class="cart-counter" id="cartCounter">0</span>
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa-regular fa-user"></i> LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- CART SECTION -->
            <section class="cart-section container my-5 py-5">
                <h2>YOUR CART</h2>
                <hr class="hr">
                <div id="cart-items"></div>
                <div class="cart-total">
                    <p>Total:R<span id="cart-total-amount">0.00</span></p>
                    <button class="checkout-btn" id="checkoutBtn">PROCEED TO CHECKOUT</button>
                </div>
            </section>

            <!-- Footer Section -->
            <footer class="footer-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <h5 class="footer-title">DRAGON STONE</h5>
                            <p class="footer-description">Your premier destination for premium sports shoes, luxury watches, and stylish outerwear.</p>
                            <p class="footer-copyright">&copy; 2025 Dragon Stone. All rights reserved.</p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <h5 class="footer-title">CUSTOMR SERVICE</h5>
                            <div class="footer-links">
                                <a href="shipping.html" class="footer-link"><i class="fas fa-truck"></i>SHIPPING POLICY</a>
                                <a href="returns.html" class="footer-link"><i class="fas fa-exchange-alt"></i>RETURNS & EXCHANGE</a>
                                <a href="faqs.html" class="footer-link"><i class="fas fa-question-circle"></i>FAQs</a>
                                <a href="contact.html" class="footer-link"><i class="fas fa-envelope"></i>CONTACT US</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                            <h5 class="footer-title">FOLLOW US</h5>
                            <img class="footer-social-img" src="assets/images/IG.jpeg" alt="Instagram">
                            <p class="footer-description">STAY UPDATED WITH OUR LATEST COLLECTIONS AND PROMOTIONS</p>
                            <div class="social-icons">
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr class="footer-divider">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="newsletter-form text-center">
                                <h6>SUBSCRIBE TO OUR NEWSLETTER</h6>
                                <form action="subscribe.html" method="POST">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control newsletter-input" placeholder="Enter your email address" required>
                                        <button class="btn newsletter-btn" type="submit">SUBSCRIBE</button>
                                    </div>
                                    <small class="newsletter-text">GET THE LATEST UPDATES AND EXCLUSIVE OFFERS</small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Custom JavaScript -->
            <script>
                // Initialize cart from localStorage
                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                // Update cart counter
                function updateCartCounter() {
                    const cartCounter = document.getElementById('cartCounter');
                    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
                    cartCounter.textContent = totalItems;
                }

                // Update cart display
                function updateCartDisplay() {
                    const cartItemsContainer = document.getElementById('cart-items');
                    const cartTotalAmount = document.getElementById('cart-total-amount');
                    const checkoutBtn = document.getElementById('checkoutBtn');
                    cartItemsContainer.innerHTML = '';

                    if (cart.length === 0) {
                        cartItemsContainer.innerHTML = '<p class="empty-cart">Your cart is empty.</p>';
                        cartTotalAmount.textContent = '0.00';
                        checkoutBtn.style.display = 'none';
                        return;
                    }

                    let total = 0;
                    cart.forEach((item, index) => {
                        const itemTotal = item.price * item.quantity;
                        total += itemTotal;
                        const cartItem = document.createElement('div');
                        cartItem.classList.add('cart-item');
                        cartItem.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-details">
                        <h4>R${item.name}</h4>
                        <p>Price: R${item.price.toFixed(2)}</p>
                        <p>Quantity:R${itemTotal.toFixed(2)}</p>
                    </div>
                    <div class="cart-item-actions">
                        <button onclick="updateQuantity(R{index}, ${item.quantity + 1})">+</button>
                        <button onclick="updateQuantity(R{index}, ${item.quantity - 1})">-</button>
                        <button onclick="removeFromCart(R{index})">Remove</button>
                    </div>
                `;
                        cartItemsContainer.appendChild(cartItem);
                    });

                    cartTotalAmount.textContent = total.toFixed(2);
                    checkoutBtn.style.display = 'block';
                    updateCartCounter();
                }

                // Update item quantity
                function updateQuantity(index, newQuantity) {
                    if (newQuantity < 1) {
                        removeFromCart(index);
                        return;
                    }
                    cart[index].quantity = newQuantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartDisplay();
                }

                // Remove item from cart
                function removeFromCart(index) {
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartDisplay();
                }

                // Handle checkout button click
                document.getElementById('checkoutBtn').addEventListener('click', function() {
                    if (cart.length === 0) {
                        alert('Your cart is empty.');
                        return;
                    }
                    alert('Proceeding to checkout...');
                    window.location.href = 'checkout.html';
                });

                // Update cart display on page load
                document.addEventListener('DOMContentLoaded', function() {
                    updateCartDisplay();
                });
            </script>
        </body>

    </html>