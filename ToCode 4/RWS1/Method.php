<?php
  $url = 'http://localhost/tocode4/RWS1/user.php';
  $id = $_POST["id"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
	$data = array('id' => $id,'username' => $username, 'email' => $email, 'password' => $password);

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ }

	var_dump($result);
?>