
var token = localStorage.getItem("access_token");

axios.get('/api/admin-check', {
    headers: {
        'Authorization': 'Bearer ' + token
    }
})
    .then(response => {
        //console.log(response)
        if (response.data === true) {
            console.log('User is an admin.');
        } else {
            console.log('User is not an admin.');
            window.location.href = '/home';
        }
    })
    .catch(error => {
        console.log('Error occurred while checking admin status:', error);
    });
