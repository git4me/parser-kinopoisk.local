<?php
require('phpQuery.php');
//id фильма на кинопоиске
$id = 60001;


//cURL
$ch = curl_init('http://www.kinopoisk.ru/film/'.$id.'/');
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36"); 
$headers = array
(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Accept-Encoding: deflate',
    'Cache-Control: max-age=0',
    'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7',
    'Connection: keep-alive',
	'Host: www.kinopoisk.ru',
); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
curl_setopt($ch, CURLOPT_REFERER, "http://www.kinopoisk.ru");
curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec($ch); // выполняем запрос curl - обращаемся к сервера
curl_close($ch);

//phpQuery
$document = phpQuery::newDocumentHTML($result, 'utf-8');

//Выборка
//Имя RU
$nameRu = strip_tags($document->find('div#headerFilm > h1.moviename-big'));
echo 'Имя-ру: '.$nameRu . '<br><br>';
//Имя EN
$nameEn = strip_tags($document->find('div#headerFilm > span'));
echo 'Имя-ен: '.$nameEn . '<br><br>';
//Год
$yar = strip_tags($document->find("table.info tr:contains('год') td:eq(1)"));
echo 'Год: '.$yar . '<br><br>';
//Страна
$country = strip_tags($document->find("table.info tr:contains('страна') td:eq(1)"));
echo 'Страна: '.$country . '<br><br>';
//Слоган
$slogan = strip_tags($document->find("table.info tr:contains('слоган') td:eq(1)"));
echo 'Слоган: '.$slogan . '<br><br>';
//Режиссер
$director = strip_tags($document->find("table.info tr:contains('режиссер') td:eq(1)"));
echo 'Режиссер: '.$director . '<br><br>';
//Сценарий
$script = strip_tags($document->find("table.info tr:contains('сценарий') td:eq(1)"));
echo 'Сценарий: '.$script . '<br><br>';
//Продюсер
$producer = strip_tags($document->find("table.info tr:contains('продюсер') td:eq(1)"));
echo 'Продюсер: '.$producer . '<br><br>';
//Оператор
$operator = strip_tags($document->find("table.info tr:contains('оператор') td:eq(1)"));
echo 'Оператор: '.$operator . '<br><br>';
//Композитор
$composer = strip_tags($document->find("table.info tr:contains('композитор') td:eq(1)"));
echo 'Композитор: '.$composer . '<br><br>';
//Художник
$artist = strip_tags($document->find("table.info tr:contains('художник') td:eq(1)"));
echo 'Художник: '.$artist . '<br><br>';
//Монтаж
$installation = strip_tags($document->find("table.info tr:contains('монтаж') td:eq(1)"));
echo 'Монтаж: '.$installation . '<br><br>';
//Жанр
$genre = strip_tags($document->find("table.info tr:contains('жанр') td:eq(1) span"));
echo 'Жанр: '.$genre . '<br><br>';
//бюджет
$budget = strip_tags($document->find("table.info tr:contains('бюджет') td:eq(1)"));
echo 'бюджет: '.$budget . '<br><br>';
//маркетинг
$marketing = strip_tags($document->find("table.info tr:contains('маркетинг') td:eq(1)"));
echo 'маркетинг: '.$marketing . '<br><br>';
//сборы в США
$feesInTheUS = strip_tags($document->find("table.info tr:contains('сборы в США') td:eq(1) a"));
echo 'сборы в США: '.$feesInTheUS . '<br><br>';
//сборы в мире
$feesInTheWorld = strip_tags($document->find("table.info tr:contains('сборы в мире') td:eq(1) a:eq(0)"));
echo 'сборы в мире: '.$feesInTheWorld . '<br><br>';
//сборы в России
$chargesInRussia = strip_tags($document->find("table.info tr:contains('сборы в России') td:eq(1) a:eq(0)"));
echo 'сборы в России: '.$chargesInRussia . '<br><br>';
//премьера (мир)
$PremiereWorld = strip_tags($document->find("table.info tr:contains('премьера (мир)') td:eq(1) a:eq(0)"));
echo 'премьера (мир): '.$PremiereWorld . '<br><br>';
//премьера (РФ)
$premierRF = strip_tags($document->find("table.info tr:contains('премьера (РФ)') td:eq(1) a:eq(0)"));
echo 'премьера (РФ): '.$premierRF . '<br><br>';
//релиз на DVD
$releaseOnDVD = strip_tags($document->find("table.info tr:contains('релиз на DVD') td:eq(1) a:eq(0)"));
echo 'релиз на DVD: '.$releaseOnDVD . '<br><br>';
//релиз на Blu-Ray
$releaseBluRay = strip_tags($document->find("table.info tr:contains('релиз на Blu-Ray') td:eq(1) a:eq(0)"));
echo 'релиз на Blu-Ray: '.$releaseBluRay . '<br><br>';
//время
$time = strip_tags($document->find("table.info tr:contains('время') td:eq(1)"));
echo 'время: '.$time . '<br><br>';
//Описание
$desc = strip_tags($document->find('td.news > span._reachbanner_ > div.brand_words'));
echo 'Описание:<br>'.$desc . '<br><br>';