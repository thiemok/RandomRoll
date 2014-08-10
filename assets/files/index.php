<?php

//Cache Control
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00");

?>

<?php

//Thanks newbi3 for fixing my shitty php ;)

$loop = 0;
foreach(glob("/www/*.php") as $roll){

	$rolls[$loop] = $roll;
	//[debug] echo " $roll ";

	$loop++;

}

$element = rand(0, count($rolls)-1);

require($rolls[$element]);


?>

</html>

<?php exit(); ?>