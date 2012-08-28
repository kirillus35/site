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

<style >

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

body {

 min-height:98%;
 height: 99%;
 background: white;
 color: #000;
 font-weight: normal;
 font-family: Arial, Verdana, Helvetica, Sans-Serif;
 font-size: 11pt;
}


div.page {
 width: 760px;
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
 margin-top: -22px;
 width: 760px;
 height: 30px;
 clear: both;
 background: #427eab;
 opacity: 0.88;
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
 background: white;
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

a:link , a:visited{
  color: #0000d0;
  display: block;
   margin: 4px 7px;
    padding: 4px 7px;
}

a:hover, a:active ,a.active{
  text-decoration: none;
  background-color: #2871a8;
  color: white;
  font-size: 17px;
 -webkit-box-shadow: 0px 6px 20px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    0px 6px 20px rgba(50, 50, 50, 0.55);
box-shadow:         0px 6px 20px rgba(50, 50, 50, 0.55);
} 

.mainbar table{
width:100%;
text-align: center;
margin-right: 0px;
margin-top: 50px;
font-size: 15;
}

.str{
font-size: 16;
font-weight: bold;	
}
.news{
padding-top: 10px;
padding-left: 10px;
padding-bottom: 10px;
border-bottom: 1px solid #D0C7B7;	
font-size: 13;
}
.title{
	padding-top: 5px;
	padding-bottom:5px;
padding-left: 35px;	
font-weight: bold;
font-size: 18;	
}
.links{
 list-style-type: none;
 text-align: center;
 text-decoration:none; 
 padding-top: 15px;
}
.links li{
 padding-top: 5px;
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