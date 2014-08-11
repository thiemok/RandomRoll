<html>
<head>
<script type="text/javascript">

</script>
</head>

Current Rolls:<br/>
<font color="lime">
<?php
$isrunning = exec('cat /pineapple/components/infusions/randomroll/running');

if($isrunning == '1'){
$loop = 0;
foreach(glob("/www/*.php") as $roll){

	$rolls[$loop] = $roll;
	echo " $roll <br/>" ;

	$loop++;
}
}

else
	echo('<font color="red">Not Running. . .</font>');
?>
</font>
</body>
</html>