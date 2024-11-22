"use strict";
const funcija = function () {
  const niz = [];
  niz.push(
    "unesite ime",
    "unesite prezime",
    "unesite mail",
    "unesite poruku",
    "uspesno ste uneli formu"
  );
  return niz;
};

const submit = document
  .querySelector(".submit-btn")
  .addEventListener("click", function (event) {
    // event.preventDefault();
    const ime = document.querySelector(".username").value;
    const prezime = document.querySelector(".surname").value;
    const email = document.querySelector(".email").value;
    const poruka = document.querySelector(".textarea").value;
    let niz = funcija();
    if (!ime) {
      alert(niz[0]);
    } else if (!prezime) {
      alert(niz[1]);
      document.querySelector(".username").style.border = "";
    } else if (!email) {
      alert(niz[2]);
    } else if (!poruka) {
      alert(niz[3]);
    } else {
      alert(niz[4]);
      document.querySelector(".contact-form").style.background = "#2271b1";
      const niz2 = [ime, prezime, email, poruka];
      for (let i = 0; i < niz2.length; i++) {
        console.log(niz2[i].toUpperCase());
      }
    }
  });

function ispis(i) {
  const polje1 = document.querySelector(".polje1");
  const polje2 = document.querySelector(".polje2");
  const polje3 = document.querySelector(".polje3");

  if (i === 1) {
    polje1.innerHTML =
      '<h3 class="third-header">Dusan Madjar</h3><p class="team-text">Lorem ipsum dolor sit amet.</p>';
  } else if (i === 2) {
    polje2.innerHTML =
      '<h3 class="third-header">Nikola Savic</h3> <p class="team-text">Lorem ipsum dolor sit amet.</p>';
  } else if (i === 3) {
    polje3.innerHTML =
      '<h3 class="third-header">Aleksa Krivosija</h3> <p class="team-text">Lorem ipsum dolor sit amet.</p>';
  } else {
    polje1.innerHTML = "";
    polje2.innerHTML = "";
    polje3.innerHTML = "";
  }
}
