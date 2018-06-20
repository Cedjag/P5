    // Configurable values
    slider = $('.slider'); // Slider element
    slideDuration = 3000; // Duration of each slide in milliseconds
    slideSpeed = 1000; // Speed of slide animation in milliseconds (must be equal of less than slideDuration)
 
 
    width = slider.width();
    slider.children().hide().css({left: width});
    slider.children(':first').show().css({left: 0});
 
    // Slide in from the left
    $.fn.slideIn = function () {
        $(this).show().animate({
            left: "-=" + width
        }, slideSpeed / 2);
    }
 
    // Slide out to the left
    $.fn.slideOut = function () {
        $(this).animate({
            left: "-=" + width
        }, slideSpeed / 2, function () {
            $(this).hide().css({left: width});
        });
    }
 
    // Main slide function
    function slide() {
        currentSlide = slider.find('div:visible:first');
        nextSlide = (!slider.children(":last").is(":visible")) ? currentSlide.next() : slider.children(':first');
 
        currentSlide.slideOut();
        nextSlide.slideIn();
    }
 
    // Timer function
    window.setInterval(function () {
        slide();
    }, slideDuration);