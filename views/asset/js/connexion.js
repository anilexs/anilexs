$(document).ready(function(){
    $('.singInbtn').on('click', function(e) {
        $(".password2, .info2, .singIn, .pseudo").css("display", "block");
        
        $(".info1, .login").css("display", "none");
    });
    $('.loginbtn').on('click', function(e) {
        $(".password2, .info2, .singIn, .pseudo").css("display", "none");
        $(".info1, .login").css("display", "block");
    });
    
    $('.reload').on('click', function(e) {
        $(".input input").val("");
    });
    
    $('.singIn').on('click', function(e) {

        var loading = $('<div class="loading"></div>');
        
            loading.append('<div class="loadingGifContenaire"></div>');
            $('.loadingGifContenaire').append('<div class="loadingGif"></div>');
            $('.loadingGifContenaire').append('<div class="loadingGifBar"></div>');
            
        $('.contenaire').prepend(loading);

        var pseudo = $("#pseudo").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();


        var conditionTXT = pseudo !== '' && email !== '' && password !== '' && password2 !== '';
        var conditionEmail =  email.indexOf('@') !== -1 && email.indexOf('.') !== -1;
         
        if(password === password2 && conditionEmail && conditionTXT){
            var data = {
                pseudo: pseudo,
                email: email,
                password: password,
                password2: password2
            }

            // $.ajax({
            //     url: "http://localhost/anilexs/form/UserForm.php",
            //     type: 'POST',
            //     data: {
            //         action: "singIn",
            //         data: data,
            //     },
            //     dataType: 'json',
            //     success: function (response) {
            //         console.log(response);
            //     },
            //     error: function (xhr, status, error) {
            //         console.error('Une erreur s\'est produite lors du chargement du contenu.');
            //     }
            // });
        }else{
            console.log("error");
        }
    });
    
    // $('.singIn').on('click', function(e) {
    //     var email = $("#email").val();
    //     var password = $("#password").val();


    //     var conditionTXT = email !== '' && password !== '';
    //     var conditionEmail =  email.indexOf('@') !== -1 && email.indexOf('.') !== -1;
         
    //     if(conditionEmail && conditionTXT){
    //         var data = {
    //             pseudo: pseudo,
    //             email: email,
    //             password: password,
    //             password2: password2
    //         }

    //         $.ajax({
    //             url: "http://localhost/anilexs/controller/connexionAjaxController.php",
    //             type: 'POST',
    //             data: {
    //                 action: "singIn",
    //                 data: data,
    //             },
    //             dataType: 'json',
    //             success: function (response) {
    //                 console.log(response);
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('Une erreur s\'est produite lors du chargement du contenu.');
    //             }
    //         });
    //     }
    // });



    function string(length) {
        var chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var result = '';
        for (var i = 0; i < length; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }

    $('#rendom').on('click', function(e) {
        var pseudo = string(5);
        var email = string(5);
        email += '@example.com';
        var password = string(5);

        $('#pseudo').val(pseudo);
        $('#email').val(email);
        $('#password').val(password);
        $('#password2').val(password);
    });
});