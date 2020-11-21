<h2>Субподряды</h2>
<?
//echo "<pre>";
//var_dump($all);
?>  
<section class="content">
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
					<th>Регистрационный № договора</th>
					<th>Дата договора</th>
					<th>Подрядчик</th>
					<th>Предмет договора</th>
					<th>Срок выполнения работ</th>				
					<th>Срок действия договора</th>						
					<th>Цена договора</th>				
					<th>Цель подряда</th>				
					<th>Дополнительные соглашения</th>				
					<th>Ответственное лицо от подразделения</th>				
					<th>Примечания</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['contract_number']?></td>
					<td><?=$one['contract_dt']?></td>					
					<td><?=$one['contractor']?></td>					
					<td><?=$one['subject']?></td>					
					<td><?=$one['work_deadline']?></td>					
					<td><?=$one['contract_deadline']?></td>					
					<td><?=$one['price']?></td>					
					<td><?=$one['purpose']?></td>					
					<td><?=$one['additional_agreements']?></td>						
					<td><?=$one['responsible']?></td>						
					<td><?=$one['ps']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	