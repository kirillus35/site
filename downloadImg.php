<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Парсим ссылки на альбомы</title>
</head>
<body>
<?
$urlMain='http://imgsrc.ru';


echo '<h3>Парсим ссылки на альбомы на примере одной страницы из категории Друзья:</h3>';

//парсим ссылки на альбомы
$arrayUrlAlbum = parceUrlAlbums('http://imgsrc.ru/main/search.php?str=&tag=&nopass=&cat=36&page=2');

foreach ($arrayUrlAlbum as $url=>$tmp){
	echo 'Альбом '.$url.'<br />';
	
	//парсим ссылки на картинки внутри альбомов
	$urlImgArray = parceUrlImg($url);
	
	echo '<div style="margin-left:25px">';
	   foreach ($urlImgArray as $urlImg=>$tmp2){		 
		 downloadImg($urlImg); //скаичваем картинки по ссылке	
	   }
	echo '</div>';
		
}



//------------------------------------------------------------------------------------------------------------------------
// Скаичваем картинки
//------------------------------------------------------------------------------------------------------------------------

function downloadImg($urlImg){	
		$up_dir = 'download/';
		@mkdir( $up_dir, 0700);
		$fileName =  basename($urlImg);
		//организуем название для папки, по логину пользователя
		$nameUser =  trim(preg_replace('/'.$fileName.'/is', "", $urlImg ));
	 	$nameUser = preg_replace('/^http:\/\/(.*?)\//is', "", $nameUser);
		$nameUser = preg_replace('/^\//is', "", $nameUser);
		$nameUser = preg_replace('/^(.*?)\//is', "", $nameUser);
		$nameUser = preg_replace('/\/(.*?)\/$/is', "", $nameUser );
		
		
		@mkdir( $up_dir, 0700  );	
		@mkdir( $up_dir.$idCatGet, 0700 );
		@mkdir( $up_dir.$idCatGet.'/'.$nameUser, 0700 );
		$path = $up_dir.$idCatGet.'/'.$nameUser.'/'.$fileName;	


		echo '<br />Скачиваем - '.$up_dir.$nameUser.'/'.$fileName.'<br />';
		$url = $row['url'];			
		if (file_exists( $path )){
			//если файл имеется, то не скачиваем
		} else {
			@file_put_contents($path, file_get_contents($urlImg));
		}
}

//------------------------------------------------------------------------------------------------------------------------
// парсим ссылки на картинки внутри самих альбомов
//------------------------------------------------------------------------------------------------------------------------
function parceUrlImg($urlAlbum){
		global $urlMain;
		$urlImgArray = array();
		$url = $urlAlbum.'?lang=ru';
		$result = getPage( $url ); //скачиваем HTML странцу
		
		//случай если альбом удален или ошибка
		if (!$result) {
			return;
		}
		
		// если имеется кнопка далее в альбоме, то переходим по кнопке и получаем новую странцу
		 if (preg_match('/>><\/a>/is',$result ,$tmp_2)) {
			$url = preg_replace("/^(.*?)window.location=\'/is", "", $result);		
			$url = preg_replace("/'(.*?)$/is", "", $url );		
			$url = trim($url);		
			$result = getPage( $url.'&lang=ru' ); // перешли по кнопке далее
		 }		
			
			
		if (stripos($result,'<form name=passchk action=') and $row['password']) { //если это пароль, то выходим.			
			//в дынной статье мы не рассматриваем ввод пароля
			return;
		} else {

			//----------------------------------------------------------------------------
			//переход по кнопке все на одной странице (так проще парсить)
			//----------------------------------------------------------------------------
				 $result = preg_replace("/^(.*?)href='\/main\/pic_tape.php/is", "", $result);
				 $result = preg_replace('/\'>(.*?)$/is', "", $result );
				 $urlNextTmp = $result;			
			
			//обходим и собираем ссылки на фото
			//----------------------------------------------------------------------------
			$i = 1;
			while ($i <= 150) {//предположим, что более 150 страниц быть не может
				$urlNext = $urlMain.'/main/pic_tape.php'.$urlNextTmp.'<br />';
				//echo $urlNext.'<br />';
				$result = getPage(	$urlNext );	
				$resultRez = $result;
				//----------------------------------------
				// сканируем ссылки на фото
				//----------------------------------------

				//пометка на пароль
				$passwordFlag = 0;
				if ($row['pwd_md5']){
					$passwordFlag = 1;
				}
				if (! preg_match_all ("/<img.class=big.src=(.*?).alt=/",$result , $url_list)) {					
					  return;//обшибка
					} else {
					foreach ($url_list[1] as $key=>$value){ 
							$tmp = trim($value);
							$urlImgArray[$tmp]=true; //записываем готовую ссылку на картинку в массив (или в базу)
					}
				}
				
				if (preg_match('/shortcut.add\("Right"/is',$resultRez ,$tmp_2)) {
					//если есть, то переходим по следующей ссылке на следующую страницу внутри альбома
					$resultRez = preg_replace("/^(.*?)Right\",function\(\).\{window.location='\/main\/pic_tape.php/is", "", $resultRez);
					$resultRez = preg_replace('/\'(.*?)$/is', "", $resultRez );
					$urlNextTmp = $resultRez;
				} else { 
					$i = 1000;
					break; 
				}
			
			    $i++;
			}
		}
			
		return 	$urlImgArray;	
}



//-----------------------------------------------------------------------------------------------------------
// парсим ссылки на альбомы и получаем прямые ссылки и список альбомов
//-----------------------------------------------------------------------------------------------------------	
function parceUrlAlbums($urlPage){
	global $urlMain;
	  $result = getPage( $urlPage );
	  $arrayUrlAlbum = array();
	  if (!stripos ($result, "<a target=_blank href=")) {
		  echo 'Error';
		  exit;
	  } else {
		  preg_match_all ("/<tr(.*?)<\/tr>/",$result , $url_list); //выбираем ячейки таблицы
			  $link =  array (); 
			  foreach ($url_list[1] as $key=>$value){ 			  	
				  $tmp = trim($value);
				  if (stripos ( $tmp, "<a target=_blank href=" )) { 
					  //выделяем урл
					  $urlTMP = cutTextStartEnd($tmp, '<a target=_blank href=/','>');
					  $urlTMP = $urlMain.'/'.$urlTMP;
					  $arrayUrlAlbum [$urlTMP] = $photos;
					  //выделяем количество фото в альбоме
					  $photos = trim(cutTextStartEnd($tmp,'<td align=center>','</td>'));					 
					 // echo 'Сылка на альбом -'. $urlTMP .'    кол-во фотографий в альбоме - '. $photos;
					 // echo '<br />';					 
				  }
			  } 
	  }
	
	return  $arrayUrlAlbum;
}			
?>



</body>
</html>

<?
function getPage( $url )
{
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
	curl_setopt ($ch, CURLOPT_TIMEOUT, 15 );
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec ($ch);
	curl_close($ch);
	//$result = iconv("Windows-1251", "UTF-8", $result);
	//$result = convTegs( $result );
	return $result;
}


//-----------------------------------------------------------------------------------------------------------------------------------
// функции замены регулярных выражений
//-----------------------------------------------------------------------------------------------------------------------------------
// обрезка по шаблону начало-текст-конец 
// без учета регистра. со штампами включительно
//жадный
function cutTextStartEnd($text, $start, $end) {
	$posStart = stripos($text, $start );
	if ($posStart === false) return $text;	
	$text = substr($text,$posStart+strlen( $start ));	
	$posEnd = stripos($text, $end );	
	if ($posEnd === false) return $text;
	$result = substr($text,0, 0-(strlen($text)-$posEnd));
	return $result;
}

// обрезка по шаблону начало-текст 
// без учета регистра. со штампами включительно
//жадный
function cutTextStart($text, $start) {
	$posStart = stripos($text, $start );
	if ($posStart === false) return $text;	
	$result = substr($text,$posStart+strlen( $start ));
	return $result;
}


// обрезка по шаблону текст-конец 
// без учета регистра. со штампами включительно
//жадный
function cutTextEnd($text, $end) {	
	$posEnd = stripos($text, $end );	
	if ($posEnd === false) return $text;
	$result = substr($text,0, 0-(strlen($text)-$posEnd));
	return $result;
}

?>