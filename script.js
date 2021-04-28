const input = document.querySelectorAll(".input");
const label = document.querySelectorAll("label");

input.forEach(element => {
  element.addEventListener('focus', (event) => {
    // label.forEach(element => {
    // });
    // event.target.style.background = 'pink';
  }, true);

  element.addEventListener('blur', (event) => {

    // event.target.style.background = '';
  }, true);
});