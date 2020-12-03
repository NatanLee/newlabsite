<h2>Персонал</h2>
<?
//echo "<pre>";
//var_dump($allEq);
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
					<th>ФИО</th>
					<th>Должность</th>
					<th>Дата приема на работу</th>
					<th>Дата увольнения</th>				
				</tr>
				<?foreach ($allEm as $em):?>
				<tr>
					<td><?=$em['user_code']?></td>
					<td><a href="index.php?employeeDetails=<?=$em['user_code']?>"><?=$em['name']?></a></td>
					<td><?=$em['post']?></td>
					<td><?=$em['dt_start']?></td>
					<td><?=$em['dt_end']?></td>					
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	