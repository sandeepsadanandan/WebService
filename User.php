<?php
require_once("dbcontroller.php");

Class User{

	public function userRegister($userValues){

		$associationid = $AppValues['associationid'];
		$apartmentid = $AppValues['apartmentid'];
		$previousdate = $AppValues['previousdate'];
		$previousreading = $AppValues['previousreading'];
		$currentdate = $AppValues['currentdate'];
		$currentreading = $AppValues['currentreading'];
		$unitconsumption = $AppValues['unitconsumption'];
		$unitprice = $AppValues['unitprice'];
		$payamount = $AppValues['payamount'];
		$paystatus = $AppValues['paystatus'];
		$minchrg = $AppValues['minchrg'];
		$actualamt = $AppValues['actualamt'];
		$device_token = $AppValues['device_token'];
		$device = $AppValues['device'];

		$userid = $userValues['userid'];
		$username = $userValues['username'];
		$password = md5($userValues['password']);
		$firstname = $userValues['firstname'];
		$surname = $userValues['surname'];
		$gender = $userValues['gender'];
		$dob = $userValues['dob'];
		$mobile = $userValues['mobile'];
		$phone = $userValues['phone'];
		$email = $userValues['email'] ;
		$status = 1;
		$device_token = $userValues['device_token'];
		$device = $userValues['device'];


		$regdate = date('Y-m-d h:i:s');

		try {

			$dbconn = new DBController();
			$conn = $dbconn->connectDB();

			if($userid==''){
				$sql = "INSERT INTO users(username, password, firstname, surname, gender, dob, mobile, phone, email, regdate, status) VALUES(".$username.", ".$password.", '".$firstname."', ".$surname.", ".$gender.", '".$dob."', '".$mobile."', '".$phone."', '".$email."' , '".$regdate."', ".$status.")";
			}else{
				$sql = "UPDATE users SET username='".$username."',password='".$password."',firstname='".$firstname."',surname='".$surname."',gender=".$gender.",dob='".$dob."',mobile='".$mobile."',phone='".$phone."',email='".$email."' WHERE userid=".$userid;	
			}
			$result = $conn->query($sql);
			$last_id = $conn->insert_id

			if ($result) {
				$user_result = "Success";
			} else {
			    $user_result = "Failed";
			}

			$conn->close();

		}	
		catch (SoapFault $exception) {
    		printFault($exception, $client);        
 		}
 		
 		return $user_result;
	}

	public function userList($userValues){
		$sort_by = $userValues['sort_by'];
		$sort_type = $userValues['sort_type'];
		$device_token = $userValues['device_token'];
		$device = $userValues['device'];

		try {

			$dbconn = new DBController();
			$conn = $dbconn->connectDB();

			$sql = "SELECT userid, username, password, firstname, surname, gender, dob, mobile, phone, email, regdate
				FROM users WHERE status=1 ORDER BY ".$sort_by." ".$sort_type;

			$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				$i=0;
			    while($row = $result->fetch_assoc()) {
			    	$user_result[$i]['userid']= $row["userid"];
			    	$user_result[$i]['username']= $row["username"];
			    	$user_result[$i]['password']= $row["password"];
			    	$user_result[$i]['firstname']= $row["firstname"];
			    	$user_result[$i]['surname']= $row["surname"];
			    	$user_result[$i]['gender']= $row["gender"];
			    	$user_result[$i]['dob']= $row["dob"];
			    	$user_result[$i]['mobile']= $row["mobile"];
			    	$user_result[$i]['phone']= $row["phone"];
			    	$user_result[$i]['email']= $row["email"];
			    	$user_result[$i]['regdate']= $row["regdate"];
			        $i++;
			    }
			} else {
			    return "nil";
			}

			$conn->close();

		}	
		catch (SoapFault $exception) {
    		printFault($exception, $client);        
 		}
 		
 		return $user_result;
	}

	public function userDetail($userValues){
		$userid = $userValues['userid'];
		$device_token = $userValues['device_token'];
		$device = $userValues['device'];

		try {

			$dbconn = new DBController();
			$conn = $dbconn->connectDB();

			$sql = "SELECT username, password, firstname, surname, gender, dob, mobile, phone, email, regdate
				FROM users WHERE userid=".$userid." AND status=1";

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		    	$row = $result->fetch_assoc();
		    	$user_result['username']= $row["username"];
		    	$user_result['firstname']= $row["firstname"];
		    	$user_result['surname']= $row["surname"];
		    	$user_result['gender']= $row["gender"];
		    	$user_result['dob']= $row["dob"];
		    	$user_result['mobile']= $row["mobile"];
		    	$user_result['phone']= $row["phone"];
		    	$user_result['email']= $row["email"];
		    	$user_result['regdate']= $row["regdate"];
			} else {
			    return "No Results Found!";
			}

			$conn->close();

		}	
		catch (SoapFault $exception) {
    		printFault($exception, $client);        
 		}
 		
 		return $user_result;
	}


	public function userDelete($userValues){

		$userid = $userValues['userid'];
		$device_token = $userValues['device_token'];
		$device = $userValues['device'];

		try {

			$dbconn = new DBController();
			$conn = $dbconn->connectDB();

			$sql_user = "DELETE FROM users WHERE userid=".$userid;

			$result_user = $conn->query($sql_user);

			if ($result_user) {
				$user_result = "Success";
			} else {
			    $user_result = "Failed";
			}

			$conn->close();

		}	
		catch (SoapFault $exception) {
    		printFault($exception, $client);        
 		}
 		
 		return $user_result;
	}

}

?>