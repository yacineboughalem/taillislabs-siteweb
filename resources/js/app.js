// import "bootstrap/js/dist/base-component";

import "bootstrap/js/dist/base-component";


// Sticky
// $(function () {
//     var pageScroll = 500;
//     $(window).scroll(function () {
//         var scroll = getCurrentScroll();
//         if (scroll >= pageScroll) {
//             $(".header__area").addClass("sticky");
//             // $(".header__area").css("display", "block");
//         } else {
//             $(".header__area").removeClass("sticky");
//             // $(".header__area").css("display", "none");

//         }
//     });

//     function getCurrentScroll() {
//         return window.pageYOffset || document.documentElement.scrollTop;
//     }
// });

const nav = document.querySelector("header");
const navHeight = 100;
// the point the scroll starts from (in px)
let lastScrollY = 40;
// how far to scroll (in px) before triggering
const delta = 10;

// function to run on scrolling
function scrolled() {
  let sy = window.scrollY;

  // only trigger if scrolled more than delta
  if (Math.abs(lastScrollY - sy) > delta) {
    // scroll down -> hide nav bar
    if (sy > lastScrollY && sy > navHeight) {
      nav.classList.add("nav-up");
      nav.classList.remove("sticky");
    }
    // scroll up -> show nav bar
    else if (sy < lastScrollY) {
      nav.classList.remove("nav-up");
      nav.classList.add("sticky");

    }

    // update current scroll point
    lastScrollY = sy
  }

  if (sy == 0) {
    nav.classList.remove("sticky");
  }

}

// Add event listener & debounce so not constantly checking for scroll
let didScroll = false;
window.addEventListener("scroll", function (e) {
  didScroll = true;
});

setInterval(function () {
  if (didScroll) {
    scrolled();
    didScroll = false;
  }
}, 500)







// Footer Toggle
var acc = document.getElementsByClassName('widget--head');
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener('click', function () {
    this.classList.toggle('active');
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + 'px';
    }
  });
}



// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}

// accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}



// 

var wrapper = document.getElementById("grid--4");

document.addEventListener("click", function (event) {
  if (!event.target.matches(".mode--list")) return;

  // List view
  event.preventDefault();
  wrapper.classList.add("mode--list");
  wrapper.classList.add("mode--list");
});

document.addEventListener("click", function (event) {
  if (!event.target.matches(".mode--grid")) return;

  // List view
  event.preventDefault();
  wrapper.classList.remove("mode--list");
});


// ----------------- Slide Range
const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right =
          100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});




// 
$(document).ready(function(){
  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom', 
    gallery:{
        enabled:true
      },

    zoom: {
      enabled: true, 

      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function

      opener: function(openerElement) {

        return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  }
  });
});



// 
// let keywords = [
//   'HTML', 'CSS', 'JAVASCRIPT', 'EOEOEO'
// ]
// const resultBox = document.querySelector(".result--box")
// const inputBox = document.getElementById("input--box")

// inputBox.onkeyup = function () {
//   let result = [];
//   let input = inputBox.value;

//   if (input.length) {
//     result = keywords.filter((keyword) => {
//       return keyword.toLowerCase().includes(input.toLowerCase());
//     });

//     console.log(result);
//   }

//   display(result);

//   if(!result.length) {
//     resultBox.innerHTML ="";
//   }
// }


// function display(result) {
//   const content = result.map((list) => {
//     return "<li onclick=selectItem(this)>" + list + "</li>"
//   })

//   resultBox.innerHTML = "<ul>" + content.join('') + "</ul>"
// }

// function selectItem(list) {
//   inputBox.value = list.innerHTML;
//   resultBox.innerHTML = "";
// }



// Acc
$(document).on("click", ".tabs__wrap .menu div", function() {
	var numberIndex = $(this).index();

	if (!$(this).is("active")) {
		$(".tabs__wrap .menu div").removeClass("active");
		$(".tabs__wrap ul li").removeClass("active");

		$(this).addClass("active");
		$(".tabs__wrap ul").find("li:eq(" + numberIndex + ")").addClass("active");

		var listItemHeight = $(".tabs__wrap ul")
			.find("li:eq(" + numberIndex + ")")
			.innerHeight();
		$(".tabs__wrap ul").height(listItemHeight + "px");
	}
});
