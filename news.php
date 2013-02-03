	<?
	$time = mysql_query('SELECT * FROM news');
	while ($row = mysql_fetch_array($time))
	{
	?>
<div class="news">
	<p class="title">"<?=$row['title']?>"</p>
	<p class="titletime"><? echo date( 'd-m-Y в H:i', strtotime($row['date'])); ?></p>
	<p class="news_content"> <?=$row['content']?> </p>
</div>
<? } ?>