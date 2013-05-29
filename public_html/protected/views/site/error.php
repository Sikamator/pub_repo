<center>
<h1><?php echo $code; ?></h1>

<div class="error">
<?php
	switch ($code){
		case '404':
		echo "<p>А такой страницы нет</p>";
		break;
	}
	?>
</div>
</center>