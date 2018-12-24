<?php
include "simple_html_dom.php";
include('db.php');
$html = new simple_html_dom();



$ch = curl_init();

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie-jar');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'test');
curl_setopt($ch,CURLOPT_URL,"https://www.mls-allende.com/portal/");
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
$result=curl_exec($ch);


$html->load($result);

$inputfields = $html->find("input");
$security_token = $inputfields[7]->getAttribute('name');
$post_fields = array(
  "username"=> "nancynashban",
  "password"=> "DameEdna7",
  "return"=> "MTUy",
  $security_token=> "1"
);


curl_setopt($ch,CURLOPT_URL,"https://www.mls-allende.com/portal/?task=user.login");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post_fields));
$result=curl_exec($ch);


curl_setopt($ch,CURLOPT_URL,"https://www.mls-allende.com/portal/properties/recently-added");
$result=curl_exec($ch);

$html->load($result);
$links = $html->find('a[class=pagenav]');
$total_pages = (int)str_replace("/portal/properties/recently-added/page-", "", $links[sizeof($links)-1]->getAttribute('href'));

$dstfile= $_SERVER['DOCUMENT_ROOT'] . "/var/www/html/crawler_log.txt";
echo $dstfile; 
      //mkdir(dirname($dstfile), 0777, true);

$logfile = fopen($dstfile, "a") or die("Unable to open file!");


$i = 1;
echo date('D F Y h:i:s A').":   Crawling Started!<br>";
fwrite($logfile, date('F Y h:i:s A').":   Crawling Started!\r\n");
echo "\n";
echo date('F Y h:i:s A').":   ".$total_pages." found..<br>";
//fwrite($logfile, date('F Y h:i:s A').":   ".$total_pages." property found..\r\n");
echo "\n";
$flag = 0;
for($i; $i<6; $i++){
echo date('F Y h:i:s A').":   Crawling Page ".$i."<br>";
//fwrite($logfile, date('F Y h:i:s A').":   Crawling Page ".$i."\r\n");
echo "\n";
    $property_divs = null;
  if($i == 1){
    $property_divs = $html->find('li[class=featured]');
  }else{
  curl_setopt($ch,CURLOPT_URL,"https://www.mls-allende.com/portal/properties/recently-added/page-".$i);
  $result=curl_exec($ch);
  $html->load($result);
  $property_divs = $html->find('li[class=featured]');

}
foreach($property_divs as $prop){
  $heading = $prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(0)->innertext;

    $h = trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $heading ));

    $p = $prop->children(1)->children(1)->find('div[class=property_detail]')[1]->find('div[class=row-fluid]');
    if(str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[sizeof($p)-1]->children(1)->plaintext))))) != "0 days" && $flag == 0 ){
      fwrite($logfile, date('D F Y h:i:s A').":   No New Property.\r\n");

$flag = 2;
      break;

    }else if(str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[sizeof($p)-1]->children(1)->plaintext))))) == "0 days" && $flag == 0){
      $select_query = "SELECT * FROM property WHERE name = '$h'";
      echo $select_result1;
        $select_result1 = mysqli_query( $connection, $select_query );

        if (mysqli_num_rows($select_result1) == 0) {
		fwrite($logfile, date('D F Y h:i:s A').":   New Property.\r\n");

          $delete_query = "DELETE FROM property";
          $select_result = mysqli_query( $connection, $delete_query );
          $flag = 1;
        }else{
fwrite($logfile, date('D F Y h:i:s A').":   No New Property.\r\n");

          $flag = 2;
          break;
        }


      echo str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[sizeof($p)-1]->children(1)->plaintext)))));
    }

  $added_date_string = str_replace("Uploaded on: ","",trim($prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(3)->innertext));
  if($added_date_string == ''){
    $added_date_string = str_replace("Uploaded on: ","",trim($prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(4)->innertext));

  }

  $url_to_image = $prop->children(1)->children(0)->children(0)->children(0)->children(0)->getAttribute('src');;
$my_save_dir = 'assets/';
$filename = basename($url_to_image);
$complete_save_loc = $my_save_dir . $filename;
if(file_exists ("assets/".$filename)){
}else{
copy($url_to_image, $complete_save_loc);
$dstfile=$_SERVER['DOCUMENT_ROOT'] . "/var/www/html/".$complete_save_loc;
mkdir(dirname($dstfile), 0777, true);
copy($url_to_image, $dstfile);

}
  $heading = $prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(0)->innertext;
  $address = $prop->children(1)->children(1)->children(1)->innertext;
  $price_withcountry = str_replace("&#36;", "$", explode("Convert", trim(explode("<span", $prop->children(1)->children(1)->children(4)->children(0)->children(0)->children(0)->plaintext)[0], "\t\n\r"))[0]);
  $price = str_replace("MXN $ ", "", $price_withcountry);
  $price = str_replace("USD $ ", "", $price);
  $price = str_replace(",", "", $price);
  $currency = "";
  if(strpos($price_withcountry, 'MXN') !== false){
    $currency = "MXN";
  }else{
    $currency = "USD";
  }

  $j = 0;
  $query = "INSERT INTO property";
    if(str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[sizeof($p)-1]->children(1)->plaintext))))) == "0 days" ){
      $query .= " (name, address, price, currency, price_with_currency, image, added_date, latest,  ";
    }else{
  $query .= " (name, address, price, currency, price_with_currency, image, added_date, ";
  }
  for($j; $j<sizeof($p); $j++){
    $keyword = "";


    if(strpos(strtolower($p[$j]->children(0)->plaintext), "lot") == true){
      $keyword = "lot";

    }else if(strpos(strtolower($p[$j]->children(0)->plaintext), "construction") == true){
      $keyword = "construction";

    }else{
      $keyword = strtolower($p[$j]->children(0)->plaintext);
    }
    if($j == 1){
      $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("mÃƒÆ’Ã‚Â¯Ãƒâ€šÃ‚Â¿Ãƒâ€šÃ‚Â½", " ", str_replace(":", "", $keyword))))).", ";

    }else if($j== sizeof($p)-1){
    $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("mÃƒÆ’Ã‚Â¯Ãƒâ€šÃ‚Â¿Ãƒâ€šÃ‚Â½", " ", str_replace(":", "", $keyword))))).")";
    }else{
     $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("mÃƒÆ’Ã‚Â¯Ãƒâ€šÃ‚Â¿Ãƒâ€šÃ‚Â½", " ", str_replace(":", "", $keyword))))).", ";
    }
  }
  $query .= " VALUES (";
    if(str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[sizeof($p)-1]->children(1)->plaintext))))) == "0 days" ){
  $query .= "'".$h."', '".$address."', ".trim($price).", "."'".$currency."', "."'".$price_withcountry."', '".$filename."', '".$added_date_string."', 1, ";
}else{
    $query .= "'".$h."', '".$address."', ".trim($price).", "."'".$currency."', "."'".$price_withcountry."', '".$filename."', '".$added_date_string."', ";
}
  $k = 0;
  for($k; $k<sizeof($p); $k++){
    if($k == 1){
      $query .= "'".str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[$k]->children(1)->children(0)->plaintext)))))."', ";
    }else if($k == sizeof($p)-1){
  $query .=  "'".str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[$k]->children(1)->plaintext)))))."')";
    }else{

    $query .= "'".str_replace("&nbsp;", "", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace(":", "", strtolower($p[$k]->children(1)->plaintext)))))."', ";

    }
  }
echo $query."<br>";
 $result = mysqli_query( $connection, $query );


}
if($flag == 2){
  break;
}
sleep(rand(10,15));
}


fwrite("Finished Crawling.\r\n");
fclose($logfile);

 ?>
