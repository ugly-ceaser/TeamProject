(function () {
    "use strict"

    const toggle_navBar_btn = document.querySelector("#toggle-navbar");
    const responsive_navBar = document.querySelector(".nav-responsive");
    let bool = false;
    toggle_navBar_btn.addEventListener('click', (e) => {
        bool = !bool
        if (bool) {
            responsive_navBar.style.top = "80px"
            responsive_navBar.style.opacity = "1"
            responsive_navBar.style.zIndex = "999"
            responsive_navBar.style.display = "block"
            // responsive_navBar.style.top = "80px"
        }
        else {
            responsive_navBar.style.top = "50px"
            responsive_navBar.style.opacity = "0"
            responsive_navBar.style.zIndex = "-999"
            responsive_navBar.style.display = "none"
        }
    })

    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        if (window.scrollY > 0) {
            header.classList.add("addColor");
        } else {
            header.classList.remove("addColor");
        }
    });

    AOS.init({
        offset: 200,
        delay: 100,
        duration: 1000,
        easing: 'ease',
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom',
    });

})()