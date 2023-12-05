<script>
    new WOW().init();

    $(document).ready(function() {
        $(".slick-carousel-hero").slick({
            rtl: false,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 800,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            appendArrows: $(".arrows-slick-hero"),
            prevArrow: '<span class="slick-prev"><i class="ri-arrow-left-s-line ri-2x"></i></span>',
            nextArrow: '<span class="slick-next"><i class="ri-arrow-right-s-line ri-2x"></i></span>',
            easing: "linear"
        }).on('init', function() {
            new WOW().init();
        });


        // Re-initialize WOW.js on each navigation
        // $(".slick-carousel-hero").on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        //     // Re-initialize WOW.js
        //     initWow();
        // });




        // Main/Product image slider for product page
        $(' .main-img-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 300,
            lazyLoad: 'ondemand',
            //   appendArrows:$(".arrows-slick-single"), // Class For Arrows Buttons
            //     prevArrow:'<span class="slick-prev"><i class="ri-arrow-left-s-line ri-2x"></i></span>',
            //     nextArrow:'<span class="slick-next"><i class="ri-arrow-right-s-line ri-2x"></i></span>',
        });
        // Thumbnail/alternates slider for product page
        $('.thumb-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            centerPadding: '0px',
            asNavFor: '.main-img-slider',
            dots: false,
            centerMode: false,
            draggable: true,
            speed: 200,
            focusOnSelect: true,
            appendArrows: $(".arrows-slick-single"), // Class For Arrows Buttons
            prevArrow: '<span class="slick-prev"><i class="ri-arrow-left-s-line ri-2x"></i></span>',
            nextArrow: '<span class="slick-next"><i class="ri-arrow-right-s-line ri-2x"></i></span>',
        });

        //keeps thumbnails active when changing main image, via mouse/touch drag/swipe
        $('.main-img-slider').on('afterChange', function(event, slick, currentSlide, nextSlide) {
            //remove all active class
            $('.thumb-nav .slick-slide').removeClass('slick-current');
            //set active class for current slide
            $('.thumb-nav .slick-slide:not(.slick-cloned)').eq(currentSlide).addClass('slick-current');
        });
    })
</script>
