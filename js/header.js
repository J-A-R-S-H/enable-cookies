const header = document.getElementById( "masthead" );
const heroLogo = document.querySelectorAll("header.hero a.custom-logo-link img.custom-logo")[0];
console.log(heroLogo);
// console.log(heroLogoBottom);

if (heroLogo == undefined) {
    header.classList.add( "scrolled" );
} else {
    window.addEventListener( "scroll", () => {
        const heroLogoBottom = heroLogo.getBoundingClientRect().bottom;
        // console.log(window.scrollY);
        if ( window.scrollY >= heroLogoBottom ) {
            header.classList.add( "scrolled" );
        } else if( window.scrollY < heroLogoBottom ) {
            header.classList.remove( "scrolled" );
        }
    });
}