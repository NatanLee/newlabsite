"use strict";

let scheduleTable = document.querySelector('.verifSchedule tbody');
let verifYear = document.getElementById('verifYear');
let buttons = document.getElementById('yearsButtons');
let fullVerifInfo;
//console.log(verifYear);


if(scheduleTable){
	//получаем сведения об оборудовании и поверке	
	let xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function (){	
		if (this.readyState == 4 && this.status == 200){
			fullVerifInfo = JSON.parse(this.responseText);
			writeVerifSchedule(fullVerifInfo);
			buttons.addEventListener("click", yearsButtonsClick);
			//console.log(fullVerifInfo);
		}	
	}
	xhr.open('GET', './index.php?AJAXgetMeasVerifInfo', true);
	xhr.send();		
}

function writeVerifSchedule(data){
	let year = (new Date()).getFullYear();
	let verifScheduleHtml = new VerifSchedule (year, data);
	verifScheduleHtml.render();
}



function yearsButtonsClick(){
	let verifScheduleHtml = new VerifSchedule (event.target.dataset.year, fullVerifInfo);
	verifScheduleHtml.render();	
}

//класс для построения таблицы графика

function VerifSchedule (myYear, myItems){		
	this.htmlCode = ''; 
	this.year = myYear;	
	this.items = myItems;		
}
		
VerifSchedule.prototype.render = function(){
	scheduleTable.innerHTML = '';	
	for(let i = 0; i<this.items.length; i++){
		if(this.items[i].issue_year <= this.year){
			this.items[i].verif_date_thisYear = "Нет данных";
			this.items[i].verif_date_prevYear = "Нет данных";
			this.items[i].verif_date_factYear = "Нет данных";
			for(let j = 0; j<this.items[i].verif_dates.length; j++){
					
				if((new Date(this.items[i].verif_dates[j].dt_end)).getFullYear() == this.year){			
					//console.log(this.items[i].verif_dates[j]);
					this.items[i].verif_date_thisYear = this.items[i].verif_dates[j].dt_end;
					this.items[i].verif_date_prevYear = this.items[i].verif_dates[j].dt_start;					
				}
							
				if((new Date(this.items[i].verif_dates[j].dt_start)).getFullYear() == this.year){					
					this.items[i].verif_date_factYear = this.items[i].verif_dates[j].dt_start;
				}			
			}	
			
			let tr = document.createElement('tr');
			let td = 	'<td>' + this.items[i].out_index + '</td>'
						+ '<td>' + this.items[i].name + '</td>'
						+ '<td>' + this.items[i].model + '</td>'
						+ '<td>' + this.items[i].factory_number + '</td>'
						+ '<td>' + this.items[i].issue_year + '</td>'
						+ '<td>' + this.items[i].inventory_number + '</td>'
						+ '<td>' + this.items[i].storage + '</td>'
						+ '<td>' + this.items[i].verif_date_prevYear + '</td>'
						+ '<td>' + this.items[i].verif_date_thisYear + '</td>'
						+ '<td>' + this.items[i].verif_date_factYear + '</td>'
						;
			tr.innerHTML = td;
			
			scheduleTable.append(tr);
			tr.innerHTML = td;
			scheduleTable.append(tr);			
		}
	}		
	scheduleTable.append(this.htmlCode);
	verifYear.innerText = this.year;
}
