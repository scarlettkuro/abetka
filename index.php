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
	<title>Bootstrap 101 Template</title>
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
		$(function() {
				$("form").submit(function(event) {
					event.preventDefault();
					$.post('/translit', $(this).serialize(), function(data) {
						$('#text').html(data);
					})
				});
		});
  </script>
</body>
</html>
