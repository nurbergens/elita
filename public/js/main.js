
$(document).ready(function(){
//
//   // $('.cookie').addClass('active');
//
//   // $('.cookie__btn').click(function() {
//   //   $('.cookie').removeClass('active');
//   // })
//
//
//   $('.nav__link, .hidden').hover(function() {
//     $('.hidden').toggleClass('open')
//
//     if($(this).hasClass('nav__link')) {
//         $('.hidden__menu').text("");
//         let currentItems = [];
//
//         if(currentMenuItem = $(this).data('name')) {
//           currentItems = menu[currentMenuItem][0].children;
//         }
//
//         if (currentItems.length > 0) {
//             $(this).children(".nav__arrow").toggleClass("active")
//
//             currentItems.forEach(function (item) {
//
//               let itemLink = `<a href="${item.url}" class="hidden__link">${item.title}</a>`;
//               let itemSubmenu = '';
//
//               if(item.inner_children && item.inner_children.length > 0) {
//                 item.inner_children.forEach(function (child) {
//                   itemSubmenu += `<a href="${child.url}" class="hidden__link">${child.title}</a>`;
//                 })
//               }
//
//               $(".hidden__menu").append(`<div class="hidden__item">${itemLink}`+ (itemSubmenu ? `<ul class="hidden__list">${itemSubmenu}</ul>` : ''));
//
//             })
//
//             // $('.hidden__item').hover(function() {
//             //   console.log($(this))
//             //   console.log(currentItems[0].inner_children);
//             // })
//
//
//         } else {
//             $('.hidden').removeClass('open')
//         }
//     }
// })
//
//   $(".gallery__img").click(function() {
//     var overlay = $("<div id='overlay'></div>");
//     overlay.appendTo("body");
//     var imgLocation = $(this).attr("src");
//     var enlargedImg = $("<img src=" + imgLocation + ">")
//     enlargedImg.appendTo(overlay);
//     var button = $("<button class='close'>&times;</button>");
//     button.appendTo(overlay);
//     button.click(function(){
//       overlay.remove();
//     });
//   });
//
//   $('.team__btn').click(function() {
//     let aboutText = $(this).siblings(".team__about")
//
//     if(aboutText.hasClass('active')) {
//       aboutText.removeClass('active')
//       $(this).text("Read more")
//
//     } else {
//       aboutText.addClass('active')
//       $(this).text("Close")
//     }
//   })
//
//
  $('.offer__slider').slick({
    prevArrow: '<button type="button" class="slick-prev"><img src="' + location.origin + '/img/angle-left-solid.svg" class="projects__left"></button>',
    nextArrow: '<button type="button" class="slick-next"><img src="' + location.origin + '/img/angle-right-solid.svg" class="projects__right"></button>',
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 578,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

    $('.ham').click(function() {
        $('.hidden').toggleClass("show")
        $('.ham').toggleClass("open")
        $('body').toggleClass("overflow-hidden")
    })

    $('.ham__close').click(function() {
        $('.hidden').removeClass('show')
    })
})

let i = 1;
let incerment = true;
let timerId = setInterval(function (){
    (i<10 && incerment) ? console.log(i++) : ((i>0) ? (console.log(i--), incerment=false) : clearInterval(timerId) )
}, 100);
