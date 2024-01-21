document.getElementById('logoutButton').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent the default link behavior

    fetch('logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    }).then(() => {
        window.location.href = 'login'; // Redirect to login page after logout
    }).catch((error) => {
        console.error('Error:', error);
    });
});
