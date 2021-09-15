'use strict';

const form = document.querySelector('.signup form');
let continueBtn = form.querySelector('.button input');

form.onsubmit = e => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  //let's start ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open('POST', 'php/signup.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
      }
    }
  };
  xhr.send();
};
