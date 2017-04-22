<?php
require_once("/../classes/class.PaginationLinks.php");
?>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<h1><?php echo $data->RubricName?></h1>

<?php
//var_dump($data);
$newsarray = $data2;
	foreach($newsarray as $news)
	{
		echo "<div class='NewsItem'>";
		$link='/news/'.$news->NewsId;
		echo "<h2><a href=$link>$news->SeoH1</a></h2>";
		echo "<p>$news->SeoDescription<p>";
		echo "</div>";
	}
?>
<div class='pagination'>
<?php
echo PaginationLinks::create($data3,$data4);
?>
</div>	
</body>
