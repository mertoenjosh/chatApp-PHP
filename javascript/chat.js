'use strict';

const form = document.querySelector('.typing-area'),
  inputField = form.querySelector('.input-field'),
  sendBtn = form.querySelector('button'),
  chatBox = document.querySelector('.chat-box');

form.onsubmit = e => {
  e.preventDefault(); // prevent the ffault behaviour of submitting a form
};

sendBtn.onclick = () => {
  // start AJAX
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open('POST', 'php/insert-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = ''; // make input field blank once message is inserted in the database
        scrollToBottom();
      }
    }
  };

  // send form data through ajax to php
  let formData = new FormData(form); // create a new form data object
  xhr.send(formData); // sending the form data to php
};

setInterval(() => {
  // start AJAX

  let xhr = new XMLHttpRequest();

  xhr.open('POST', 'php/get-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        scrollToBottom();
      }
    }
  };

  let formData = new FormData(form); // create a new form data object
  xhr.send(formData);
}, 500); // function will run frequently after 500ms

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
