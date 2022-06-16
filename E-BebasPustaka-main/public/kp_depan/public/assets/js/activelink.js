// active link jquery
// $(".navbar-nav .nav-item a").on("click", function(){
//     $(".nav-item").find(".active").removeClass("active");
//     $(this).addClass("active");
//   }
// );

// vanila1
const links = document.querySelectorAll('.nav-link');
const sections = document.querySelectorAll('section');

function changeLinkState() {
  let index = sections.length;

  while(--index && window.scrollY + 50 < sections[index].offsetTop) {}
  
  links.forEach((link) => link.classList.remove('active'));
  links[index].classList.add('active');
}

changeLinkState();
window.addEventListener('scroll', changeLinkState);

(function () {
  var section = document.querySelectorAll(".section");
  var sections = {};
  var i = 0;

  Array.prototype.forEach.call(section, function (e) {
      sections[e.id] = e.offsetTop;
  });

  window.onscroll = function () {
      var scrollPosition = document.documentElement.scrollTop ||
          document.body.scrollTop;

      for (i in sections) {
          if (sections[i] <= scrollPosition) {
              $('.nav-link').parent().removeClass('active');
              document.querySelector('a[id*=' + i +']').parentElement.setAttribute('class', 'active');
          }
      }
  };

})();


// const makeNavLinksSmooth = ( ) => {
//   const navLinks = document.querySelectorAll( '.nav-link' );

//   for ( let n in navLinks ) {
//     if ( navLinks.hasOwnProperty( n ) ) {
//       navLinks[ n ].addEventListener( 'click', e => {
//         e.preventDefault( );
//         document.querySelector( navLinks[ n ].hash )
//           .scrollIntoView( {
//             behavior: "smooth"
//           } );
//       } );
//     }
//   }
// }

// const spyScrolling = ( ) => {
//   const sections = document.querySelectorAll( 'section' );

//   window.onscroll = ( ) => {
//     const scrollPos = document.documentElement.scrollTop || document.body.scrollTop;

//     for ( let s in sections )
//       if ( sections.hasOwnProperty( s ) && sections[ s ].offsetTop <= scrollPos ) {
//         const id = sections[ s ].id;
//         document.querySelector( '.active' ).classList.remove( 'active' );
//         document.querySelector( `a[href*=${ id }]` ).parentNode.classList.add( 'active' );
//       }
//   } 
// }

// makeNavLinksSmooth( );
// spyScrolling( );


