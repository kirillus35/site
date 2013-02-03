<html>
    <head>
        <title>Формы</title>
        <meta http-equiv="content-type"
         content="text/html" charset="utf-8">
         <meta name="description"
         content="Изучение форм в HTML">
         <meta name="keywords" content="формы">
         <style>
         .input{
         	margin-top: -15px;
         }

         .te{
         	overflow: auto;
 			resize:none;
		 }
         </style>
     </head>
     <body>
         <form action="1.php" method="POST" name="forma">
             <p>Введите имя:
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
             <textarea class="te" name="aboutme" cols="60" rows="8" placeholder="Пишем здесь" wrap="soft"></textarea>
             </p>
             <p>
             <input class="input" type="submit" name="button"
                                     value="Принять">
            </p>
       </form>
   </body>
</html>