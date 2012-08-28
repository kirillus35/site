	<?
	$trav = mysql_query('SELECT * FROM travels');
	while ($w = mysql_fetch_array($trav))
	{
	$photo = mysql_query("SELECT * FROM photo WHERE album_id='$w[id]'");
	$p = mysql_fetch_array($photo);
	
	?>
<div class="travels">

<ul>
	
		<?php
		$f="images/$p[id].jpg";
		$src = imagecreatefromjpeg($f);

		$w_src = imagesx($src);
		$h_src = imagesy($src);
		$koe = $h_src/150;
		$new_w = ceil($w_src/$koe);
		?>


    <li class="item"><a class="fancybox-effects-c" data-fancybox-group="<?=$w['id']?>" href="images/<?=$p['id']?>.jpg" title="<?=$p['content']?>"><img src="images/<?=$p['id']?>.jpg" width="<?=$new_w?>" height="150" alt="" /></a>
	
		<div style="display:none">
			<?
			while ($p = mysql_fetch_array($photo))
			{
			?>
	 		<a class="fancybox-effects-c" data-fancybox-group="<?=$w['id']?>" href="images/<?=$p['id']?>.jpg" title="<?=$p['content']?>"><img src="images/<?=$p['id']?>.jpg" alt="" /></a>
	  	<?}?>
		</div></li>
	<li class="name_travels"><a <?if ($w['content']) {?>id="inline" href="#<?=$w[id]?>"<?}?>> "<?=$w['name']?>" </a></li>	
</ul>
	
		<div style="display:none">
			<div id="<?=$w['id']?>">
				<?=$w['content']?>
			</div>
		</div>

</div>
<? } ?>
<script type="text/javascript">

	  	$(document).ready(function() {

	  		$("#inline").fancybox({
	  		closeBtn  : false,	
	  		});
	
 			$(".fancybox-effects-c").fancybox({
				//itemLoadCallback: getGroupItems,
				closeBtn  : true,
				arrows    : false,
				nextClick : true,
				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					thumbs : {
						width  : 70,
						height : 50
					}
				},
	
				afterLoad : function() {
					//alert(this.title),
					this.title = 'Изображение ' + (this.index + 1) + ' из ' + this.group.length + (this.title ? ' <br> ' + this.title : '');
				}
			});
 
		});
	</script>
	