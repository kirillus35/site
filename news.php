	<?
	$time = mysql_query('SELECT * FROM news');
	while ($row = mysql_fetch_array($time))
	{
	?>
<div class="news">
	<? echo date( 'd-m-Y в H:i', strtotime($row['date'])); ?>
	<p class="title">"<?=$row['title']?>"</p>
	<p> <?=$row['content']?> </p>
</div>
<? } ?>