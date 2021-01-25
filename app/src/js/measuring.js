"use_strict";

//console.log(document.forms.isDirect.elements.isDirect.checked);

function Measuring(){
	this.inputElements = document.querySelectorAll('.measurings__input-start');
	this.isDirectCheckbox = document.getElementById('isDirect');
	this.selectionForms = document.querySelector('.inputForm__forNotDirect');
	this.sendButton = document.querySelector('.measuring__sendButton');
	this.measuring = {};
		
	Measuring.init(this);
};
//сохраняем значение в объекте
Measuring.prototype.saveInputValue = function(event){	
	const inputProperies = event.target.dataset.field;
	const goalForm = document.forms[inputProperies];
	const multiValue = event.target.classList.contains("multiValue"); 
	goalForm.classList.toggle("hidden");
	
	goalForm.onsubmit = (event) => {
		let insertValue = '';
		event.preventDefault();			
		insertValue = goalForm['elements'][inputProperies].value;			
		if (multiValue){
			if(!this.measuring[inputProperies]) {this.measuring[inputProperies] = []};			
			this.measuring[inputProperies].push(insertValue);
			goalForm['elements'][inputProperies].value = '';
			this.clearUlElement(inputProperies);						
		}else{
			this.measuring[inputProperies] = insertValue;
		}
		goalForm.classList.add("hidden");
		this.clearUlElement(inputProperies);
		this.showInsertedValuesInHtml();			
	};	
};

//отображаем сохраненные значения на странице
Measuring.prototype.showInsertedValuesInHtml = function(){
	for(key in this.measuring){
		const goalElem = document.querySelector(`[data-field = ${key}]`).parentNode;
		const span = goalElem.querySelector('.measurings__input-result');
		const text = Array.isArray(this.measuring[key]) ? this.measuring[key].join('; ') : this.measuring[key];
		span.innerText = `- ${text}`;		
	}	
};

//получение списков оборудования для поля ввода
Measuring.prototype.getAllEquipment = function(){
	let xhr = new XMLHttpRequest();
	xhr.onload = () => {
		let responseObj = xhr.response;
		this.fillSelectByEquipment(responseObj);
	};
	xhr.open('GET', 'index.php?allEquipment');
	xhr.responseType = 'json';
	xhr.send();		
};

//вывод списка оборудования в инпут
Measuring.prototype.fillSelectByEquipment = function(equipment){
	const inputForms = document.querySelectorAll('.measuring__equipment-select');
	inputForms.forEach(element => {	
		const inputElement = element.querySelector('.inputElement');
		let ulElement = element.querySelector('.ulElement');		
		inputElement.oninput = (event) => {
			ulElement.innerHTML = '';
			const regexp = new RegExp(event.target.value, 'i');		
			let modEq = equipment.filter(item => {				
				return item.match(regexp);
			});
			modEq.map((arrayItem) => {	
				li = document.createElement('li');
				li.innerText = arrayItem;				
				li.onclick = (event) => inputElement.value = event.target.innerText;
				ulElement.append(li);				
			});	
		}
	});	
};
//очистка всплывающего списка оборудования
Measuring.prototype.clearUlElement = function(propery){
	const form = document.querySelector(`[name = ${propery}]`);
	const ulElement = form.querySelector('.ulElement');
	if (ulElement){ulElement.innerHTML = ''};
}

//тут должно все отправиться на сервер для внесения в БД, не закончено
Measuring.prototype.sendMeasuringObjectToPhp = function(){
	//перед отправкой прочитать значение чекбокса и добавить в отправку
	this.measuring['is_direct'] = document.forms.isDirect.elements.isDirect.checked;
	console.log(this.measuring);
	let json = JSON.stringify(this.measuring);
	//let json = this.measuring;
console.log(json);
	let xhr = new XMLHttpRequest();		
	
	xhr.onreadystatechange = () => {	
		if (xhr.readyState == 4 && xhr.status == 200){
			
			console.log('ответ', xhr.response);
			//location.reload();
		}	
	}
	/*xhr.onloadend = function() {
		if (xhr.status == 200) {
		  console.log("Успех");
		} else {
		  console.log("Ошибка " + this.status);
		}
	};
	xhr.onload = () => {
		console.log('onload', xhr.responseText);
	}
	*/	
	xhr.open('POST', 'index.php?measuringInsert');
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');	
	xhr.send(json);	
};

//инициализация работы
Measuring.init = function(that){
	//console.log(that.inputElements);
	that.inputElements.forEach(function(elem){
		elem.onclick = function(event){
			that.saveInputValue(event);
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
	that.sendButton.onclick = function(){
		that.sendMeasuringObjectToPhp();
	}; 
};

new Measuring();