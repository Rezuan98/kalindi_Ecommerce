document.querySelectorAll('.product-card').forEach(card => {
    const dots = card.querySelectorAll('.dot');
    const mainImage = card.querySelector('.main-image img');
    
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            // Remove active class from all dots
            dots.forEach(d => d.classList.remove('active'));
            // Add active class to clicked dot
            dot.classList.add('active');
            // Change image source
            mainImage.src = dot.dataset.image;
        });
    });
});

// Wishlist Toggle
document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        btn.classList.toggle('active');
        const icon = btn.querySelector('i');
        icon.classList.toggle('far');
        icon.classList.toggle('fas');
    });
});

// Add to your existing JavaScript
document.querySelectorAll('.quickview-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        // Add your quick view functionality here
    });
});

// document.querySelectorAll('.plus-btn').forEach(btn => {
//     btn.addEventListener('click', () => {
//         // Add your plus button functionality here
//     });
// });


// Add touch event handling for mobile
document.querySelectorAll('.product-box').forEach(box => {
    const dots = box.querySelectorAll('.dot');
    const mainImage = box.querySelector('.product-image img');
    
    dots.forEach(dot => {
        ['click', 'touchend'].forEach(evt => 
            dot.addEventListener(evt, (e) => {
                e.preventDefault();
                dots.forEach(d => d.classList.remove('active'));
                dot.classList.add('active');
                mainImage.src = dot.dataset.image;
            })
        );
    });
});


// Function to open the side menu for quick view
function openMenu() {
    document.getElementById('quickview-menu').classList.add('active');
}

// Function to close the side menu
function closeMenu() {
    document.getElementById('quickview-menu').classList.remove('active');
}
