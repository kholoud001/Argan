document.addEventListener("DOMContentLoaded", function() {
    var token = localStorage.getItem("access_token");

    axios.get('/api/auth-check', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(function(response) {
            console.log(response);
            if (response.data.authenticated) {
                document.getElementById('account-link').setAttribute('href', '/account');
            } else {
                document.getElementById('account-link').setAttribute('href', '/login');
            }
        })
        .catch(function(error) {
            document.getElementById('account-link').addEventListener('click', function(event) {
                event.preventDefault();
               // console.log(error);
                window.location.href = '/login';
            });
        });
});
