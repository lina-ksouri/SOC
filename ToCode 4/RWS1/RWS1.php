<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
	include('DB_Connection.php');
	$id = $_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM `users` WHERE id=$id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $username = $row['username'];
	$email = $row['email'];
	$password = $row['password'];
    $response_code = $row['response_code'];
	$response_desc = $row['response_desc'];
	
	response($id,$username, $email,$password,$response_code,$response_desc);
	mysqli_close($conn);
	}else{
		response(NULL,NULL,NULL,NULL,200,"No Record Found");
		}
}else{
	response(NULL,NULL,NULL,NULL,400,"Invalid Request");
	}

function response($id,$username,$email,$password,$response_code,$response_desc)
{
	$response['id'] = $id;
    $response['username'] = $username;
    $response['$email'] = $email;
	$response['$password'] = $password;
    $response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	$json_response = json_encode($response);
	echo $json_response;
}
?>