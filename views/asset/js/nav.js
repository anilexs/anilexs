var currentUrl = window.location.href;
console.log(currentUrl);
$(document).ready(function(){
    $('#authentication').on('click', function(e) {
        authentication();
    });
});

function authentication(post){
    if(post != null){
        console.log(post);
    }
    var divAuthentication = $('<div class="divAuthenticationBack"></div>');
        divAuthentication.append('<div class="divAuthentication"></div>');
        
    $('body').prepend(divAuthentication);

    $('.divAuthenticationBack').on('click', function(e) {
        e.stopPropagation();
        $(divAuthentication).remove();
    });
    $('.divAuthentication').on('click', function(e) {
        e.stopPropagation();
    });
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $(divAuthentication).remove();
            $(document).off('keyup');
        }
    });
    
    $('.divAuthentication').load("http://localhost/anilexs/views/connexion?page="+currentUrl);
}