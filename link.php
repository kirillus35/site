        <ul class="links">
            <?
            $link= mysql_query('SELECT * FROM link');
            while ($li = mysql_fetch_array($link))
            {
            ?>  	 
               <li>
                  <a href="<?=$li['page']?>" target="_blank"><?=$li['title']?></a>
               </li>
             <?}?>   
        </ul>