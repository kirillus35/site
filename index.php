<?
error_reporting('E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING');
include('connect.php');
?>

<? $page = $_REQUEST['page']; ?>
        <?
        if ($page)
        {}
        else
        {
          $page='class';
        }
        ?> 

<? 
$query = mysql_query("SELECT * FROM menu WHERE page='$page'") or die (mysql_error()); 
//echo 'SELECT * FROM `menu` WHERE `page`=\'' . $page'\'';
$title = mysql_fetch_array($query);
//print_r($title);
$title = $title['title'] . ' | Сайт 10а класса'; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
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
  <script type="text/javascript">

      $(document).ready(function() {

        $("#inline").fancybox({
        });

        $(".fancybox-effects-a").fancybox({
          closeBtn  : true,
          nextClick : false
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
<style>
    
  .fancybox-custom .fancybox-skin {
    box-shadow: 0 0 50px #222;
  }

* {
 margin: 0;
 padding: 0;
 border: 0;
 font-size: 100.01%;
}*

html {
 height: 100%;
 background: white;
}

body{
width: 100%;
background: url(images/body1.jpg) repeat-x;
background-size:100% 100%;
float: center;
background-position: top center;
background-attachment: fixed;
min-height:99%;
height: 100%;
color: #000;
font-weight: normal;
font-family: Arial, Verdana, Helvetica, Sans-Serif;
font-size: 11pt;
}


div.page {
 width: 800px;
 margin: auto;
 height: auto !important;
 min-height:100%;
 height: 100%;
 background: white;
}


div.page div.footer_guarantor {
 height: 60px;
 clear: both;
 text-align: right;
 color: white;
}


div.footer {
 margin: auto;
 margin-top: -30px;
 width: 800px;
 height: 30px;
 clear: both;
 background: #427eab;
 opacity: 0.92;
 //border-top: 1px solid #cfba94;
 text-align: center;
 font-size: 12px;
}


div.page div.header {
 height: 95px;
 background: #3a6a8e url(images/header_main1.jpg) no-repeat;
 background-size: 49%;
}

div.page div.link {
 height: 90px;
 
}



div.page div.patch_minheight {
 width: 1px;
 height: 30px;
 float: right;
}



div.page div.mainbar {
 width: 100%;
 overflow: hidden;
 float: left;
 border-top: 1px solid #D0C7B7;
 background: white;
}

.b-nav-list {
  overflow: hidden;
  padding-top: 30px;
  margin-left: 75px;
  margin-right: 60px;
  color: #ffffff;
  font-family: Arial;
  font-size: 17px;
}
 
.item {
  float: left;
  list-style-type: none;
  }

  .class-photo{
  float: left;
  list-style-type: none;
  width: 300px;
  }

  .travels-photo{
  float: left;
  list-style-type: none;
  width: 400px;
  }

.name_travels{
   float: left;
 list-style-type: none;
 padding-top: 55px;
 padding-left: 40px;
font-size: 20px; 
}
  

div.link a:link , a:visited{
  color: #0000d0;
  display: block;
   margin: 4px 7px;
    padding: 4px 7px;
}

div.link a:hover, a:active ,a.active{
  text-decoration: none;
  background-color: #2871a8;
  color: white;
  font-size: 17px;
 -webkit-box-shadow: 0px 6px 20px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    0px 6px 20px rgba(50, 50, 50, 0.55);
box-shadow:         0px 6px 20px rgba(50, 50, 50, 0.55);
}

.links a:link , a:visited{
  color: #0000d0;
  display: block;
   margin: 4px 7px;
  padding: 4px 7px;
}

.links a:hover, a:active ,a.active{
  text-decoration: none;
  background-color: #2871a8;
  color: white;
  font-size: 17px;
 -webkit-box-shadow: 0px 6px 20px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    0px 6px 20px rgba(50, 50, 50, 0.55);
box-shadow:         0px 6px 20px rgba(50, 50, 50, 0.55);
}

div.travels{
padding-top: 10px;
width: 760px;
height: 160px;
 text-align: center;
border-bottom: 1px solid #D0C7B7;
font-size: 17px; 
padding-left: 80px;
padding-bottom: 4px;
}

div.class{
padding-top: 5px;
width: 760px;
height: 120px;
text-align: center;
border-bottom: 1px solid #D0C7B7;
font-size: 17; 
padding-left: 50px;
padding-bottom: 5px; 
}

div.travels a:link {
 text-decoration: none;
  color: #0000d0;
}

div.travels a:active{
  text-decoration: none;
  background-color: white;
  color:black ;
  font-size: 20px;
-webkit-box-shadow: 0px 0px 0px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    0px 0px 0px rgba(50, 50, 50, 0.55);
box-shadow:         0px 0px 0px rgba(50, 50, 50, 0.55);
}

div.class a:active{
  text-decoration: none;
  background-color: white;
  color:black ;
  font-size: 20px;
-webkit-box-shadow: 0px 0px 0px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    0px 0px 0px rgba(50, 50, 50, 0.55);
box-shadow:         0px 0px 0px rgba(50, 50, 50, 0.55);
}

div.class a:link {
 text-decoration: none;
  color: #0000d0;
}

.timetable{
width:99%;
text-align: center;
margin-top: 50px;
margin-left: 4px;
font-size: 14;
}

.timetable td{
 padding-top: 5px;
 vertical-align: top;
}
.str{ 
font-size: 16;
font-weight: bold;
color: white;	
background-color:#2871a8; 
opacity: 0.88;
}

.time-content{
 background-color: #88dafc; 
}

.news{
padding-top: 11px;
padding-right: 15px;
padding-left: 15px;
padding-bottom: 7px;
border-bottom: 1px solid #D0C7B7;	
font-size: 13;
text-align: justify;
}
.news_content{
 text-indent: 30px; 
}
.title{
	padding-top: 5px;
	padding-bottom:5px;
padding-left: 65px;	
font-weight: bold;
font-size: 19;	
}
.links{
 list-style-type: none;
 text-align: center;
 text-decoration:none; 
 padding-top: 15px;
}
.links li{
 padding-top: 5px;
 padding-bottom: 5px;
}

.fot{
 padding-top: 9px; 
 font-size:14px;
 color: black;
 font-stretch:condensed;
}

</style>
</head>

<body>
	
<div class="page">
	<div class="header"></div>
	<div class="link">
        <ul class="b-nav-list">
      	
            <?
            $menu= mysql_query('SELECT * FROM menu');
            while ($row = mysql_fetch_array($menu))
            {
            ?>  	 
               <li class="item">
                  <a <?if ($page==$row['page']) {?> class="active"<?}?>
                  href="?page=<?=$row['page']?>"><?=$row['title']?></a>
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
</body>
</html>