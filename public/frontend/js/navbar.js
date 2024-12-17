// Search Toggle
document.querySelector('.nav-icon .fa-search').parentElement.addEventListener('click', function(e) {
    e.preventDefault();
    const searchBar = document.querySelector('.search-bar');
    const navRow = document.querySelector('.nav-row');
    
    if (searchBar.style.display === 'none' || !searchBar.style.display) {
        searchBar.style.display = 'block';
        navRow.style.visibility = 'hidden';
        searchBar.querySelector('input').focus();
    }
});

document.querySelector('.close-search').addEventListener('click', function() {
    const searchBar = document.querySelector('.search-bar');
    const navRow = document.querySelector('.nav-row');
    
    searchBar.style.display = 'none';
    navRow.style.visibility = 'visible';
});