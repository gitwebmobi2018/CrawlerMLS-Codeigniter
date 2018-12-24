<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Crawler extends CI_Controller {


	function __construct() {
	parent::__construct();
  $this->load->library("PhpMailerLib");



    }
public function index(){
	include APPPATH."/simple_html_dom.php";
	$servername="localhost";
	$user = "root";
	$password = "";
	$inter_city="property";

	$connection= new mysqli($servername,$user,$password,$inter_city);

	if($connection->connect_error)
	{
		die("Connection Failed");
	}
	$html = new simple_html_dom();

	$delete_query = "DELETE FROM property";
	$select_result = mysqli_query( $connection, $delete_query );

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIESESSION, true);
	curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie-jar');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'test');
	curl_setopt($ch,CURLOPT_URL,"https://www.mls-allende.com/portal/");
	curl_setopt($ch, CURLOPT_VERBOSE, true);
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

	$i = 1;
	echo date('F Y h:i:s A').":   Crawling Started!<br>";
	echo "\n";
	echo date('F Y h:i:s A').":   ".$total_pages." found..<br>";
	echo "\n";

	for($i; $i<2; $i++){
	echo date('F Y h:i:s A').":   Crawling Page ".$i."<br>";
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




	  $added_date_string = str_replace("Uploaded on: ","",trim($prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(3)->innertext));
	  if($added_date_string == ''){
	    $added_date_string = str_replace("Uploaded on: ","",trim($prop->children(1)->children(1)->children(0)->children(0)->children(0)->children(4)->innertext));

	  }
	  if(date('l jS F Y') == $added_date_string){
	    $user_select_query = "SELCT * FROM login_detail";
	    $user_result = mysqli_query( $connection, $user_select_query );
	    if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	      echo $row["email"];
	    }
	}
	  };

	//  echo $prop->children(1)->children(0)->children(0)->children(0)->children(0)->getAttribute('src');
	  $url_to_image = $prop->children(1)->children(0)->children(0)->children(0)->children(0)->getAttribute('src');;
	$my_save_dir =  APPPATH.'/property/';
	$filename = basename($url_to_image);
	$complete_save_loc = $my_save_dir . $filename;
	if(file_exists (APPPATH.'/property'.$filename)){

	}else{
	file_put_contents($complete_save_loc, file_get_contents($url_to_image));
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





	  $p = $prop->children(1)->children(1)->find('div[class=property_detail]')[1]->find('div[class=row-fluid]');

	  $j = 0;
	  $query = "INSERT INTO property";
	  $query .= " (name, address, price, currency, price_with_currency, image, date, ";
	  for($j; $j<sizeof($p); $j++){
	    $keyword = "";


	    if(strpos(strtolower($p[$j]->children(0)->plaintext), "lot") == true){
	      $keyword = "lot";

	    }else if(strpos(strtolower($p[$j]->children(0)->plaintext), "construction") == true){
	      $keyword = "construction";

	    }else{
	      $keyword = strtolower($p[$j]->children(0)->plaintext);
	    }
	    //echo $p[$i]->children(0)->innertext;
	    if($j == 1){
	      $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("m�", " ", str_replace(":", "", $keyword))))).", ";

	    }else if($j== sizeof($p)-1){
	    $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("m�", " ", str_replace(":", "", $keyword))))).")";



	    }else{
	     $query .= str_replace(" ", "_", trim(preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', str_replace("m�", " ", str_replace(":", "", $keyword))))).", ";


	    }
	  }
	  $query .= " VALUES (";
	  $query .= "'".$h."', '".$address."', "."'".$price."', "."'".$currency."', "."'".$price_withcountry."', '".$filename."', '".$added_date_string."', ";
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
	//echo $query."<br>";
	 $result = mysqli_query( $connection, $query );
	 //echo mysqli_num_rows( $result ) ;

	  //Property Status
	  /*echo str_replace(": ", "", $p[0]->children(1)->innertext);
	  //Property Type
	  echo $p[1]->children(1)->children(0)->innertext;
	  //Region
	  echo $p[2]->children(1)->innertext;
	  //Showing Term
	  echo $p[3]->children(1)->innertext;
	  //Bedrooms
	  echo $p[4]->children(1)->innertext;
	  //Bathrooms
	  echo $p[5]->children(1)->innertext;
	  //floor
	  echo $p[6]->children(1)->innertext;
	  //Lot m2
	  echo $p[7]->children(1)->innertext;
	  //Construction
	  //echo $p[8]->children(1)->innertext;
	  //days on Market
	  //echo $p[9]->children(1)->innertext;
	  */

	  //echo $prop->children(1)->children(1)->children(4)->children(1)->children(1);
	  //echo $prop->children(1)->children(1)->children(4)->children(1)->children(2);
	//  echo (explode("<span", $prop->children(1)->children(1)->children(4)->children(0)->children(0)->children(0)->innertext)[0]);
	  //echo $prop->children(1)->children(1)->children(4)->children(1)->children(0)->children(1)->innertext;
	  //echo $prop->children(1)->children(1)->children(4)->children(1)->children(2)->children(1)->children(0)->innertext;
	//  echo $prop->children(1)->children(1)->children(4)->children(1)->children(2)->children(1)->innertext;
	//  echo $prop->children(1)->children(1)->children(4)->children(1)->children(4)->children(1)->innertext;
	//  echo $prop->children(1)->children(1)->children(4)->children(1)->children(6)->children(0)->innertext;
	//  echo $prop->children(1)->children(1)->children(4)->children(1)->children(8)->children(1)->innertext;
	//  echo $prop->children(1)->children(1)->children(4)->children(1)->children(10)->children(1)->innertext;
	//echo $prop->children(1)->children(1);;


	sleep(10);


	}

	}






}
}
?>
