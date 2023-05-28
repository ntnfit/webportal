const navLinkEls = document.querySelectorAll(".nav-item");
const windowPathname = window.location.pathname;

navLinkEls.forEach((item) => {
    const navLinkPathname = new URL(item.href).pathname;
    if (windowPathname === navLinkPathname) {
        item.classList.add("active");
    }
});
