const toggle = document.getElementById('darkModeToggle');

toggle.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
    const container = document.querySelector('.container');
    container.classList.toggle('dark-mode');

    // Toggle input fields to dark mode styles
    const inputs = document.querySelectorAll('input[type="text"], input[type="email"], textarea');
    inputs.forEach(input => {
        input.classList.toggle('dark-mode');
    });

    // Save preference to local storage
    if (toggle.checked) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});

// Check local storage for dark mode preference on load
if (localStorage.getItem('darkMode') === 'enabled') {
    toggle.checked = true;
    document.body.classList.add('dark-mode');
    document.querySelector('.container').classList.add('dark-mode');
    document.querySelectorAll('input[type="text"], input[type="email"], textarea').forEach(input => {
        input.classList.add('dark-mode');
    });
}
