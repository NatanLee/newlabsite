"use_strict";

console.log(document.forms);

function Measuring(){
	this.inputElements = document.querySelectorAll('.measurings__input-start');
	this.measuring = {};
	this.clickedElement;
		
	Measuring.init(this);
};
//вставляем инпут сохраняем значение в объекте
Measuring.prototype.insertInputElement = function(event){
	this.clickedElement = event.target.parentNode;	
	let inputProperies = event.target.dataset.field.split('@');
	let createdMiniForm = document.querySelector(`[name = ${inputProperies[0]}]`);
	if (!createdMiniForm){
		let insertValue = '';
		let miniform = document.createElement('form');	
		let inputField = document.createElement('input');
		let inputSubmit = document.createElement('input');
		inputField.name = inputProperies[0];
		inputField.type = inputProperies[1];
		miniform.name = inputProperies[0]; 		
		inputSubmit.type = 'submit';
		inputSubmit.value = 'Сохранить';
		miniform.append(inputField);
		miniform.append(inputSubmit);		
		this.clickedElement.after(miniform);
		miniform.onsubmit = (event) => {
			event.preventDefault();			
			insertValue = document.forms[inputField.name]['elements'][inputField.name].value;			
			document.forms[inputField.name].remove();
			this.measuring[inputField.name] = insertValue;
			this.showInsertedValuesInHtml();			
		};
	}else{
		createdMiniForm.remove();
	}
};

//отображаем сохраненные значения на странице
Measuring.prototype.showInsertedValuesInHtml = function(){
	for(key in this.measuring){
		let goalElem = document.querySelector(`[data-field ^= ${key}]`).parentNode;
		let span = goalElem.querySelector('.measurings__input-result');
		span.innerText = `- ${this.measuring[key]}`;
	}
};

Measuring.prototype.sendMeasuringObjectToPhp = function(){
	let json = JSON.stringify(this.measuring);
//console.log(json);
	let xhr = new XMLHttpRequest();	
	
	xhr.onloadend = function() {
		if (xhr.status == 200) {
		  console.log("Успех");
		} else {
		  console.log("Ошибка " + this.status);
		}
	};

	xhr.onreadystatechange = function (){	
		if (this.readyState == 4 && this.status == 200){
			console.log(this.responseText);
		}	
	}	

	xhr.open('POST', '/index.php?measuringsInsert');
	xhr.send(json);	
};


Measuring.init = function(that){
	//console.log(that.inputElements);
	that.inputElements.forEach(function(elem){
		elem.onclick = function(event){
			that.insertInputElement(event);
		};
	})
	
	
	
//	console.log(that.inputElements);

	
};

new Measuring();