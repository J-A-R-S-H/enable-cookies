const header = document.getElementById( "masthead" );
// console.log("waow");

// const headerDistanceToTop = header.getBoundingClientRect().bottom;
// console.log(headerDistanceToTop);

window.addEventListener( "scroll", () => {
    // console.log(window.scrollY);
    if ( window.scrollY >= header.offsetHeight ) {
        header.classList.add( "scrolled" );
    } else if( window.scrollY < header.offsetHeight ) {
        header.classList.remove ( "scrolled" );
    }
});