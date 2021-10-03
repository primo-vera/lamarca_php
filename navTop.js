const nav = document.querySelector(".navbar");
const topToNav = nav.offsetTop;
const main = document.querySelector(".bodyWrap");

function stickyNav() {
  if (window.scrollY >= topToNav) {
    main.style.paddingTop = nav.offsetHeight + "px";
    main.classList.add("fixed");
  } else {
    main.style.paddingTop = 0;
    main.classList.remove("fixed");
  }
}

window.addEventListener("scroll", stickyNav);
