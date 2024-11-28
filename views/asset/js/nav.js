var currentUrl = window.location.href;
console.log(currentUrl);
$(document).ready(function(){
    $('#authentication').on('click', function(e) {
        var cla = $(this).attr('class');
        authentication(cla);
    });
});

function authentication(cla){
    console.log((cla !== null ? cla : null));

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
    
    $('.divAuthentication').load("http://localhost/anilexs/views/connexion?page="+currentUrl + (cla != null ? '&type=2' : ''));
}