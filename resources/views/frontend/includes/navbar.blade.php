<header id="site-header" class="site-header">
    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="container px-0">
            <div id="nav-row" class="row w-100 p-0 m-0 align-items-center">
                <!-- Left Social Icons -->
                <div id="left-icons" class="col-4 d-flex justify-content-start">
                    <a href="#" class="social-link d-none d-lg-block"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link d-none d-lg-block"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="nav-icon d-block d-lg-none"><i class="fa-solid fa-bars"></i></a>
                    <a href="#" onclick="toggleSearch()" class="nav-icon d-block d-lg-none"><i class="fas fa-search"></i></a>
                </div>

                <!-- Center Logo -->
                <div id="logo" class="col-4 d-flex justify-content-center">
                    <a href="#" class="navbar-brand">
                        <img src="{{asset('frontend/images/kalindi_logo.svg')}}"  alt="Kalindi Logo">
                    </a>
                </div>
 
                <!-- Right Icons -->
                <div id="right-icons" class="col-4 d-flex justify-content-end">
                    <a href="#" class="nav-icon"><i class="fas fa-user"></i></a>

                    <div id="user-dropdown" class="user-dropdown">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                    <a href="#" onclick="toggleSearch()" class="nav-icon d-none d-lg-block"><i class="fas fa-search"></i></a>
                    <a href="#" class="nav-icon d-none d-lg-block"><i class="fas fa-heart"></i></a>
                    <a href="#" class="nav-icon cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
<!-- Search Field (Hidden Initially) -->
<div id="search-bar" style="display: none; ">
    <div class="container">
        <input type="text" class="form-control" placeholder="Search..." />
        <button class="btn btn-light mt-2" onclick="toggleSearch()">Close</button>
    </div>
</div>


<!-- Cart Sidebar -->
<div id="cart-sidebar" class="cart-sidebar">
    <div class="cart-header">
        <h2>Shopping Cart</h2>
        <button class="close-btn" onclick="toggleCart()">×</button>
    </div>
    <div class="cart-items">
        <p>Your cart is empty</p>
    </div>
</div>
<!-- Wishlist Sidebar -->
<div id="wishlist-sidebar" class="wishlist-sidebar">
    <div class="wishlist-header">
        <h2>My Wishlist</h2>
        <button class="close-btn" onclick="toggleWishlist()">×</button>
    </div>
    <div class="wishlist-items">
        <p>Your wishlist is empty</p>
    </div>
</div>
<!-- Mobile Menu -->
<div id="mobile-menu" class="mobile-menu">
    <div class="menu-header">
        <h2>Menu</h2>
        <button class="close-btn" onclick="toggleMobileMenu()">×</button>
    </div>
    <div class="menu-content">
        <!-- Your category list will be cloned here by JS -->
    </div>
</div>

<!-- User Dropdown -->



















    <!-- Categories Menu (Always Visible) -->
    <div class="categories-menu">
        <div class="container">
            <ul class="category-list">
                <li><a href="#">NEW IN</a></li>
                <li><a href="#">BEST SELLERS</a></li>
                <li><a href="#">BRANDS</a></li>
                <li><a href="#">CLOTHING</a></li>
                <li><a href="#">ACCESSORIES</a></li>
            </ul>
        </div>
    </div>

   
</header>
