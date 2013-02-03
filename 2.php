<html>
<head>
<meta http-equiv="Content-Type" content="charset=utf-16 LE" />
<title>Парсим ссылки на альбомы</title>
</head>
<body>
<?
$html = file_get_contents('http://www.google.ru/');
// создаем новый dom-объект
$dom = new domDocument;

// загружаем html в объект
$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;

// элемент по тэгу
foreach ($dom->getElementsByTagName('a') as $row)
    echo $row->GetAttribute('href').' ('.$row->nodeValue.')<br>';
?>
</body>
</html>