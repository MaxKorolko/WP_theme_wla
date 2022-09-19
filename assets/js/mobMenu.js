const refs = {
  mobMenuBtnOpen: document.querySelector(".mob-menu-btn-open"),
  mobMenuBtnClose: document.querySelector(".mob-menu__btn-cls"),
  backdrop: document.querySelector(".backdrop"),
  mobMenuList: document.querySelector(".mob-menu__list"),
};

refs.mobMenuBtnOpen.addEventListener("click", onOpenModal);

function onCloseModal() {
  refs.backdrop.classList.remove("is-open");
  document.body.classList.remove("menu-open");
  refs.mobMenuBtnClose.removeEventListener("click", onCloseModal);

  for (const child of refs.mobMenuList.children) {
    child.firstElementChild.removeEventListener("click", onCloseModal);
  }
}

function onOpenModal() {
  refs.backdrop.classList.add("is-open");
  document.body.classList.add("menu-open");
  refs.mobMenuBtnClose.addEventListener("click", onCloseModal);

  for (const child of refs.mobMenuList.children) {
    child.firstElementChild.addEventListener("click", onCloseModal);
  }
}

// scroll

const anchors = document.querySelectorAll('a[href*="#"]');

for (const anchor of anchors) {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const blockID = anchor.getAttribute("href").substr(1);

    document.getElementById(blockID).scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
}
