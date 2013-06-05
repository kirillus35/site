<html>
    <head>
        <title>Формы</title>
        <meta http-equiv="content-type"
         content="text/html" charset="utf-8">

     <body>

   <strong>Имя:</strong><?=$_REQUEST["imya"]?> <br>
   <strong>Пароль:</strong> <?=$_REQUEST["parol"]?> <br>
   <strong>Пол:</strong> <?=$_REQUEST["pol"]?> <br>
   <strong>Получаемая информация:</strong> <br>
   <? if ($_REQUEST["news"] == 'on') { ?> 
       Новости сайта <? } ?><br>

   <? if ($_REQUEST["info"] == 'on') { ?> 
       Информация о новых товарах <? } ?><br> 

   <? if ($_REQUEST["kurs"] == 'on') { ?> 
       Курсы валют <? } ?><br>

   <strong>E-mail:</strong> <?=$_REQUEST["email"]?> <br>
   <strong>Страна:</strong> <?=$_REQUEST["country"]?> <br>
   <strong>О Себе:</strong> <?=$_REQUEST["aboutme"]?> <br>

   </body>
</html>