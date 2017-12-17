$(document).ready(function () {

    $("a[href='#top']").click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    //open auto refresh
    /*
    setInterval(function() {
        $("#refresh").load(location.href+" #refresh>*","");
    }, 10000);
    */
    //end auto refresh

    //open check password

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
    $(document).ready(function () {
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
                    });
        });

        $('#meeting').bind("click", function () {
            document.getElementById('form-meeting').style.display = 'block';
            document.getElementById('form-travel').style.display = 'none';
        });

        $('#travel').bind("click", function () {
            document.getElementById('form-meeting').style.display = 'none';
            document.getElementById('form-travel').style.display = 'block';
        });

        $('#delete-event').click(function (event) {
            event.preventDefault();
            $('#overlay').fadeIn(400,
                function () {
                    $('#delete-event-form')
                        .css('display', 'block')
                        .animate({opacity: 1, top: '50%'}, 200);
                });
        });

        $('#delete-event-form-close, #overlay').click(function () {
            $('#delete-event-form')
                .animate({opacity: 0, top: '45%'}, 200,
                    function () {
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    });
        });

        $('#delete-event-resignation, #overlay').click(function () {
            $('#delete-event-form')
                .animate({opacity: 0, top: '45%'}, 200,
                    function () {
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    });
        });


        var element = document.getElementById("messages"); //скроллинг в диалоге
        element.scrollTop = element.scrollHeight;

        $('#new-message-area').each(function () { //отправка сообщения
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:auto;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        $('.new-message').each(function () {
            $(this).find('textarea').keypress(function (e) {
                document.getElementById('send-message').style.display='inline-block';
                // Enter pressed
                if (e.which == 10 || e.which == 13) {
                    sendMessage()
                }
            });
            document.getElementById('send-message').addEventListener("click", sendMessage);

            function sendMessage() {
                if (event.preventDefault) event.preventDefault();
                if (document.getElementById('new-message-area').value === '') {
                    document.getElementById('new-message-area').style.background = 'pink';
                    document.getElementById('send-message').style.display='none';
                }
                else {
                    //this.form.submit();
                    document.getElementById('new-message-area').style.background = 'lightgreen';
                    document.getElementById('send-message').style.display='none';
                }
            }
        });

    });
    //end create event form

    //open  scroll-auto download content
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