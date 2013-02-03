	<? 
	$class = mysql_query("SELECT * FROM class ORDER BY 'name'");
	while ($c = mysql_fetch_array($class))
	{
	?>
      <div class="travels">
            <div class="name_class">
                  <a <?if($c['link']) {?> href="<?=$c['link']?>" <?} else {}?> target="_blank"><?=$c['name']?></a>
            </div>
      	<div class="class-photo">
      	    	<a class="fancybox-effects-d" data-fancybox-group="<?=$c['id']?>" href="images/class/<?=$c['id']?>.jpg">
      	    	      <img src="images/class/<?=$c['id']?>.jpg" height="150" alt="">
      	    	</a>
      	</div>
 	</div>
 	<?}?> 