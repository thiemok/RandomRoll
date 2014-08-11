<?php 

// Start and Stop RandomRoll

if(isset($_POST['startRandomRollSubmit'])){
  exec('killall dnsspoof');
  exec('mv /www/index.php /www/index.php.orig');
  exec('mv /www/redirect.php /www/redirect.php.orig');
  exec('mv /www/error.php /www/error.php.orig');
  exec('ln -s /pineapple/components/infusions/randomroll/assets/files/index.php /www/index.php');
  exec("ln -s /pineapple/components/infusions/randomroll/assets/rolls/ /www/");
  exec('echo "dnsspoof -i br-lan -f /pineapple/components/infusions/randomroll/assets/files/spoofhost > /dev/null 2>/pineapple/components/infusions/randomroll/assets/files/dnsspoof.log" | at now');
  exec('echo "1" > /pineapple/components/infusions/randomroll/running');
}

if(isset($_POST['stopRandomRollSubmit'])){
  exec('killall dnsspoof');
  exec('rm -rf /pineapple/components/infusions/randomroll/assets/files/dnsspoof.log');
  exec('rm -rf /www/rolls/');
  exec('mv /www/index.php.orig /www/index.php');
  exec('mv /www/error.php.orig /www/error.php');
  exec('mv /www/redirect.php.orig /www/redirect.php');
  exec('rm -rf /www/rickroll.php');
  exec('rm -rf /www/rcmroll.php');
  exec('rm -rf /www/nyanroll.php');
  exec('rm -rf /www/pbjtroll.php');
  exec('rm -rf /www/trollroll.php');
  exec('rm -rf /www/bsodroll.php');
  exec('rm -rf /www/afroroll.php');
  exec('rm -rf /www/nedryroll.php');
  exec('echo "0" > /pineapple/components/infusions/randomroll/running');
}




//// Selection of Rolls.

// Remove rolls.
if(isset($_POST['rollsRemoveSubmit'])){
  exec('rm -rf /www/rickroll.php');
  exec('rm -rf /www/rcmroll.php');
  exec('rm -rf /www/nyanroll.php');
  exec('rm -rf /www/pbjtroll.php');
  exec('rm -rf /www/trollroll.php');
  exec('rm -rf /www/bsodroll.php');
  exec('rm -rf /www/afroroll.php');
  exec('rm -rf /www/nedryroll.php');
}

// Submit

if(isset($_POST['rollsCheckBoxSubmit'])){
  // cool guys dont look at explosions... 
  $rolls = explode(',', $_POST['checkbox']);
  foreach($rolls as $roll){
    switch ($roll) {
      case 'rickroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/RickRoll/rickroll.php /www/rickroll.php');
      break;
      case 'rcmroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/RCMRoll/rcmroll.php /www/rcmroll.php');
      break;
      case 'nyanroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/NyanRoll/nyanroll.php /www/nyanroll.php');
      break;
      case 'pbjtroll':
        exec("ln -s /pineapple/components/infusions/randomroll/assets/rolls/PBJTRoll/pbjtroll.php /www/pbjtroll.php");
      break;
      case 'trollroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/TrollRoll/trollroll.php /www/trollroll.php');
      break;
      case 'bsodroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/BSODRoll/bsodroll.php /www/bsodroll.php');
      break;
      case 'afroroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/AfroRoll/afroroll.php /www/afroroll.php');
      break;
      case 'nedryroll':
        exec('ln -s /pineapple/components/infusions/randomroll/assets/rolls/NedryRoll/nedryroll.php /www/nedryroll.php');
      break;

    }
  }
echo 'You Selected :<br/>';
print_r($_POST['checkbox']);
}

?>