<!-- <object width="470" height="70" data="http://flv-mp3.com/i/pic/ump3player_500x70.swf" type="application/x-shockwave-flash">
  <param value="transparent" name="wmode">
  <param value="true" name="allowFullScreen">
  <param value="always" name="allowScriptAccess">
  <param value="http://flv-mp3.com/i/pic/ump3player_500x70.swf" name="movie">
  <param value="way=images/Armin - This Light Between Us.mp3" name="FlashVars">
</object> 

  <p>Armin - This Light Between Us</p>
    <audio src="images/Armin - This Light Between Us.mp3" controls></audio>-->

 

<p class="padd" align="center">
  <video width="640" height="360" src="http://amvnews.ru/index.php?go=Files&file=down&id=4083" controls width="530"></video>

  <iframe width="640" height="360" src="http://amvnews.ru/index.php?go=Files&file=embed&id=5006&pic=screen" frameborder="0" allowfullscreen></iframe>
  
</p>
    <div class="forms"> 
    <form class="form" action="?page=links" method="POST" name="forma">
      <p> Ваше имя: <br>
        <input type="text" name="imya" width=20> </p>
      <p> Текст сообщения: <br>
        <textarea name="text" cols="60" rows="8" wrap="soft"></textarea>
      </p>

       <!-- <p>Введите имя:
      <input type="text" name="imya" width="20"  autofocus>
      </p>

       <p>Введите пароль:
      <input type="password" name="parol" width="20">
      </p>

       <p>Пол:
      <input type="radio" name="pol" value="male"> М
       <input type="radio" name="pol" value="female"> Ж
      </p>

       <p>Какую информацию вы хотите
                   получать по почте?<br>
       <input type="checkbox" name="news" >
                    Новости сайта <br>
       <input type="checkbox" name="info">
              Информация о новых товарах<br>
      <input type="checkbox" name="kurs"> Курсы валют
      </p>

       <p>Ваш e-mail:
      <input type="text" name="email" width="20">
      </p>

       <p>Выберите страну:<br>
       <select name="country">
         <option>Украина</option>
         <option>Россия</option>
         <option>Китай</option>
         <option>Египет</option>
       </select>
       </p>

       <p>Напишите нам несколько строк о себе :)<br>
       <textarea name="aboutme" cols="60" rows="8" placeholder="Пишем здесь" wrap="soft"></textarea>
       </p> -->
       <p>
        <input type="submit" name="button"
                    value="Принять">
      </p>
     </form>
    </div>

    <!-- Добавление в бд-->
     <?
     //mysql_select_db($site);
     $imya = $_REQUEST["imya"];
     $text = $_REQUEST["text"];
     if ($text == '') {
      $text='-----';
     }
     if ($imya == '') {
      $imya='Аноним';
     }     
     if (($text != '-----') or ($imya != 'Аноним')) {
      $result = mysql_query("INSERT INTO chat (title, content) VALUES('$imya','$text')");  
     }
     ?>

     <!-- Вывод всей бд-->
    <div>
    <?
    $chat = mysql_query('SELECT * FROM chat ORDER BY id DESC');
    while ($ch = mysql_fetch_array($chat))
    {
    ?>
      <div class="chat">
        <p class="ch_title"><?=$ch['title']?></p>
        <p class="ch_content"> <?=$ch['content']?> </p>
      </div>
    <? } ?>
    </div>