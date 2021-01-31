"use strict";


////////////////копирователь шаблонизатор
let cells = document.querySelectorAll('td');
for (let i = 0; i < cells.length; i++){
	cells[i].addEventListener('click', inputSetValue);
}



function inputSetValue(event){
	let tempText = event.target.innerText;
	let classes = event.target.dataset.template;
	
	if (classes){
	let input = document.querySelector('input[name="' + classes + '"]');
	input.value = tempText;
	}
}

//////////////рисовалка графика для калибровок
let canvas = document.querySelector('#calibration_canvas');
if (canvas){
	canvas.setAttribute('width', "500px");
	canvas.setAttribute('height', "500px");

	canvas.style.border = "1px solid black";

	let ctx = canvas.getContext('2d');
	ctx.fillStyle = "black"; // Задаём чёрный цвет для линий 
	ctx.lineWidth = 1; // Ширина линии
	ctx.beginPath(); // Запускает путь
	ctx.moveTo(30, 20); // Указываем начальный путь
	ctx.lineTo(30, 470); // Перемешаем указатель
	ctx.lineTo(480, 470); // Ещё раз перемешаем указатель
	ctx.stroke(); // Делаем контур

	let xArr = [];
	let yArr = [];
	let x = document.querySelectorAll('.data-axis-x');
	let y = document.querySelectorAll('.data-axis-y');
	x.forEach(function(item, i, x){
		xArr.push(parseFloat(item.innerHTML));
	});
	y.forEach(function(item, i, y){
		yArr.push(+item.innerHTML);
	});

	let xRange = Math.max.apply(null, xArr) - Math.min.apply(null, xArr);
	let yRange = Math.max.apply(null, yArr) - Math.min.apply(null, yArr);
	let xMin = Math.min.apply(null, xArr);
	let yMin = Math.min.apply(null, yArr);

	ctx.fillStyle = "black";////

	for(let i = 0; i < xArr.length; i++) { 
	// отображение значений по Y
		ctx.fillText(yArr[i], 5, 30 + 440 - 440/yRange*(yArr[i] - yMin) ); 
		ctx.beginPath(); 
		ctx.moveTo(25, 470 - 440 / yRange*(yArr[i] - yMin) ); 
		ctx.lineTo(30, 30 + 440 - 440/yRange*(yArr[i] - yMin)); 
		ctx.stroke();
	// отображение значений по X 
		ctx.fillText(xArr[i], 30 + 440/xRange*(xArr[i] - xMin), 485); 
		ctx.beginPath(); 
		ctx.moveTo(30 + 440 / xRange*(xArr[i] - xMin), 470); 
		ctx.lineTo(30 + 440 / xRange*(xArr[i] - xMin), 475);
		ctx.stroke();
		
		ctx.fillRect(30 + 440 / xRange * (xArr[i] - xMin) - 3, 30 + 440 -440 / yRange * (yArr[i] - yMin) -3, 6, 6);
	}
}

//////////////////тогл для таблицы измерений
let meauringDetailsButton = document.querySelectorAll('.measurings__details-button');
meauringDetailsButton.forEach(item => {
	item.onclick = function(event){
<<<<<<< HEAD
	let measuringHiddenElem = document.querySelector('[data-measuring-number-show="' + event.target.dataset.measuringNumber + '"]');
		console.log(event.target.dataset.measuringNumber);
		console.log(measuringHiddenElem);
=======
		let sNumber = event.target.dataset.measuringNumber;
		let elem = document.querySelector(`.measuring_number__${sNumber}`);
		elem.classList.toggle("measurings__details_visible");		
		this.classList.toggle("open");
>>>>>>> bdfcc8399b3067d9d3e4937a34f9d8d399c0414d
	};
});


<<<<<<< HEAD
let measuringsDetails = document.querySelector('.measurings__details');
=======
//let measuringsDetails = document.querySelector('.measurings__details');
>>>>>>> bdfcc8399b3067d9d3e4937a34f9d8d399c0414d



