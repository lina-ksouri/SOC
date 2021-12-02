<?php
require_once('lib/nusoap.php');
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";


$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}
try {
   // Call the SOAP method
  $result = $client->call('CountryCurrency', array('sCountryISOCode' => 'TN'));
  // Display the result
  echo "<h2>Result<h2/>";
  print_r($result);
 }
 catch (Exception $e) {
   echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	