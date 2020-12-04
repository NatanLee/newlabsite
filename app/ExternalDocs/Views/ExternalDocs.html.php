<h2>Нормативная документация</h2>
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
					<th>Код НД</th>					
					<th>Обозначение документа</th>
					<th>Наименование документа</th>
					<th>Дата последнего изменения или дата его введения</th>
					<th>Частота ревизий</th>				
					<th>Право собственности (пользования)</th>				
					<th>Примечание</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><a href="index.php?externalDocsDetails=<?=$one['doc_int_code']?>"><?=$one['doc_int_code']?></a></td>
					<td><?=$one['doc_ext_code']?></td>
					<td><?=$one['name']?></td>
					<td><?=$one['last_change_dt']?></td>					
					<td><?=$one['revision_frequency']?></td>					
					<td><?=$one['property']?></td>					
					<td><?=$one['ps']?></td>					
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	