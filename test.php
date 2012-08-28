

<html>
<head>

	<title>fancyBox - Fancy jQuery Lightbox Alternative | Demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Add jQuery library -->
	<script type="text/javascript" src="fancybox/lib/jquery-1.8.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.0"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.0" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.3" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.3"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.6" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.6"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.3"></script>

	

	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
</head>
	
<body>	
<div>	

	<h3>Different effects</h3>
<a class="fancybox-effects-c" data-fancybox-group="thum" href="5_b.jpg" title="4545645645"><img src="5_s.jpg" alt="" /></a>

<div style="display:none">
<a class="fancybox-effects-c" data-fancybox-group="thum" href="2_b.jpg" ><img src="2_s.jpg" alt="" /></a>

<a class="fancybox-effects-c" data-fancybox-group="thum" href="3_b.jpg" ><img src="3_s.jpg" alt="" /></a>
		
<a class="fancybox-effects-c" data-fancybox-group="thum" href="4_b.jpg" ><img src="4_s.jpg" alt="" /></a>
<a class="fancybox-effects-c" data-fancybox-group="thum" href="6_s.jpg" ><img src="6_b.jpg" alt="" /></a>
</div>
	
	<a id="inline" href="#data">Вывод контекта из элемента с ID="data"</a>
	<div style="display:none">
		<div id="data">
			Для анимешников
			---------
			Недавно показалось, что http://animecalendar.net/ закрыли, но это я лох ;)
			Да и смотреть там, не вышли ли новые серии нужных мне аниме - неудобно.
			Я написал свой сервис.
			http://anime-news-checker.herokuapp.com/
			Чтобы им пользоваться нужно иметь аккаунт на сайте http://myanimelist.net/.
			Сервис проверит, не вышли ли новые серии аниме из раздела Watching на http://myanimelist.net/ и покажет, что нужно посмотреть :)
			Информация обновляется каждые 3 часа.
			Но мы не можем гарантировать то, что вы найдете совсем новую серию с субтитрами или озвучкой



		</div>
	</div>

<a id="inline" href="#fram">Выводит сожержимого URLa</a>
	<div style="display:none">
		<div id="fram">
        <? 
        include ('http://phpprogs.ru/test/jquery/fancybox/frame.html')
        ?>

		</div>
	</div>

</div>

<script type="text/javascript">

	  	$(document).ready(function() {
	
			$("#inline").fancybox();

			$("#frame").fancybox();

 			$(".fancybox-effects-c").fancybox({
				//itemLoadCallback: getGroupItems,
				closeBtn  : false,
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
					this.title = 'Изображение ' + (this.index + 1) + ' из ' + this.group.length + (this.title ? ' <br> ' + this.title : '');
				}
			});

		});
	</script>	



</body>
</html>