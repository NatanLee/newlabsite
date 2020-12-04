<section class="content">
<h2>Претензии (рекламации)</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	

	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Дата поступления</th>
					<th>Номер документа</th>
					<th>Дата документа</th>
					<th>Наименование организации, предъявившей рекламацию</th>
					<th>Краткое содержание рекламации</th>				
					<th>Дата рассмотрения рекламации</th>				
					<th>Решение руководителя о порядке устранения рекламации</th>				
					<th>Принятые меры</th>				
					<th>Исх № ответа на рекламацию</th>				
					<th>Дата ответа</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['doc_number']?></td>					
					<td><?=$one['doc_dt']?></td>					
					<td><?=$one['org']?></td>					
					<td><?=$one['about']?></td>					
					<td><?=$one['dt_review']?></td>					
					<td><?=$one['decision']?></td>					
					<td><?=$one['event']?></td>					
					<td><?=$one['reply']?></td>					
					<td><?=$one['reply_dt']?></td>					
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	