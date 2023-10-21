// swiper
var swiper = new Swiper(".mySwiper ",{
  loop:true,
  autoplay:{
    delay:2500,
    disableOnInteraction:false,
  },
  slidesPerview:1,
  spaceBetween:10,
  pagination:{
    el: ".swpier-pagination",
    clickable: true,
  },
  breakpoints:{
    649:{
      slidesPerview:2,
      spaceBetween:20,
    },
    768:{
      slidesPerview:3,
      spaceBetween:40,
    },
    1024:{
      slidesPerview:3,
      spaceBetween:50,
    }
  }
})