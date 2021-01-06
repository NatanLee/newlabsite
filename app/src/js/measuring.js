"use_strict";

//console.log(document.forms);

function Measuring(){
	this.inputElements = document.querySelectorAll('.measurings__input-start');
	this.isDirectCheckbutton = document.getElementById('isDirect');
	console.log(this.isDirectCheckbutton);
	this.measuring = {};
	this.clickedElement;
		
	Measuring.init(this);
};
//вставляем инпут сохраняем значение в объекте
Measuring.prototype.insertInputElement = function(event){
	//this.clickedElement = event.target.parentNode;	
	let inputProperies = event.target.dataset.field;
	let miniForm = document.querySelector(`[name = ${inputProperies}]`);
	document.forms[inputProperies].classList = document.forms[inputProperies].classList == "" ? "hidden" : "";
	
	miniForm.onsubmit = (event) => {
		let insertValue = '';
		event.preventDefault();			
		insertValue = document.forms[inputProperies]['elements'][inputProperies].value;		
		this.measuring[inputProperies] = insertValue;
		document.forms[inputProperies].classList = "hidden";

		this.showInsertedValuesInHtml();			
	};	
};

//отображаем сохраненные значения на странице
Measuring.prototype.showInsertedValuesInHtml = function(){
	for(key in this.measuring){
		let goalElem = document.querySelector(`[data-field = ${key}]`).parentNode;
//		console.log(goalElem);
		let span = goalElem.querySelector('.measurings__input-result');
		span.innerText = `- ${this.measuring[key]}`;
		console.log(this.measuring);
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