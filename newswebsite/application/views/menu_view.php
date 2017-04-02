<p><a href="/">Главная</a></p>
<ul class='menu'>
<?php foreach ($data as $element){
			$rubriclink = '/rubric/'.$element->RubricId;
			echo "<li><a href=$rubriclink>$element->RubricName</a></li>";
		}
?>
</ul>
<?php
//var_dump($data);