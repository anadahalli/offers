<?php

//~ php scraping library
require_once('simple_html_dom.php');

//~ settings and urls
require_once('config.php');

$bank = isset($_GET['bank']) ? $_GET['bank'] : NULL;
$city = isset($_GET['city']) ? $_GET['city'] : NULL;
$query = isset($_GET['query']) ? $_GET['query'] : NULL;

//~ $bank = 'City';
//~ $city = 'Pune';
//~ $query = 'special';

if (!$bank || !$city || !$query) echo json_encode(FALSE);

else {
	
	if ($query == 'special')
		$data = special($url_bank[$bank] . $url_special[$bank][$city]);
	else if ($query == 'dining')
		$data = dining($url_bank[$bank] . $url_dining[$bank][$city]);
	else 
		echo json_encode(FALSE);
		
	echo json_encode($data);
}

function special($url) {
	
	$html = file_get_html($url);

	$special = array();
	$hot = array();
	$latest = array();

	//~ hot offers
	foreach($html->find('.so-top-seca') as $ele)
		foreach($ele->find('p.bullet_txt') as $el)
			foreach($el->find('a') as $e)
				array_push($hot, $e->innertext);

	//~ latest offers
	foreach($html->find('.so-top-secb') as $ele)
		foreach($ele->find('p.bullet_txt') as $el)
			foreach($el->find('a') as $e)
				array_push($latest, $e->innertext);

	array_push($special, $hot, $latest);
	
	return $special;
}			

function dining($url) {
	
	$html = file_get_html($url);

	$dining = array();

	foreach($html->find('.so-resholder') as $ele)
		array_push($dining, $ele->innertext);

	return $dining;
}

?>
