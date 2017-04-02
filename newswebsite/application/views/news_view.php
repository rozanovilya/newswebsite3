<head>
<title><?php echo $data->SeoTitle?></title>
</head>
<body>
<?php
$rubric = $data->oNewsRubric;
$rubricname = $rubric->RubricName;
$rubriclink = "/rubric/".$data->NewsRubric;
//var_dump($rubrilink);
?>
<?php echo "<p><a href= $rubriclink > $rubricname </a></p>"?> 
<h1><?php echo $data->SeoH1?></h1>
<p>Источник - <?php echo $data->NewsSource?></p>
<?php echo $data->NewsText?>

</body>
