"use_strict";

//console.log(document.forms.isDirect.elements.isDirect.checked);

function Measuring(){
	this.inputElements = document.querySelectorAll('.measurings__input-start');
	this.isDirectCheckbox = document.getElementById('isDirect');
	this.selectionForms = document.querySelector('.inputForm__forNotDirect');
	this.measuring = {};
	this.clickedElement;
		
	Measuring.init(this);
};
//сохраняем значение в объекте
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

//получение списков оборудования
Measuring.prototype.getAllEquipment = function(){
	let xhr = new XMLHttpRequest();
	xhr.open('GET', 'index.php?allEquipment');
	xhr.responseType = 'json';
	xhr.send();	
	xhr.onload = () => {
		let responseObj = xhr.response;
		this.fillSelectByEquipment(responseObj);
	};
};

//вывод списка оборудования в инпут
Measuring.prototype.fillSelectByEquipment = function(equipment){
	const inputElements = document.querySelectorAll('.measuring__equipment-select .inputElement');
	inputElements.forEach(element => {
		element.oninput = (event) => {
			equipment.filter(item => )
			console.log (event.target.value);
		}
	});
	
	
	
	equipment.map((arrayItem) => {
	
	
	
	
	
		/*	let option = document.createElement('option');
		option.setAttribute('value', arrayItem);
		//option.innerText = arrayItem;
		datalistElement.append(option);
		//console.log(option);*/
	}); 
	console.log(inputElements);
};




//тут должно все отправиться на сервер для внесения в БД, не закончено
Measuring.prototype.sendMeasuringObjectToPhp = function(){
	//перед отправкой прочитать значение чекбокса и добавить в отправку
	//console.log(document.forms.isDirect.elements.isDirect.checked);
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

//инициализация работы
Measuring.init = function(that){
	//console.log(that.inputElements);
	that.inputElements.forEach(function(elem){
		elem.onclick = function(event){
			that.insertInputElement(event);
		};
	});
	that.isDirectCheckbox.onchange = (event) => {		
		if(!event.target.checked){
			that.selectionForms.classList.remove("hidden");
		}else{
			that.selectionForms.classList.add("hidden");
		};
	};
	that.getAllEquipment();	
};

new Measuring();