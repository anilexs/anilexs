$(document).ready(function(){
    $('.singInbtn').on('click', function(e) {
        $(".password2, .info2, .singIn, .pseudo").css("display", "block");
        
        $(".info1, .login").css("display", "none");
    });
    $('.loginbtn').on('click', function(e) {
        $(".password2, .info2, .singIn, .pseudo").css("display", "none");
        $(".info1, .login").css("display", "block");
    });
});