<?php
require_once("SimpleRest.php");
require_once("User.php");
		
class UserRestHandler extends SimpleRest {

	function userRegister($uservalues) {	

		$user = new User();
		$rawData = $user->userRegister($uservalues);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No data found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function userList($uservalues) {	

		$user = new User();
		$rawData = $user->userList($uservalues);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No data found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function userDetail($uservalues) {	

		$user = new User();
		$rawData = $user->userDetail($uservalues);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No data found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function userDelete($uservalues) {	

		$user = new User();
		$rawData = $user->userDelete($uservalues);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No data found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}

}
?>