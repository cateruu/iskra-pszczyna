const hamburger = document.getElementById("hamburger");
const arrow = document.querySelector(".arrow");
const container = document.querySelector(".main__container");
const zwin = document.querySelector(".main__container__roczniki__zwin");
const zgoda = document.querySelector(".zgoda");
const wyslij = document.querySelector(".wyslij");
const wyslijInvisible = document.querySelector(".wyslijInvisible");
const main = document.querySelector(".main");
const menu = document.querySelector(".menu");

const body = document.body,
  html = document.documentElement;

const height = Math.max(
  body.scrollHeight,
  body.offsetHeight,
  html.clientHeight,
  html.scrollHeight,
  html.offsetHeight
);

const width = document.width;

if (width < 1200) {
  if (container.classList.contains("main__container--active")) {
    container.style.height = height - 500 + "px";

    main.style.height = height + "px";
    console.log(main);
  } else {
    container.style.height = height - 500 + "px";

    main.style.height = height - 520 + "px";
  }
} else if (width < 750) {
  if (container.classList.contains("main__container--active")) {
    container.style.height = height - 280 + "px";

    main.style.height = height + "px";
    console.log(main);
  } else {
    container.style.height = height - 280 + "px";

    main.style.height = height - 520 + "px";
  }
} else {
  if (container.classList.contains("main__container--active")) {
    container.style.height = height - 900 + "px";

    main.style.height = height + 40 + "px";
    console.log(main);
  } else {
    container.style.height = height - 840 + "px";

    main.style.height = height - 520 + "px";
  }
}

function wyswietl() {
  if (zgoda.checked == true) {
    wyslij.style.display = "block";
    wyslijInvisible.style.display = "none";
  } else {
    wyslij.style.display = "none";
    wyslijInvisible.style.display = "block";
  }
}

function pokazMenu() {
  menu.classList.toggle("wylacz");
}

function rocznik() {
  arrow.classList.toggle("switch");
  container.classList.toggle("main__container--active");

  if (width < 1200) {
    if (container.classList.contains("main__container--active")) {
      container.style.height = height - 500 + "px";

      main.style.height = height + "px";
      console.log(main);
    } else {
      container.style.height = height - 500 + "px";

      main.style.height = height - 520 + "px";
    }
  } else if (width < 750) {
    if (container.classList.contains("main__container--active")) {
      container.style.height = height - 280 + "px";

      main.style.height = height + "px";
      console.log(main);
    } else {
      container.style.height = height - 280 + "px";

      main.style.height = height - 520 + "px";
    }
  } else {
    if (container.classList.contains("main__container--active")) {
      container.style.height = height - 900 + "px";

      main.style.height = height - 40 + "px";
      console.log(main);
    } else {
      container.style.height = height - 840 + "px";

      main.style.height = height - 520 + "px";
    }
  }
}
