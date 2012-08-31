<table class="timetable">
	<tr class="str">
		<td></td>
		<td>Понедельник</td>
		<td>Вторник</td>
		<td>Среда</td>
		<td>Четверг</td>
		<td>Пятница</td>
		<td>Суббота</td>
	</tr>
			  <? 
			  $time = mysql_query('SELECT * FROM timetable');
			  while ($r = mysql_fetch_array($time))
			   {
			   ?>
			   <tr>
			   	<td class="str"><?=$r[1]?></td>
			   <? 
				for($i=2; $i<8; $i++)
				 {
				 ?>
			    <td class="time-content"><?=$r[$i]?></td>
				<? } ?>
			   </tr>
				<? } ?>	
</table>	
		