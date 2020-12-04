"use_strict";

function Measuring(){
	this.inputElements = document.querySelectorAll('.measurings__input-start');
	this.measuring = {};
	this.clickedElement;
		
	Measuring.init(this);
};
//вставоляем инпут сохраняем в объекте
Measuring.prototype.insertInputElement = function(){
	this.clickedElement = event.target.parentNode;	
	let inputProperies = event.target.dataset.field.split('@');	
	if (!document.querySelector(`[name = ${inputProperies[0]}]`)){
		let insertValue = '';
		let miniform = document.createElement('form');	
		let inputField = document.createElement('input');
		let inputSubmit = document.createElement('input');
		inputField.name = inputProperies[0];
		inputField.type = inputProperies[1];
		miniform.name = inputProperies[0]; 		
		inputSubmit.type = 'submit';
		inputSubmit.value = 'Отправить';
		miniform.append(inputField);
		miniform.append(inputSubmit);		
		this.clickedElement.after(miniform);
		miniform.onsubmit = (event) => {
			event.preventDefault();			
			insertValue = document.forms[0]['elements'][inputField.name].value;			
			document.forms[0].remove();
			this.measuring[inputField.name] = insertValue;
			this.showInsertedValuesInHtml();
		};
	}
};
//отображаем вставленное значение на странице
Measuring.prototype.showInsertedValuesInHtml = function(){
	for(key in this.measuring){
		let goalElem = document.querySelector(`[data-field ^= ${key}]`).parentNode;
		let span = goalElem.querySelector('.measurings__input-result');
		span.innerText = `- ${this.measuring[key]}`;
	}
};


Measuring.prototype.sendMeasuringObjectToPhp = function(){
	let xhr = new XMLHttpRequest();
	xhr.open('POST', URL);
	xhr.send([body]);
	
	
};


Measuring.init = function(that){
	//console.log(that.inputElements);
	that.inputElements.forEach(function(elem){
		elem.onclick = function(){
			that.insertInputElement();
		};
	})
	
	
	
//	console.log(that.inputElements);

	
};

new Measuring();