<?
error_reporting('E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING');
include('connect.php');
include('utils.php');
?>

<? $page = $_REQUEST['page'];

$query = mysql_qw('SELECT * FROM menu WHERE `page`=?', $page) or die (mysql_error()); 
$title = mysql_fetch_array($query);
$title = $title['title'] . ' | Сайт 10а класса'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<title><?=$title?></title>
  <!-- Add jQuery library -->
  <script type="text/javascript" src="fancybox/lib/jquery-1.8.0.min.js"></script>

  <!-- Add mousewheel plugin -->
  <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

  <!-- Add fancyBox main JS and CSS files -->
  <script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.0"></script>
  <link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.0" media="screen" />

  <!-- Add Button helper  -->
  <link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.3" />
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.3"></script>

  <!-- Add Thumbnail helper -->
  <link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.6" />
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.6"></script>

  <!-- Add Media helper -->
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.3"></script>
  <script type="text/javascript">

      $(document).ready(function() {

        $("#inline").fancybox({
        });

        $(".fancybox-effects-a").fancybox({
          closeBtn  : true,
          nextClick : false
        });

        $(".fancybox-effects-d").fancybox({
          closeBtn  : false,
          closeClick :true,
        });
  
        $(".fancybox-effects-b").fancybox({
        //itemLoadCallback: getGroupItems,
        closeBtn  : true,
        arrows    : false,
        nextClick : false,
        openEffect : 'none',

        helpers : {
          title : {
            type : 'inside'
          },
          thumbs : {
            width  : 70,
            height : 50
          }
        }
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
</head>

<body>
<div class="bod">
<div class="page">
	<div class="header"></div>
	<div class="link">
        <ul class="b-nav-list">
      	
            <?
            $menu= mysql_qw('SELECT * FROM menu');
            while ($row = mysql_fetch_array($menu))
            {
            ?>  	 
               <li class="item">
                  <a <?if ($page==$row['page']) {?> class="active"<?}?>
                  href="/<?=$row['page']?>"><?=$row['title']?></a>
               </li>
             <?}?>   
        </ul>    
	</div>
	<div class="mainbar">		
        <?
        if ($page)
        {
            include($page . '.php');
        }
        else
        {
            include('class.php');
        }
        ?>
	</div>

	<div class="footer_guarantor"></div>

</div>

<div class="footer">
<p class="fot">&copy; 2012 Кузнецов Кирилл & Кукушкин Тимофей</p>
</div>
</div>
</body>
</html>