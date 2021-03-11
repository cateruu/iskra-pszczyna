const opcjeKlik = document.querySelector(".aside__content__posts");
const opcjeBox = document.querySelector(".aside__postsOptions");
const tabelaKlik = document.querySelector(".tabela");
const tabelaBox = document.querySelector(".aside__tabela");
const meczeKlik = document.querySelector(".mecze");
const meczeBox = document.querySelector(".aside__mecze");
const teamsKlik = document.querySelector(".teams");
const teamsBox = document.querySelector(".aside__teams");

opcjeKlik.addEventListener("click", function() {
  opcjeBox.classList.toggle("pokaz");
});

tabelaKlik.addEventListener("click", function() {
  tabelaBox.classList.toggle("pokaz");
});

meczeKlik.addEventListener("click", function() {
  meczeBox.classList.toggle("pokaz");
});

teamsKlik.addEventListener("click", function() {
  teamsBox.classList.toggle("pokaz");
});
