<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// $this->load->library('email');
class Login_model extends CI_Model{
    function __construct(){
          // Call the Model constructor
        parent::__construct();
        $this->load->library("PhpMailerLib");


    }


    function update_login(){





      $email  = $this->input->post('email');
      $password  = md5($this->input->post('password'));
      $this->db->select('*');
       $this->db->from('login_detail');
       $this->db->where('email', $email);
       $this->db->where('password', $password);
       $query = $this->db->get();
       if( $query->num_rows()>0 ){

         foreach ($query->result() as $login){
           $_SESSION["email"] = $login->email;
           $_SESSION["role"] = $login->role;
           $_SESSION["id"] = $login->id;
           $_SESSION["cart"] = $login->cart;

             if($login->role==1){
               return "Admin";


             }else{

                 return "User";
             }




}
}else{
  return 'error';
}

}
function register(){



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
		    $mail->setFrom('evbes@emobility.ae', 'Admin from Property');
		    $mail->addAddress($this->input->post('email'), '');     // Add a recipient

		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Username and Password';
		    $mail->Body    = "<h3>You login details to property website.</h3><br>Email: ".$this->input->post('email')."<br>Password: ".$this->input->post('password')."<br><br>Use this link to login: ".base_url();
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		   // echo 'Message has been sent';
		} catch (Exception $e) {
		    //echo  'Message could not be sent.';
		    //echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

$first_name =  $this->input->post('first_name');
$last_name = $this->input->post('last_name');
$email = $this->input->post('email');
$password = md5($this->input->post('password'));
      $data = array(
             'first_name' => $first_name,
             'last_name' => $last_name,
             'email' => $email,
             'password' => $password,
             'role' => 0
          );

$this->db->insert('login_detail', $data);


}
function change(){
  $email = $this->input->post('email');
  $password = md5($this->input->post('password'));
  if($email != "" && $this->input->post('password') != "" ){

    $data = array(
      "password" => $password
    );
    $this->db->set('password', $password);
    $this->db->set('email', $email);
    $this->db->where('id', $_SESSION['id']);
    $this->db->update('login_detail');
return "Password And Email Changed Successfully.";


}else{
  return "Please enter your details to change password.";
}
}


}
