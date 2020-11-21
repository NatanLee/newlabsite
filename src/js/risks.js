"use strict";

let riskFreq  = document.getElementById('frequency');

let xhr = new XMLHttpRequest();
xhr.open('GET', 'index.php?AJAXgetFrequency');
xhr.responseType = 'json';
xhr.send();

xhr.onload = function() {
  if (xhr.status != 200) { // HTTP ошибка?
    // обработаем ошибку
    alert( 'Ошибка: ' + xhr.status);
    return;
  }
  let responseObj = xhr.response;
  for
  console.log(responseObj);

}
