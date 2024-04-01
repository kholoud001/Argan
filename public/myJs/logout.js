document.getElementById('logout-btn').addEventListener('click', function(event) {
    event.preventDefault();
    console.log("clicked!");

    // Check if access_token exists in localStorage
    var token = localStorage.getItem('access_token');
    if (!token) {
        console.error('Access token not found');
        return;
    }

    fetch('/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            // Handle logout success
            console.log(data.message);
            // Redirect to the login page or perform any other action
            window.location.href = data.redirect_url;
        })
        .catch(error => {
            console.error('Error:', error);
        });
});
