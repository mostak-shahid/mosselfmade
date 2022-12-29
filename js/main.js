jQuery(document).ready(function ($) {
    $('body').on('click', '.navbar-toggler', function () {
        $('body').toggleClass('mobile-menu-active');
    });



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
