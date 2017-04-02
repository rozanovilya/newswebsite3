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
<?php 
$comments = $data->oComments;
$commentsnumber = count($comments);
?>
<h4>Комментарии (<?php echo $commentsnumber ?>)</h4>
<?php 
foreach ($comments as $comment)
{
	if ($comment->Moderated) {
		$user = $comment->oCommentAuthor;
		$username = $user->UserName;
		echo "<h5>Автор - $username</h5>";
		echo "<p>$comment->CommentText</p>";
	}
}
?>
<h4>Добавить комментарий</h4>
<form action="/../formactions/addcomment.php" method="post"> <!don't know how to write action >
Имя пользователя: <input type="text" name="username"> <br>
Пароль: <input type="password" name="password"> <br>
Комментарий: <input type = "text" name="commenttext" width="100px" height="60px"> <br>
 <input type="submit" name="Submit">

</form>