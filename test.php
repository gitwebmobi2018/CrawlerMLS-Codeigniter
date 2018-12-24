<?php 

echo $_SERVER['DOCUMENT_ROOT'];
$dstfile= $_SERVER['DOCUMENT_ROOT'] . "/crawlere_log.txt";
echo $dstfile; 
      mkdir(dirname($dstfile), 0777, true);
?>
