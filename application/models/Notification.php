<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// $this->load->library('email');
class Notification extends CI_Model{
    function __construct(){
          // Call the Model constructor
        parent::__construct();
        $this->load->library("PhpMailerLib");

    }
    function notify(){
      $dstfile= $_SERVER['DOCUMENT_ROOT'] . "/email_log.txt";

      echo $dstfile;
 //mkdir(dirname($dstfile), 0777, true);
      $email_log = fopen($dstfile, "a") or die("Unable to open file!");


      $new_prop = "";
      $this->db->select('*');
       $this->db->from('property');
       $this->db->where('days_on_market', '0 days');
       $this->db->where('latest', 1);

       $query = $this->db->get();
       $i = 1;
       if( $query->num_rows()>0 ){
         fwrite($email_log, date('D F Y h:i:s A').": NEW PROPERTY!!\r\n");

         foreach ($query->result() as $property){
           $new_prop .= $property->name ." : ".$property->price_with_currency."<br>";
           fwrite($email_log, "\t".$i. ". ".$property->name.":".$property->price_with_currency."\r\n");
           $i++;

         }




               $this->db->select('*');
                $this->db->from('login_detail');
                $query = $this->db->get();
                if( $query->num_rows()>0 ){

                  foreach ($query->result() as $login){
                    echo $login->email;
                    $mail = $this->phpmailerlib->load();
             try {
                   //Server settings
                   $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                   $mail->isSMTP();                                      // Set mailer to use SMTP
                   $mail->Host = 'mail.smtp2go.com';  // Specify main and backup SMTP servers
                   $mail->SMTPAuth = true;                               // Enable SMTP authentication
                   $mail->Username = '77rits4@gmail.com';                 // SMTP username
                   $mail->Password = 'cnRihNf7WgL8';                           // SMTP password
                   $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
                   $mail->Port = 2525;                                    // TCP port to connect to
                   //Recipients
                   $mail->setFrom('donotreply@xyz.com', 'Admin from 1st International Realty');
                   $mail->addAddress($login->email, '');     // Add a recipient

                   $mail->isHTML(true);                                  // Set email format to HTML
                   $mail->Subject = 'New Property';
                   $mail->Body    = "<h3>New Property Available.</h3><br>".$new_prop."<br>For more detail visit ".base_url();
                   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                   $mail->send();

                  // echo 'Message has been sent';
               } catch (Exception $e) {
                   //echo  'Message could not be sent.';
                   //echo 'Mailer Error: ' . $mail->ErrorInfo;
               }

                  }
       }

fwrite($email_log, date('D F Y h:i:s A').": Email successfully send to all users\r\n");
       $this->db->set('latest', 0);
       $this->db->where("latest", 1);
       $this->db->update('property');
     }else{
fwrite($email_log, date('D F Y h:i:s A').": No NEW PROPERTY!!\r\n");
     }
fclose($email_log);
    }

function notifyAdmin (){
	
  $user_id = $_SESSION['id'];
  $user_email = $_SESSION['email'];
  $this->db->select('*');
   $this->db->from('login_detail');
   $this->db->where('id', $user_id);
  $query = $this->db->get();
  if( $query->num_rows()>0 ){

  foreach ($query->result() as $login){
    $proerties = explode(" ", $login->cart);
	$arrlength = count($proerties);
	
	
	
  }
}
	//$myJSON = json_encode($data);
                    $mail = $this->phpmailerlib->load();
             try {
                   //Server settings
                   $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                   $mail->isSMTP();                                      // Set mailer to use SMTP
                   $mail->Host = 'mail.smtp2go.com';  // Specify main and backup SMTP servers
                   $mail->SMTPAuth = true;                               // Enable SMTP authentication
                   $mail->Username = '77rits4@gmail.com';                 // SMTP username
                   $mail->Password = 'cnRihNf7WgL8';                           // SMTP password
                   $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
                   $mail->Port = 2525;                                    // TCP port to connect to
                   //Recipients
                   $mail->setFrom('donotreply@xyz.com', 'Admin from 1st International Realty');
                   $mail->addAddress('mlssma@earthlink.net', '');     // Add a recipient

                   $mail->isHTML(true);                                  // Set email format to HTML
                   $mail->Subject = 'Favorite Added';
                   $mail->Body    = "<h3>Added to Favorite.</h3><br>";
				   $mail->Body    .= "User Email Address:"."<h4>".$user_email."</h4><br>";
				   $mail->Body    .= "<h5>Properties:</h5>";
				   for($x = 1; $x < $arrlength; $x++) 
					{
						$this->db->select('*');
						$this->db->from('property');
						$this->db->where('id', $proerties[$x]);

       $query = $this->db->get();
       if( $query->num_rows()>0 ){

         foreach ($query->result() as $property){
			 $mail->Body .=' Property Name ('.$property->name.')'.'<br>';

         }
	   }
						
					}
                   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                   $mail->send();

                  // echo 'Message has been sent';
               } catch (Exception $e) {
                   //echo  'Message could not be sent.';
                   //echo 'Mailer Error: ' . $mail->ErrorInfo;
               }


}

function sendMessage ($message, $subject){
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$user_email = $_SESSION['email'];
	$mail = $this->phpmailerlib->load();
	try {
		//Server settings
		$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.smtp2go.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = '77rits4@gmail.com';                 // SMTP username
		$mail->Password = 'cnRihNf7WgL8';                           // SMTP password
		$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 2525;                                    // TCP port to connect to
		//Recipients
		$mail->setFrom('donotreply@xyz.com', 'Admin from 1st International Realty');
		$mail->addAddress('mlssma@earthlink.net', '');     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = "User Email Address:"."<h4>".$user_email."</h4><br>";
		$mail->Body    .= "<h4>First Name:</h4>"." ".$first_name;
		$mail->Body    .= "<h4>Last Name:</h4>"." ".$last_name."<br>";
		$mail->Body    .= "<h4>Message:</h4>"." ".$message;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
		// echo 'Message has been sent';
		} catch (Exception $e) {
			//echo  'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
	}

}
