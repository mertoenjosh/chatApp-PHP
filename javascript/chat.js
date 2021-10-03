'use strict';

const form = document.querySelector('.typing-area'),
  inputField = form.querySelector('.input-field'),
  sendBtn = form.querySelector('button');

form.onsubmit = e => {
  // e.preventDefault(); // prevent the ffault behaviour of submitting a form
};

sendBtn.onclick = () => {
  // start AJAX
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open('POST', 'php/insert-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
      }
    }
  };

  // send form data through ajax to php
  let formData = new FormData(form); // create a new form data object
  xhr.send(formData); // sending the form data to php
};
