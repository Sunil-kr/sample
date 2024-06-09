

// Cookies
$(document).on('ready', function(){
  cookiesPolicyBar()
});

function cookiesPolicyBar(){
    // Check cookie 
    if ($.cookie('yourCookieName') != "active") $('#cookieAcceptBar').show(); 
    //Assign cookie on click
    $('#cookieAcceptBarConfirm').on('click',function(){
        $.cookie('yourCookieName', 'active', { expires: 365, domain: '.website.dk' }); // cookie will expire in one day
        $('#cookieAcceptBar').fadeOut();
    });
}







$(document).ready(function() {
  $("#news-slider").owlCarousel({
      items : 4,
      itemsDesktop:[1199,3],
      itemsDesktopSmall:[980,2],
      itemsMobile : [600,1],
      navigation:true,
      navigationText:["",""],
      pagination:true,
      autoPlay:true
  });
});




$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:5
        }
    }
  });
});




// Map
var countryElements = document.getElementById('countries').childNodes;
    var countryCount = countryElements.length;
    for (var i = 0; i < countryCount; i++) {
      countryElements[i].onclick = function() {
        alert('You clicked on ' + this.getAttribute('data-name'));
      }
    }


    // $(document).ready(function(){
    //   $("#team_owl").owlCarousel({
    //       loop:true,
    //     margin:10,
    //     nav:true,
    //     autoplay:true,
    //     autoplayTimeout:3000,
    //     autoplayHoverPause:true,
    //     center: true,
    //     navText: [
    //         "<i class='fa fa-angle-left'></i>",
    //         "<i class='fa fa-angle-right'></i>"
    //     ],
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:1
    //         },
    //         1000:{
    //             items:3
    //         }
    //     }
    //   });
    // });


   



    // Dropdown
//     let index = 1;

// const on = (listener, query, fn) => {
// 	document.querySelectorAll(query).forEach(item => {
// 		item.addEventListener(listener, el => {
// 			fn(el);
// 		})
// 	})
// }

// on('click', '.selectBtn', item => {
// 	const next = item.target.nextElementSibling;
// 	next.classList.toggle('toggle');
// 	next.style.zIndex = index++;
// });
// on('click', '.option', item => {
// 	item.target.parentElement.classList.remove('toggle');

// 	const parent = item.target.closest('.select').children[0];
// 	parent.setAttribute('data-type', item.target.getAttribute('data-type'));
// 	parent.innerText = item.target.innerText;
// })




// Counter

function inVisible(element) {
  //Checking if the element is
  //visible in the viewport
  var WindowTop = $(window).scrollTop();
  var WindowBottom = WindowTop + $(window).height();
  var ElementTop = element.offset().top;
  var ElementBottom = ElementTop + element.height();
  //animating the element if it is
  //visible in the viewport
  if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
    animate(element);
}

function animate(element) {
  //Animating the element if not animated before
  if (!element.hasClass('ms-animated')) {
    var maxval = element.data('max');
    var html = element.html();
    element.addClass("ms-animated");
    $({
      countNum: element.html()
    }).animate({
      countNum: maxval
    }, {
      //duration 5 seconds
      duration: 9000,
      easing: 'linear',
      step: function() {
        element.html(Math.floor(this.countNum) + html);
      },
      complete: function() {
        element.html(this.countNum + html);
      }
    });
  }

}

//When the document is ready
$(function() {
  //This is triggered when the
  //user scrolls the page
  $(window).scroll(function() {
    //Checking if each items to animate are 
    //visible in the viewport
    $("h2[data-max]").each(function() {
      inVisible($(this));
    });
  })
});













// Disclaimer
jQuery(document).ready(function () {
  function openFancybox() {
      setTimeout(function () {
          jQuery('#popuplink').trigger('click');
      }, 500);
  };
  var visited = jQuery.cookie('visited');
  if (visited == 'yes') {
       // second page load, cookie active
  } else {
      openFancybox(); // first page load, launch fancybox
  }
  jQuery.cookie('visited', 'yes', {
      expires: 365 // the number of days cookie  will be effective
  });
  jQuery("#popuplink").fancybox({modal:true, maxWidth: 400, overlay : {closeClick : true}});
});
