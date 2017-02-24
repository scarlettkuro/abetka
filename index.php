<?php

if ($_SERVER['REQUEST_URI'] == '/translit') {
	include 'abetka.php';
	$text = $_POST['text'];

	foreach($map as $cyr=>$lat) {
	$text = str_replace($cyr,$lat,$text);
	}
	$text  = htmlentities($text);
	$text = str_replace(PHP_EOL,'<br/>',$text);
	die($text);
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Ukraїnska abetka</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="container">
			<div class="col-lg-6">
				<form method="post">
					<textarea name = "text" class="form-control" style ="resize:vertical; font-size:13pt;" rows="20"></textarea>
					<button type="submit" class="btn btn-default">Translit!</button>
				</form>
			</div>
			<div class="col-lg-6">
				<div class="jumbotron">
					<p>Translit:</p>
					<p id="text"><?= $text ?></p>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script>
			/*
			 * Ukraїnska abetka
			*/
			var abetka = {

				'А' : 'A', 
				'а' : 'a', 
				'Б' : 'B', 
				'б' : 'b', 
				'В' : 'V', 
				'в' : 'v', 
				'Г' : 'H', 
				'г' : 'h', 
				'Ґ' : 'G', 
				'ґ' : 'g', 
				'Д' : 'D', 
				'д' : 'd', 
				'Е' : 'E', 
				'е' : 'e', 
				'Є' : 'Ë', 
				'є' : 'ë', 
				'Ж' : 'Ž', 
				'ж' : 'ž', 
				'З' : 'Z', 
				'з' : 'z', 
				'И' : 'Y', 
				'и' : 'y', 
				'І' : 'I', 
				'і' : 'i', 
				'Ї' : 'Ї', 
				'ї' : 'і', 
				'Й' : 'J', //hz
				'й' : 'j', //hz
				'К' : 'K', 
				'к' : 'k', 
				'Л' : 'L', 
				'л' : 'l', 
				'М' : 'M', 
				'м' : 'm', 
				'Н' : 'N', 
				'н' : 'n', 
				'О' : 'O', 
				'о' : 'o', 
				'П' : 'P', 
				'п' : 'p', 
				'Р' : 'R', 
				'р' : 'r', 
				'С' : 'S', 
				'с' : 's', 
				'Т' : 'T', 
				'т' : 't', 
				'У' : 'U', 
				'у' : 'u', 
				'Ф' : 'F', 
				'ф' : 'f', 
				'Х' : 'X', //hz
				'х' : 'x', //hz
				'Ц' : 'C', 
				'ц' : 'c', 
				'Ч' : 'Č', 
				'ч' : 'č', 
				'Ш' : 'Š ', 
				'ш' : 'š', 
				'Щ' : 'Ş', 
				'щ' : 'ş', 
				'Ь' : '', 
				'ь' : '', 
				'Ю' : 'Ü', 
				'ю' : 'ü', 
				'Я' : 'Ä', 
				'я' : 'ä'
			};

		$(function() {
				$("form").submit(function(event) {
					event.preventDefault();
						var text = $('[name=text]').val();
						$.each(abetka, function(cyr, lat) {
								text = text.replace(new RegExp(cyr, "g"), lat);
						}); 
						var text = text.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
							 return '&#'+i.charCodeAt(0)+';';
						});
						text = text.replace(new RegExp("\n", "g"), '<br>');	
						$('#text').html(text);
				});
		});
  </script>
</body>
</html>
