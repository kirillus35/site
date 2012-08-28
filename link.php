        <ul class="links">
            <?
            $link= mysql_query('SELECT * FROM link');
            while ($li = mysql_fetch_array($link))
            {
            ?>  	 
               <li>
                  <a href="<?=$li['page']?>"><?=$li['title']?></a>
               </li>
             <?}?>   
        </ul>