const menu = document.querySelector(".menuPC__menu");
const menuPC = document.querySelector(".menuPC");
const menuItem = document.querySelectorAll(".menuPC__sections__section__items");
const menuOffset = menuPC.offsetTop;

document.addEventListener("scroll", function () {
  if (window.scrollY > menuOffset) {
    menu.style = "background-color: rgb(39, 68, 142);";
    menuItem[0].style = "background-color: rgb(39, 68, 142);";
    menuItem[1].style = "background-color: rgb(39, 68, 142);";
    menuItem[2].style = "background-color: rgb(39, 68, 142);";
    menuItem[3].style = "background-color: rgb(39, 68, 142);";
  } else if (window.scrollY < menuOffset) {
    menu.style = "background-color: rgba(39, 68, 142, 0.85);";
    menuItem[0].style = "background-color: rgba(39, 68, 142, 0.85);";
    menuItem[1].style = "background-color: rgba(39, 68, 142, 0.85);";
    menuItem[2].style = "background-color: rgba(39, 68, 142, 0.85);";
    menuItem[3].style = "background-color: rgba(39, 68, 142, 0.85);";
  }
});
