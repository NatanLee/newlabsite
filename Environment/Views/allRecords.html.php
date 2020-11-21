<section class="content">
	<h2>Регистрация условий окружающей среды</h2>
	
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
  
	<div class="inputForm">
		<details>
			<summary>Внести новую запись</summary> 
			<form method="post" action="index.php?environment_set">
			
	<!-- 			<label for="index_num">Код записи</label>
				<input type="text" name="index_num" id="index_num"  value="<?=$index_num?>"> -->
						 
				<label for="place">Место измерения</label>
				<input type="text" name ="place" value="<?=$place?>">

				<label for="dt">Дата</label>
				<input type="date" name ="dt" value="<?=$dt?>">

				<label for="tm">Время</label>
				<input type="time" name ="tm" value="<?=$tm?>">

				<label for="t">t, град. С</label>
				<input type="number" step="any" name ="t" value="<?=$t?>">

				<label for="rh">RH, %</label>
				<input type="number" step="any" name ="rh" value="<?=$rh?>">

				<label for="p">P, мм.рт.ст.</label>
				<input type="number" step="any" name ="p" value="<?=$p?>">

				<label for="u">U сети, В.</label>
				<input type="number" step="any" name ="u" value="<?=$u?>">

				<label for="f">F сети, Гц.</label>
				<input type="number" step="any" name ="f" value="<?=$f?>">

				<label for="other_mes">Другие условия</label>
				<input type="text" name ="other_mes" value="<?=$other_mes?>">
								
				<label for="index_num">Заключение</label>
				<input type="text" name ="conclusion" value="<?=$conclusion?>">	
				
				<input type="submit" value="Отправить">			
			</form>
		</details>
  </div>
  
  <div class="records">
		<h3>Условия окружающей среды</h3>
		<table>
			<tr>
				<th>Код записи</th>
				<th>Место измерения</th>
				<th>Дата</th>
				<th>Время</th>
				<th>t, град. С</th>
				<th>RH, %</th>
				<th>P, мм.рт.ст.</th>
				<th>U сети, В.</th>
				<th>F сети, Гц.</th>
				<th>Другие условия</th>
				<th>Исполнитель</th>
				<th>Заключение</th>
			</tr>
		<? foreach($records as $one):?>
			<tr>
				<td><?=$one['index_num']?></td>
				<td data-template = "place"><?=$one['place']?></td>
				<td data-template = "dt"><?=$one['dt']?></td>
				<td data-template = "tm"><?=$one['tm']?></td>
				<td data-template = "t"><?=$one['t']?></td>
				<td data-template = "rh"><?=$one['rh']?></td>
				<td data-template = "p"><?=$one['p']?></td>
				<td data-template = "u"><?=$one['u']?></td>
				<td data-template = "f"><?=$one['f']?></td>
				<td data-template = "other_mes"><?=$one['other_mes']?></td>
				<td><?=$one['executor']?></td>
				<td data-template = "conclusion"><?=$one['conclusion']?></td>				
			</tr>
		<?endforeach?>
		</table>
	</div>
</section>	