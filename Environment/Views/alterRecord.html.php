<section class="content">
	<div class="inputForm">
		<h3>Изменить запись №<?=$record['index_num']?></h3> 
		<form method="post" action="index.php?environment_update">
			<table>
				<tr>
						<td>	   
						<input type="hidden" name ="index_num" value="<?=$record['index_num']?>">
					</td>
						<td>		 
							Место измерения
						<input type="text" name ="place" value="<?=$record['place']?>">
				</td>
				<td>
							Дата
						<input type="text" name ="dt" value="<?=date('Y-m-d',$record['dttm'])?>">
				</td>
				<td>
						Время
						<input type="text" name ="tm" value="<?=date('H:i',$record['dttm'])?>">
				</td>
				<td>
						t, град. С
						<input type="text" name ="t" value="<?=$record['t']?>">
				</td>
				<td>
						RH, %
						<input type="text" name ="rh" value="<?=$record['rh']?>">
				</td>
				<td>
					P, мм.рт.ст.
						<input type="text" name ="p" value="<?=$record['p']?>">
				</td>
				<td>
						U сети, В.
						<input type="text" name ="u" value="<?=$record['u']?>">
				</td>
				<td>
						F сети, Гц.
						<input type="text" name ="f" value="<?=$record['f']?>">
				</td>
				<td>
						Другие условия
						<input type="text" name ="other_mes" value="<?=$record['other_mes']?>">
				</td>
				<td>
						Исполнитель
						<input type="text" name ="executor" value="<?=$record['executor']?>">
				</td>
				<td>
						Заключение
						<input type="text" name ="conclusion" value="<?=$record['conclusion']?>">
				</td>
				<td>
						<input type="submit" value="Отправить">
				</td>
				</tr>
			</table>
		</form>
	</div>
</section>