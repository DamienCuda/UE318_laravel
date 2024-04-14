document.addEventListener('DOMContentLoaded', function() {
    const logout_btn = document.querySelector('#logout_btn');
    logout_btn.addEventListener('click', function(event){
        event.preventDefault();
        document.getElementById('logout-form').submit();
    })
});