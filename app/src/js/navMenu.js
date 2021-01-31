"use strict";
//let data = JSON.stringify({"name":"John", "time":"2pm"});
let menu = document.querySelector('.header__menu');
let headerMenuTitle = document.querySelector('.header__menu-title');
let headerMenu = document.querySelector('.header__menu');
//console.log(headerMenuTitle);

headerMenuTitle.onclick = function(){
	headerMenuTitle.classList.toggle('open');
	headerMenu.classList.toggle('open');
}

if(menu){

// 1. Создаём новый XMLHttpRequest-объект
let xhr = new XMLHttpRequest();
//xhr.overrideMimeType('text/xml');//для GET-запроса

xhr.onreadystatechange = function (){	
	if (this.readyState == 4 && this.status == 200){
		getMainMenu(this.responseText);
	}	
}

function getMainMenu(data){
	let menuPhp = JSON.parse(data);		
	let menuHtml = new Menu ('menuItem', menuPhp);
	menu.innerHTML = menuHtml.render();	
}


	
//построение меню		
	function Container () {
		this.htmlCode = ''; 
	}
	Container.prototype.render = function(){
		return this.htmlCode;
	};

	function Menu (myClass, myItems){
		Container.call(this);
		
		this.class = myClass;
		this.items = myItems;
		//console.log(myItems);//del
			
	}
	Menu.prototype = Object.create(Container.prototype);
	Menu.prototype.constructor = Menu;
	
	Menu.prototype.render = function(){
		let result = '<ul class = "' + this.class + '">';
			for(let i = 0; i<this.items.length; i++){
			
				result += '<li>' + this.items[i].name;
				
				if (this.items[i].submenu.length){
					//console.log(this.items[i].submenu);//del
					result += '<ul>';
					for(let j = 0; j<this.items[i].submenu.length; j++){
						//console.log(this.items[i].submenu[j]);
						result += '<li><a href="' + this.items[i].submenu[j].link + '">' + this.items[i].submenu[j].name + '</a></li>';
					}
					result += '</ul>';
				}			
			}
		result += '</ul>';
		this.htmlCode = result;
		return result;
	};

	function MenuItem (item){
		this.href = href;
		this.title = title;
	}

	MenuItem.prototype.render = function(){
		return '<li><a href="'+ this.href +'">' + this.title + '</a></li>';
	};



// 2. Настраиваем его: GET-запрос по URL /article/.../load
xhr.open('GET', './index.php?AJAX=menu', true);

// 3. Отсылаем запрос

//console.log(data);

//xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//для POST-запроса
xhr.send();

/* 



// 4. Этот код сработает после того, как мы получим ответ сервера
xhr.onload = function() {
  if (xhr.status != 200) { // анализируем HTTP-статус ответа, если статус не 200, то произошла ошибка
    alert(`Ошибка ${xhr.status}: ${xhr.statusText}`); // Например, 404: Not Found
  } else { // если всё прошло гладко, выводим результат
    alert(`Готово, получили ${xhr.response.length} байт`); // response -- это ответ сервера
  }
};

xhr.onprogress = function(event) {
  if (event.lengthComputable) {
    alert(`Получено ${event.loaded} из ${event.total} байт`);
  } else {
    alert(`Получено ${event.loaded} байт`); // если в ответе нет заголовка Content-Length
  }

};

xhr.onerror = function() {
  alert("Запрос не удался");
}; */
}