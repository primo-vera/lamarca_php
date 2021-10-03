const navSlide = () => {
  const burger = document.querySelector(".burger");
  const backdrop = document.querySelector(".backdrop");
  const nav = document.querySelector(".side-navLinks");
  const navLinks = document.querySelectorAll(".side-navLinks li");

  burger.addEventListener("click", () => {
    //Toggle Nav & Backdrop
    nav.classList.toggle("nav-active");
    backdrop.classList.toggle("backdrop-active");

    //Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
      }
    });
    //Burger Animation
    burger.classList.toggle("toggle");
  });

  backdrop.addEventListener("click", () => {
    //Toggle Nav & Backdrop
    nav.classList.toggle("nav-active");
    backdrop.classList.toggle("backdrop-active");

    //Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
      }
    });
    //Burger Animation
    burger.classList.toggle("toggle");
  });
};

navSlide();
