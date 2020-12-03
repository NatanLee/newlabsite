
<section class="content">
	<h2>Средства измерений</h2>
	<div>
		<a href="index.php?measEquipment">Реестр средств измерений</a>		
	</div>
	  
	<div id = "yearsButtons">
		<?foreach($allYears as $year):?>
			<button data-year = "<?=$year?>"><?=$year?></button>
		<?endforeach;?>
	</div>
	
	<div class="records">
		<div class="records">
			<h2>График поверки</h2>
			<h3><span id="verifYear"></span> год</h3>
			<table class="verifSchedule">
				<thead>	
					<tr>
						<th>Код СИ</th>
						<th>Наименование</th>
						<th>Тип (модель)</th>
						<th>Заводской номер</th>
						<th>Год выпуска</th>
						<th>Инвентарный/ номенклатурный номер</th>
						<th>Помещение хранения</th>
						<th>Дата поверки</th>
						<th>Дата окончания поверки</th>
						<th>Дата проведения поверки</th>
										
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			
			
		</div>		
	</div>
</section>	