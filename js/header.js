const header = document.getElementById( "masthead" );
// console.log("waow");
const heroLogoBottom = document.querySelectorAll("header.hero a.custom-logo-link img.custom-logo")[0].getBoundingClientRect().bottom;

console.log(heroLogoBottom);
// const headerDistanceToTop = header.getBoundingClientRect().bottom;
// console.log(headerDistanceToTop);

window.addEventListener( "scroll", () => {
    // console.log(window.scrollY);
    if ( window.scrollY >= heroLogoBottom ) {
        header.classList.add( "scrolled" );
    } else if( window.scrollY < heroLogoBottom ) {
        header.classList.remove ( "scrolled" );
    }
});