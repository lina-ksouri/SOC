<form method="POST">
<font color="blue"><i><h1>&nbsp;&nbsp; *** The Currency OF *** </h1></i></font>
<h4>Country : <input type="text" name="getCurrency"/>
</h4>
</form>
                     <!-- ******* WS1_Client ******* -->
<?php
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$wsdl = "http://localhost/ToCode3_2/WS1/WS1.php?wsdl";
		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>L\'erreur est :</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
                  
				    $result = $client->call('GetCountriesCode', array('country'=>$_POST['getCurrency']));
                   
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

?>

                         <!-- ******* WS2_Client ******* -->
<?php
require_once('lib/nusoap.php');
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur est :</h2>' . $err;
   exit();
}

$result=$client->call('CountryCurrency', array('sCountryISOCode'=>$result));
$r = ($result['CountryCurrencyResult']);

if($_POST['getCurrency']!=''){
  if( $r =='Country not found in the database' ){
    echo '<font color="red"><h4>Country not found in the database !!! Enter a correct country Name</h4></font></br>';
  }
}
echo ($result['CountryCurrencyResult'])."'>";
?>