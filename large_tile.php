<html>
<head>


<!-- CSS -->
<style type="text/css">
	body{
		background-color: black;
		color: white;
	}

	#RollSelect{
		width: 700px;
		margin: 0 auto;
	}

	.roll {
		float:left;
		width: 80px;
		height:100px; /* Added some room so the text fits underneath */
		text-align: center;
		margin-right:1em;
	}

	.roll p {
		font-size: 1.0em; /* halfsize */
	}

	.roll img {
		width: 80px;
		height: 80px;
	}

	form{
		display: inline;
	}

</style>


<!-- JavaScript -->
<script type="text/javascript">
//sebkinne
$.fn.AJAXifyFormChecker = function(funct){
  this.each(function(i,el){
    var formData = new FormData();
    var checkbox_array = new Array();

    $("input,select,textarea",el).each(function(i,formEl){
      if(formEl.type == "file"){
        for(x=0; x<formEl.files.length; x++){
          formData.append(formEl.name,formEl.files[x]);
        }
      }
      else if(formEl.type == "checkbox"){
        if(typeof checkbox_array[formEl.name] === "undefined"){
          if(formEl.checked){
            checkbox_array[formEl.name] = new Array();
            checkbox_array[formEl.name].push(formEl.value);
          }
        }else{
          if(formEl.checked){
            checkbox_array[formEl.name].push(formEl.value);
          }
        }
      }else{
        formData.append(formEl.name, formEl.value);
      }
    });

    if(Object.keys(checkbox_array).length != 0){
      for (var key in checkbox_array) {
        console.log(checkbox_array[key]);
        formData.append(key,checkbox_array[key]);
      }
    }

    $.ajax({
      url: el.action,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      async: false,
      type: el.method,
      success: funct
    });

  });

return this;
}

//Infusion information link.
function infusionInfo(){
	popup('<center><h3>RandomRoll</h3><br/>Version 1.3<br/>Made by Foxtrot<br/>Credits to petertfm for original base!<br/>Sebkinne for custom AJAX Forms!<br/>newbi3 for helping with the roll displayer.<br/><a href="https://forums.hak5.org/index.php?/topic/30594-support-randomroll/">RandomRoll Support Thread</a></font></center>');
}

//Start RandomRoll.
function startRandomRoll(){
	notify('RandomRoll :: RandomRoll Started.');
}

function stopRandomRoll(){
	notify('RandomRoll :: RandomRoll Stopped.');
}


// Rolls Rolls and More Rolls.

function rollsCheckBoxSubmit(data){
	popup(data);
}

function rollSelectForm(data){
	popup(data);
}

function removeAllRolls(){
	notify('RandomRoll :: All Rolls Removed.');
}

function untickRolls(){
	document.getElementById('checkbox').checked = false;
	document.getElementById('checkbox1').checked = false;
	document.getElementById('checkbox2').checked = false;
	document.getElementById('checkbox3').checked = false;
	document.getElementById('checkbox4').checked = false;
	document.getElementById('checkbox5').checked = false;
	document.getElementById('checkbox6').checked = false;
}


</script>
</head>


<body>
	<!-- Needed Spacing -->
<center><a href="JAVASCRIPT:infusionInfo()">[Information]</a></center>
<br/>
<br/>


	<!-- Control Area -->
	<fieldset>
		<legend>RandomRoll : Control</legend>
<center>
<!-- Toggle RandomRoll -->
				<form class="formNoBreak" name="StartRandomRoll" action="/components/infusions/randomroll/functions.php" method="POST" onSubmit="$(this).AJAXifyFormChecker(startRandomRoll); return false;"><input type="submit" name="startRandomRollSubmit" value="Start RandomRoll"></form>

				<form class="formNoBreak" name="StopRandomRoll" action="/components/infusions/randomroll/functions.php" method="POST" onSubmit="$(this).AJAXifyFormChecker(stopRandomRoll); return false;"><input type="submit" name="stopRandomRollSubmit" value="Stop RandomRoll"></form>
</center>
</fieldset>

<br/>
<br/>


	<!-- Roll Area -->
<fieldset>
<legend>RandomRoll : Rolls</legend>
<center>
	<div id="wrapper">
<form align="center" class="formNoBreak" name="rollsSelectForm" action="/components/infusions/randomroll/functions.php" method="POST" onSubmit="$(this).AJAXifyFormChecker(rollSelectForm); return false;">

		<div class="RollSelect">
			
			<div class="roll">
					<input type="checkbox" id="checkbox" name="checkbox" value="rickroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/rickthumbnail.jpg" />
						<p>RickRoll</p>
			</div>
			
			
			<div class="roll">
					<input type="checkbox" id="checkbox1" name="checkbox" value="rcmroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/rcmthumbnail.jpg" />
						<p>RCM</p>
			</div>
			
			
			<div class="roll">
					<input type="checkbox" id="checkbox2" name="checkbox" value="nyanroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/nyanthumbnail.jpg" />
						<p>Nyan Cat</p>
			</div>


			<div class="roll">
					<input type="checkbox" id="checkbox3" name="checkbox" value="pbjtroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/pbjthumbnail.png" />
						<p>PBJT</p>
			</div>


			<div class="roll">
					<input type="checkbox" id="checkbox4" name="checkbox" value="trollroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/trollthumbnail.jpg" />
						<p>Trolololol</p>
			</div>


			<div class="roll">
					<input type="checkbox" id="checkbox5" name="checkbox" value="bsodroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/bsodthumbnail.jpg" />
						<p>BSOD</p>
			</div>


			<div class="roll">
					<input type="checkbox" id="checkbox6" name="checkbox" value="afroroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/afrothumbnail.png" />
						<p>Afro</p>
			</div>

			<div class="roll">
					<input type="checkbox" id="checkbox7" name="checkbox" value="nedryroll" />
						<img src="/components/infusions/randomroll/assets/files/thumbnails/nedrythumbnail.jpg" />
						<p>Nedry</p>
			</div>

			<!-- Submit Roll Selection -->
		<input valign="middle" class="rollSubmit" type="submit" name="rollsCheckBoxSubmit" value="Apply Selected Rolls." />
	</form>


	<form align="center" class="formNoBreak" name="rollsRemove" action="/components/infusions/randomroll/functions.php" method="POST" onSubmit="$(this).AJAXifyFormChecker(removeAllRolls); return false;">
	<input valign="middle" class="rollSubmit" type="submit" onClick="untickRolls()" name="rollsRemoveSubmit" value="Remove Rolls." />
</form>

</div>
</div>

<!-- Spacing -->
<br/><br/><br/><br/><br/><br/><br/>

</center>
</fieldset>

<br/>
<br/>

	<!-- Logging Area -->
<fieldset>
	<legend>Log Output</legend>

<div id="displayLog">
<?php

exec('pgrep dnsspoof', $running, $return);
if($return == 0) {
	exec("cat /pineapple/components/infusions/randomroll/assets/files/dnsspoof.log", $output);
	foreach($output as $line){
		echo $line."<br />";
	}
}
else {
	echo("DNSSpoof has not been started from RandomRoll");
}

?>
</div>

</fieldset>

