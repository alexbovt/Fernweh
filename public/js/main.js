$(document).ready(function () {

    $("a[href='#top']").click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

//section auto refresh
    /*
    setInterval(function() {
        $("#refresh").load(location.href+" #refresh>*","");
    }, 10000);
    */
//end auto refresh

//section check password

    $('#inputPassword').keyup(function (e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        if (false == enoughRegex.test($(this).val())) {
            $('#passStrength').css('color', 'red');
            $('#passStrength').html('More Characters');
        } else if (strongRegex.test($(this).val())) {
            $('#passStrength').css('color', 'yellow');
            $('#passStrength').html('Strong!');
        } else if (mediumRegex.test($(this).val())) {
            $('#passStrength').css('color', 'blue');
            $('#passStrength').html('Medium!');
        } else {
            $('#passStrength').css('color', 'green');
            $('#passStrength').html('Weak!');
        }
        return true;
    });


    $('#inputConfirmPassword').keyup(function (e) {
        var password = $("#inputPassword").val();
        var password_confirm = $("#inputConfirmPassword").val();

        if (password != password_confirm) {
            $("#inputConfirmPassword").css('border', 'red 1px solid');
            $('#passCheck').css('color', 'red');
            $("#passCheck").html('Passwords do not match!');
        } else {
            $("#inputConfirmPassword").css('border', 'none');
            $("#passCheck").html('');
        }


    });

//end check password

//open create event form
    $('#elem').click(function (event) {
        event.preventDefault();
        $('#overlay').fadeIn(400,
            function () {
                $('#new-event-form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
            });
    });

    $('#new-event-form-close, #overlay').click(function () {
        $('#new-event-form')
            .animate({opacity: 0, top: '45%'}, 200,
                function () {
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
    });
    //end create event form

//section scroll-auto download content
    /*
    var loading = false;
    $(window).scroll(function(){
        if((($(window).scrollTop()+$(window).height())+250)>=$(document).height()){
            if(loading == false){
                loading = true;
                $('#loadingbar').css("display","block");
                $.get("load.php?start="+$('#loaded_max').val(), function(loaded){
                    $('body').append(loaded);
                    $('#loaded_max').val(parseInt($('#loaded_max').val())+50);
                    $('#loadingbar').css("display","none");
                    loading = false;
                });
            }
        }
    });

    $(document).ready(function() {
        $('#loaded_max').val(50);
    });
    */
//end scroll-auto download content
});