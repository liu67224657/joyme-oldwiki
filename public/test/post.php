<?php
 echo "  php2 ".time()."<br>";


//var_dump($_POST);
//var_dump($_SERVER);
//var_dump('JPARAM',$_SERVER['HTTP_JPARAM']);
$vars = explode(';',$_SERVER['HTTP_JPARAM']);
//var_dump('vars',$vars);
foreach ($vars as $val){
 echo $val ."<br>";
}

?>

