<?php
require_once("UserRestHandler.php");

$view = "";

$content = file_get_contents("php://input");

$post_decoded = json_decode($content, true);

$type = $post_decoded['type'];

switch($type){

	case "user_register":
		$userid = $post_decoded['userid'];
		$username = $post_decoded['username'];
		$password = $post_decoded['password'];
		$firstname =  $post_decoded['firstname'];
		$surname =  $post_decoded['surname'];
		$gender =  $post_decoded['gender'];
		$dob =  $post_decoded['dob'];
		$mobile =  $post_decoded['mobile'];
		$phone =  $post_decoded['phone'];
		$email =  $post_decoded['email'];
		$device_token = $post_decoded['device_token'];
		$device = $post_decoded['device'];

		$user['userid']  = $userid;
		$user['username']  = $username;
		$user['password']  = $password;
		$user['firstname']  = $firstname;
		$user['surname']  = $surname;
		$user['gender']  = $gender;
		$user['dob']  = $dob;
		$user['mobile']  = $mobile;
		$user['phone']  = $phone;
		$user['payamount']  = $payamount;
		$user['email']  = $email;
		$user['device_token']  = $device_token;
		$user['device']  = $device;
		
		$UserRestHandler = new UserRestHandler();
		$UserRestHandler->userRegister($user);
		break;	

	case "user_list":
		$sort_by = $post_decoded['sort_by'];
		$sort_type = $post_decoded['sort_type'];
		$device_token = $post_decoded['device_token'];
		$device = $post_decoded['device'];

		$user['sort_by']  = $sort_by;
		$user['sort_type']  = $sort_type;
		$user['device_token']  = $device_token;
		$user['device']  = $device;

		$UserRestHandler = new UserRestHandler();
		$UserRestHandler->userList($user);
		break;

	case "user_detail":
		$userid = $post_decoded['userid'];
		$device_token = $post_decoded['device_token'];
		$device = $post_decoded['device'];

		$user['userid']  = $userid;
		$user['device_token']  = $device_token;
		$user['device']  = $device;

		$UserRestHandler = new UserRestHandler();
		$UserRestHandler->userDetail($user);
		break;	

	case "user_delete":
		$userid = $post_decoded['userid'];
		$device_token = $post_decoded['device_token'];
		$device = $post_decoded['device'];

		$user['userid']  = $userid;
		$user['device_token']  = $device_token;
		$user['device']  = $device;

		$UserRestHandler = new UserRestHandler();
		$UserRestHandler->userDelete($user);
		break;
			
	case "" :
		//404 - not found;
		break;
}
?>
