/*==============================================================*/
// Raque Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Did you fill up the form properly?");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var phone_number = $("#phone_number").val();
        var captcha = $("#captcha").val();
        var message = $("#message").val();

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        $.ajax({
            type: "POST",
            url: "contact/form",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&phone_number=" + phone_number + "&message=" + message + "&captcha=" + captcha,
            beforeSend: function() {
                // setting a timeout
                $('.sendMesg').html('Please wait..');
                $('.sendMesg').attr('disabled');

            },
            success : function(data){
                // $('#reload').trigger('click');
              console.log(data)
                if($.isEmptyObject(data.errors)){

                // $('.sendMesg').html('');
                // $('.sendMesg').html('Send Message');
                // $("#name").val("");
                // $("#captcha").val("");
                // $("#email").val("");
                // $("#phone_number").val("");
                // $("#msg_subject").val("");
                // $("#message").val("");

                if (data.status == 200){
                    // formSuccess(data);
                    Toast.fire({
                        icon: 'success',
                        title: data.msg,
                             })
                             setTimeout(() => {
                                location.href="/contact-us"
                            }, 2000);
                   
                } else {
                    // formError();
                    // submitMSG(false,data.data);
                    Toast.fire({
                        icon: 'error',
                        title: 'Error, please try again',
                             })
                }

                }else{

                    $.each(data.errors, function(key, value){
                        Toast.fire({
                            icon: 'error',
                            title: value,
                                 })
                    });

                }

              
            }
        });
    }

    // function formSuccess(msg){
    //     $("#contactForm")[0].reset();

    //     submitMSG(true, msg.data)

    //     setTimeout(() => {
    //         location.reload()
    //     }, 1500);

    // }

    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-success";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery)); // End of use strict