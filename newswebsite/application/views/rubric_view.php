<head>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<h1><?php echo $data->RubricName?></h1>

<?php
$newsarray = $data->oNews;
	foreach($newsarray as $news)
	{
		$link='/news/'.$news->NewsId;
		echo "<h2><a href=$link>$news->SeoH1</a></h2>";
		echo "<p>$news->SeoDescription<p>";
	}
?>
</body>
