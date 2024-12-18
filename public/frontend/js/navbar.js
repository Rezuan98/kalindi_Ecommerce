function toggleSearch() {
    const navRow = document.getElementById('nav-row');
    const searchBar = document.getElementById('search-bar');
    const navbar = document.querySelector('.navbar');
    
    if (searchBar.style.display === 'none' || searchBar.style.display === '') {
        // Show search bar
        searchBar.style.display = 'flex';
        searchBar.style.alignItems = 'center';
        searchBar.style.height = navbar.offsetHeight + 'px';
        navRow.style.visibility = 'hidden';
        
        // Style the container and input
        const container = searchBar.querySelector('.container');
        container.style.width = '100%';
        container.style.padding = '0 15px';
        
        // Create search input if it doesn't exist
        if (!searchBar.querySelector('.search-input')) {
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control search-input';
            input.placeholder = 'Search...';
            input.style.width = '100%';
            input.style.padding = '10px';
            container.innerHTML = ''; // Clear existing content
            container.appendChild(input);
            
            // Add close button
            const closeBtn = document.createElement('button');
            closeBtn.className = 'btn btn-light position-absolute';
            closeBtn.innerHTML = '<i class="fas fa-times"></i>';
            closeBtn.style.right = '25px';
            closeBtn.style.top = '50%';
            closeBtn.style.transform = 'translateY(-50%)';
            closeBtn.onclick = toggleSearch;
            container.appendChild(closeBtn);
        }
        
        // Focus on input
        searchBar.querySelector('input').focus();
    } else {
        searchBar.style.display = 'none';
        navRow.style.visibility = 'visible';
    }
}




















// // Get elements
// const cartSidebar = document.getElementById('cart-sidebar');
// const mobileMenu = document.getElementById('mobile-menu');
// const userDropdown = document.getElementById('user-dropdown');
// const userIcon = document.querySelector('.fa-user').parentElement;

// // Toggle Cart
// function toggleCart() {
//     cartSidebar.classList.toggle('active');
//     // document.body.style.overflow = cartSidebar.classList.contains('active') ? 'hidden' : '';
// }

// // Toggle Mobile Menu
// function toggleMobileMenu() {
//     mobileMenu.classList.toggle('active');
//     document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
// }

// // Setup User Dropdown
// userIcon.addEventListener('mouseenter', () => {
//     userDropdown.style.display = 'block';
// });

// userDropdown.addEventListener('mouseleave', () => {
//     userDropdown.style.display = 'none';
// });

// // Initialize
// document.addEventListener('DOMContentLoaded', () => {
//     // Clone categories for mobile menu
//     // const categories = document.querySelector('.category-list').cloneNode(true);
//     // document.querySelector('.menu-content').appendChild(categories);

//     // Add click listeners
//     document.querySelector('.fa-shopping-cart').parentElement.addEventListener('click', (e) => {
//         e.preventDefault();
//         toggleCart();
//     });

//     document.querySelector('.fa-bars').parentElement.addEventListener('click', (e) => {
//         e.preventDefault();
//         toggleMobileMenu();
//     });
// });


// // Get wishlist element
// const wishlistSidebar = document.getElementById('wishlist-sidebar');

// // Toggle Wishlist
// function toggleWishlist() {
//     wishlistSidebar.classList.toggle('active');
//     // document.body.style.overflow = wishlistSidebar.classList.contains('active') ? 'hidden' : '';
// }

// // Add this inside your DOMContentLoaded event listener
// document.addEventListener('DOMContentLoaded', () => {
//     // ... your existing code ...

//     // Add wishlist click listener
//     document.querySelector('.fa-heart').parentElement.addEventListener('click', (e) => {
//         e.preventDefault();
//         toggleWishlist();
//     });
// });

// Get elements
const cartSidebar = document.getElementById('cart-sidebar');
const wishlistSidebar = document.getElementById('wishlist-sidebar');
const mobileMenu = document.getElementById('mobile-menu');
const userDropdown = document.getElementById('user-dropdown');
const userIcon = document.querySelector('.fa-user').parentElement;

// Toggle Cart
function toggleCart() {
    cartSidebar.classList.toggle('active');
}

// Toggle Wishlist
function toggleWishlist() {
    wishlistSidebar.classList.toggle('active');
}

// Toggle Mobile Menu
function toggleMobileMenu() {
    mobileMenu.classList.toggle('active');
}

// Setup User Dropdown
// Function to toggle dropdown on click
function toggleDropdown() {
    if (userDropdown.style.display === 'block') {
        userDropdown.style.display = 'none'; // Hide dropdown
    } else {
        userDropdown.style.display = 'block'; // Show dropdown
    }
}

// Function to hide dropdown when clicking outside
function hideDropdownOnClickOutside(event) {
    if (!userIcon.contains(event.target) && !userDropdown.contains(event.target)) {
        userDropdown.style.display = 'none'; // Hide dropdown
    }
}

// Event listener for mobile toggle behavior
userIcon.addEventListener('click', () => {
    toggleDropdown();
});

// Add event listener to document for outside clicks
document.addEventListener('click', (event) => {
    hideDropdownOnClickOutside(event);
});


// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // // Clone categories for mobile menu
    // const categories = document.querySelector('.category-list').cloneNode(true);
    // document.querySelector('.menu-content').appendChild(categories);

    // Add click listeners
    document.querySelector('.fa-shopping-cart').parentElement.addEventListener('click', (e) => {
        e.preventDefault();
        toggleCart();
    });

    document.querySelector('.fa-heart').parentElement.addEventListener('click', (e) => {
        e.preventDefault();
        toggleWishlist();
    });

    document.querySelector('.fa-bars').parentElement.addEventListener('click', (e) => {
        e.preventDefault();
        toggleMobileMenu();
    });
});