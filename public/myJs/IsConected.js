

var token = localStorage.getItem("access_token");
if(token == null){
    window.location.href = '/login';
}else{
    axios.get('/api/auth-check', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
        .then(function(response) {

        })
        .catch(function(error) {
            window.location.href = '/login';
        });

}



