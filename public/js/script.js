//--------------- Owl-carouysel  diaporama portfolio ---------------
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items:3,
        autoplay: true,
        loop: true,
        nav: false,
        dots: false,
        margin: 50,
        responsiveClass:true,
        responsive: {
            0:{
                items: 1
            },

            750:{
                items: 2
            },

            1170:{
                items: 3
            }
        }
    });
    
  });