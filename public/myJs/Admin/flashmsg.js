    // Automatically close flash messages after 5 seconds
    window.addEventListener('DOMContentLoaded', function() {
    var successMessage = document.getElementById('success-message');
    var errorMessage = document.getElementById('error-message');

    if (successMessage) {
    setTimeout(function() {
    successMessage.remove();
}, 3000);
}

    if (errorMessage) {
    setTimeout(function() {
    errorMessage.remove();
}, 3000); // 5 seconds
}
});
