	<?
	$trav = mysql_query('SELECT * FROM travels');
	while ($w = mysql_fetch_array($trav))
	{
	$photo = mysql_query("SELECT * FROM photo WHERE album_id='$w[id]'");
	$p = mysql_fetch_array($photo);
	
	?>
<div class="travels">

		<?php
		$f="images/$p[id].jpg";
		$src = imagecreatefromjpeg($f);

		$w_src = imagesx($src);
		$h_src = imagesy($src);
		$koe = $h_src/150;
		$new_w = ceil($w_src/$koe);
		?>


    <div class="travels-photo">
    	<a <?if (mysql_num_rows($photo)==1) {?>class="fancybox-effects-b"<?} else {?>class="fancybox-effects-c"<?}?> data-fancybox-group="<?=$w['id']?>" href="images/<?=$p['id']?>.jpg" title="<?=$p['content']?>">
    		<img src="images/<?=$p['id']?>.jpg" width="<?=$new_w?>" height="150" alt="" />
    	</a>
	
		<div style="display:none">
			<?
			while ($p = mysql_fetch_array($photo))
			{
			?>
	 		<a class="fancybox-effects-c" data-fancybox-group="<?=$w['id']?>" href="images/<?=$p['id']?>.jpg" title="<?=$p['content']?>">
	 			<img src="images/<?=$p['id']?>.jpg" alt="" />
	 		</a>
	  	<?}?>
		</div>
	</div>

	<div class="name_travels">
		<a <?if ($w['content']) {?>id="inline" href="#<?=$w[id]?>"<?}?>> "<?=$w['name']?>" </a>
	</div>	
	
		<div style="display:none">
			<div id="<?=$w['id']?>">
				<?=$w['content']?>
			</div>
		</div>

</div>
<? } ?>
	