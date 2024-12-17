<!-- Add this after your existing navbar code -->
<div class="mobile-bottom-nav d-lg-none">
    <div class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-home"></i>
            <span>Shop</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link" onclick="toggleMobileMenu(); return false;">
            <i class="fas fa-bars"></i>
            <span>Categories</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link" onclick="toggleSearch(); return false;">
            <i class="fas fa-search"></i>
            <span>Search</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="#" class="nav-link position-relative" onclick="toggleCart(); return false;">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge rounded-pill bg-danger">0</span>
            <span>Cart</span>
        </a>
    </div>
</div>