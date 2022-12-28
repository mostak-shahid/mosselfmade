jQuery(document).ready(function ($) {
    $('body').on('click', '.navbar-toggler', function () {
        $('body').toggleClass('mobile-menu-active');
    });
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
            transitionEffect: "slideLeft",
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
            onStepChanged: function(event, currentIndex, priorIndex) {
                console.log('priorIndex: ', priorIndex);
                console.log('currentIndex: ', currentIndex);
                $('body').removeClass('singup-current-step-' + priorIndex).addClass('singup-current-step-' + currentIndex);
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
                alert("Submitted!");
                form.hide();
                $('.signup-completed').show();
            }
        })
        .validate({
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
                    email: true
                },
                pricing: {
                    required: true
                },
                confirm: {
                    equalTo: "#password"
                }
            },
            messages: {
                full_name: {
                    required: 'Full name is required',
                    regex: 'Only alphabets are allowed'
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
    /*Stepper*/



    //    $(window).scroll(function () {
    //        if ($(this).scrollTop() > 100) {
    //            $('.main-header').addClass('tiny');
    //            $('.scrollup').fadeIn();
    //        } else {
    //            $('.main-header').removeClass('tiny');
    //            $('.scrollup').fadeOut();
    //        }
    //    });
    //    $('.scrollup').click(function () {
    //        $("html, body").animate({
    //            scrollTop: 0
    //        }, 600);
    //        return false;
    //    });

    //    var $grid = $('.grid').isotope({
    //        itemSelector: '.grid-item',
    ////        layoutMode: 'fitRows',
    //        percentPosition: true,
    //        masonry: {
    //            columnWidth: '.grid-sizer'
    //        }
    //    });
    //    var filterFns = '';
    //    $('.filters-button-group').on('click', 'li', function() {
    //        var filterValue = $(this).attr('data-filter');
    //        // use filterFn if matches value
    //        filterValue = filterFns[filterValue] || filterValue;
    //        //console.log(filterValue);
    //        $grid.isotope({
    //            filter: filterValue
    //        });
    //    });
    //    // change is-checked class on buttons
    //    $('.filters-button-group').each(function(i, buttonGroup) {
    //        var $buttonGroup = $(buttonGroup);
    //        $buttonGroup.on('click', 'li', function() {
    //            $buttonGroup.find('.active').removeClass('active');
    //            $(this).addClass('active');
    //        });
    //    });   

    //    $(".mos-menu-list li:has('ul')").prepend("<span class='down-arrow'></span>");
    //    $('body').on('click', '.down-arrow', function () {
    //        $(this).parent().toggleClass('open-below');
    //        $(this).siblings("ul").slideToggle();
    //    });
    //    $(".megamenu > .sub-menu > li").wrapInner('<div class="mega-menu-unit"></div>');

    //    new WOW().init();
    //    $('.slick-slider').slick();

    //    Fancybox.bind('.block-fancybox-advanced, .slick-active .slider-fancybox-advanced', {
    //        groupAttr: false,
    //    });
    //
    //    Fancybox.bind(".block-fancybox, .slick-active .slider-fancybox", {
    //        animated: false,
    //        showClass: false,
    //        hideClass: false,
    //
    //        click: false,
    //
    //        dragToClose: true,
    //
    //        closeButton: "top",
    //
    //        Thumbs: false,
    //        Toolbar: false,
    //
    //        Carousel: {
    //            Dots: true,
    //            Navigation: false,
    //        },
    //
    //        Image: {
    //            zoom: false,
    //            fit: "contain-w",
    //        },
    //    });

});


const videoModal = document.getElementById('videoModal')
if (videoModal) {
    videoModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        //const modalBodyInput = videoModal.querySelector('.modal-body input')
        const iframe = videoModal.querySelector('#videoModal iframe')
        //modalBodyInput.value = recipient
        iframe.src = recipient
    })
}
document.addEventListener('scroll', (e) => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    //    if (scrollTop > 100) document.querySelector('#btt-btn').style.display = "block";
    //    else document.querySelector('#btt-btn').style.display = "none"
    if (scrollTop > 100) {
        if (document.querySelector('#header')) document.querySelector('#header').classList.add("tiny");
        if (document.querySelector('#btt-btn')) document.querySelector('#btt-btn').classList.add("active");
    } else {
        if (document.querySelector('#header')) document.querySelector('#header').classList.remove("tiny");
        if (document.querySelector('#btt-btn')) document.querySelector('#btt-btn').classList.remove("active");
    }
})

// When the user clicks on the button, scroll to the top of the document
function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
