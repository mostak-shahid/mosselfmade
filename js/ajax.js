jQuery(document).ready(function ($) {
    //console.log(mos_ajax_object.ajaxurl);
    /*Stepper*/
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );
    var form = $("#example-advanced-form");

    form.steps({
            headerTag: ".step-title",
            bodyTag: "fieldset",
            //            transitionEffect: "slideLeft",
            titleTemplate: '<span class="number">#index#</span>', //<span class="number">#index#.</span> #title#
            labels: {
                finish: 'Subscribe', //Finish 
            },
            enableFinishButton: false,
            onStepChanging: function (event, currentIndex, newIndex) {

                // Allways allow previous action even if the current form is not valid!
                //                    if (currentIndex > newIndex) {
                //                        return true;
                //                    }

                // Forbid next action on "Warning" step if the user is to young
                //                    if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                //                        return false;
                //                    }

                // Needed in some cases if the user went back (clean up)
                //                    if (currentIndex < newIndex) {
                //                        // To remove error styles
                //                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                //                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                //                    }

                //                    form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                //            console.log('priorIndex: ', priorIndex);
                //            console.log('currentIndex: ', currentIndex);
                $('body').removeClass('singup-current-step-' + priorIndex).addClass('singup-current-step-' + currentIndex);
                if (currentIndex === 3) {
                    //                $("#card_number").inputmask();
                    $(":input").inputmask();
                    //                $("#card_number").trigger("input");
                }
                //                // Used to skip the "Warning" step if the user is old enough.
                //                if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                //                    form.steps("next");
                //                }
                //
                //                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                //                if (currentIndex === 2 && priorIndex === 3) {
                //                    form.steps("previous");
                //                }
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                //alert("Submitted!");
                $.ajax({
                    url: mos_ajax_object.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
                    type:"POST",
                    dataType:"json",
                    data: {
                        'action': 'mos_user_register',
                        'data' : form.serialize(),
                    },
                    success: function(result){
                        //console.log(result);
                        if (result) {
                            form.hide();
                            $('.signup-completed').show();
                        }
                        //$('.track-output').html(result);
                    },
                    error: function(errorThrown){
                        console.log(errorThrown);
                    }
                });                
//                form.hide();
//                $('.signup-completed').show();
//                console.log(form.serialize())
            }
        })
        .validate({
            onkeyup: false,
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                full_name: {
                    required: true,
                    regex: "^[a-zA-Z '.-]{3,50}$"
                },
                user_email: {
                    required: true,
                    email: true,
                    remote: {
                        //url: 'http://localhost/selfmade/wp-content/themes/mosselfmade/functions/check-email.php',
                        url: mos_ajax_object.ajaxurl,
                        //url: 'http://localhost/selfmade/wp-admin/admin-ajax.php',
                        type: "post",
                        dataType: 'json',
                        data: {
                            action: 'register_email_check',
                            user_email: function () {
                                return $("#user_email").val();
                            },
                        }
                    }
                },
                password: {
                    required: true,
                    regex: "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"
                },
                confirm: {
                    equalTo: "#password"
                },
                pricing: {
                    required: true
                }
            },
            messages: {
                full_name: {
                    required: 'Full name is required',
                    regex: 'Only alphabets are allowed'
                },
                user_email: {
                    remote: 'This email has already taken.'
                },
                password: {
                    regex: 'Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character'
                },
                pricing: {
                    required: ''
                },
            },
            errorElement: "div",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group").find('.mos-form-validate').addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group").find('.mos-form-validate').addClass("is-valid").removeClass("is-invalid");
            }
        });


    $('body').on('click', '.registration-complete', function () {
        form.steps("finish", 0, {});
    });
    /*Stepper*/
    //$('body').on('click', '.projects-wrapper .pagination-wrapper .page-numbers', function (e){

    /*$('.track-form').submit(function(e){
		e.preventDefault();
		var form_data = $(this).serialize();
		console.log(form_data);
        $.ajax({
            url: mos_ajax_object.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
            type:"POST",
            dataType:"json",
            data: {
                'action': 'order_tracking',
                'form_data' : form_data,
            },
            success: function(result){
                // console.log(result);
                $('.track-output').html(result);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
	});*/
});
