<head>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<h1>Новостной сайт "Новости"</h1>
<?php
foreach ($data as $news) {
	$link = '/news/'.$news->NewsId;
	echo "<h2><a href=$link>$news->SeoH1</a></h2>";
	echo "<p>$news->SeoDescription</p>";
}
//var_dump($data);
?>
</body>