<h2>Персонал</h2>
<?
//echo "<pre>";
//var_dump($oeq);
?>  
<section class="content">
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	
	<div class="records">
		<div class="records">
			<?foreach ($person as $pers):?>
			<h3><?=$pers['name']?></h3>
			<h4><?=$pers['post']?></h4>
						
			<table>
				<tr>				
					<th>Дата приема на работу</th>
					<th>Дата увольнения</th>	
					<th>СНИЛС</th>										
					<th>Дата рождения</th>										
					<th>Место рождения</th>										
					<th>Основание для труда</th>										
					<th>Тип работы</th>										
					<th>Примечание</th>									
					<th>Выполнение работ в ОА</th>									
				</tr>
				<tr>
					<td><?=$pers['dt_start']?></td>
					<td><?=$pers['dt_end']?></td>
					<td><?=$pers['snils']?></td>					
					<td><?=$pers['birthday']?></td>					
					<td><?=$pers['birthplace']?></td>				
					<td><?=$pers['contract']?></td>				
					<td><?=$pers['work_type']?></td>				
					<td><?=$pers['ps']?></td>				
					<td><?=$pers['oa_work']?></td>				
				</tr>
				<?endforeach;?>				
			</table>			
			
			</table>
<!--основное образование-->			
			<h3>Основное образование</h3>
			<table>
				<tr>
					<th>Наименование учебного заведения</th>
					<th>Год окончания</th>
					<th>Квалификация</th>
					<th>Реквизиты документа</th>				
				</tr>
				<?foreach ($basicEducation as $basic):?>
				<tr>
					<td><?=$basic['institution']?></td>				
					<td><?=$basic['year_end']?></td>
					<td><?=$basic['qualification']?></td>
					<td><?=$basic['doc']?></td>				
				</tr>
				<?endforeach;?>			
			</table>

<!--доп образование-->			
			<h3>Дополнительное образование</h3>
			<table>
				<tr>
					<th>Тип обучения</th>
					<th>Начало обучения</th>
					<th>Конец обучения</th>
					<th>Место обучения</th>
					<th>Документ об образовании</th>			
					<th>Реквизиты документа</th>
					<th>Дата документа</th>					
				</tr>
				<?foreach ($addEducation as $add):?>
				<tr>
					<td><?=$add['type']?></td>				
					<td><?=$add['dt_start']?></td>				
					<td><?=$add['dt_end']?></td>				
					<td><?=$add['org_name']?></td>				
					<td><?=$add['doc']?></td>				
					<td><?=$add['doc_number']?></td>				
					<td><?=$add['doc_dt']?></td>					
				</tr>
				<?endforeach;?>			
			</table>

<!--сертификаты-->			
			<h3>Сертификаты и лицензии</h3>
			<table>
				<tr>
					<th>Выдавший орган</th>
					<th>Наименование документа </th>
					<th>Реквизиты документа </th>
					<th>Дата выдачи</th>
					<th>Действителен до </th>							
				</tr>
				<?foreach ($licenses as $lic):?>
				<tr>
					<td><?=$lic['gave']?></td>				
					<td><?=$lic['doc_name']?></td>				
					<td><?=$lic['doc_number']?></td>				
					<td><?=$lic['dt_start']?></td>				
					<td><?=$lic['dt_end']?></td>					
				</tr>
				<?endforeach;?>			
			</table>

		</div>		
	</div>
</section>	