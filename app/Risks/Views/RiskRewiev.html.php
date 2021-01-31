<section class="content">
	<h2>Риски</h2>
	
	<h3></h3>
	<p>Итого записей</p>
	<p>Ri = R x Y x Mcp x Str/(100/Ur)</p>
	<p>OSRi = Ri x (1-K)</p>
	<div class="inputForm">		
		<form method="post" action="index.php?setRisk">
			<label for="dt">Уровень котроля</label>
			<input type="number" name ="dt" value="<?=$dt?>" id="dt">

			<label for="dt">Критический уровень</label>
			<input type="number" name ="dt" value="<?=$dt?>" id="dt">
					
			<input type="submit" value="Отправить">	
		</form>	
		<table>
			<thead>
				<tr>
					<th>Наименование риска</th>	
					<th>Риск (Ri)</th>
					<th>Остаточный риск (OSRi)</th>
					<th>Вероянтность возникновения (P)</th>
					<th>Результаты воздействия (Y)</th>
					<th>Неопределенность оценки (Ur)</th>
					<th>Место возникновения (Mcp)</th>
					<th>Коэффициент воздействия (K)</th>	
					<th>Корректировка (Str)</th>	
					<th>Группа риска</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>	
	
</section>	