/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).load(function () {

    $("#flexiselDemo1").flexisel({
        visibleItems: 6,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
                visibleItems: 2
            },
            landscape: {
                changePoint: 640,
                visibleItems: 3
            },
            tablet: {
                changePoint: 768,
                visibleItems: 4
            }
        }
    });


    $("#flexiselDemo2").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
                visibleItems: 2
            },
            landscape: {
                changePoint: 640,
                visibleItems: 3
            },
            tablet: {
                changePoint: 768,
                visibleItems: 3
            }
        }
    });
});



