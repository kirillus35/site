	<? 
	$class = mysql_query('SELECT * FROM class');
	while ($c = mysql_fetch_array($class))
	{
	?>
      <div class="class">
      	    <div class="class-photo">
      	    	<a class="fancybox-effects-a" data-fancybox-group="<?=$c['id']?>" href="images/class/<?=$c['id']?>.jpg">
      	    		<img src="images/class/<?=$c['id']?>.jpg" height="120" alt="">
      	    	</a>
      	    </div>
      		<div class="name_travels">
      			<a href="<?=$c['link']?>" target="_blank"><?=$c['name']?></a>
      		</div>
 	  </div>
 	 <?}?> 