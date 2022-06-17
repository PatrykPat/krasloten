window.addEventListener("scroll", () => {
    let header = document.querySelector(".header");
    header.classList.toggle("sticky", window.scrollY > 0);
  });

// Switches 


const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
  document.body.classList.toggle("dark-theme");

});

function test() {
  console.log("Test!")
}

// Popup menu

function openPopup() { // Met deze functie opent hij de spelregels popup.
  const popUp = document.getElementById("popup2");
  popUp.classList.add("show");
}

function closePopup() { // Met deze functie sluit hij de spelregels popup.
  const popUp = document.getElementById("popup2");
  popUp.classList.remove("show");
}
