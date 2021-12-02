<?php 
require_once("lib/nusoap.php");

function GetCountriesCode($country) {
    $code = strtoupper($code);
    if ($country == 'Albania') return 'AL';
    if ($country == 'Algeria') return 'DZ';
    if ($country == 'Belgium') return 'BE';
    if ($country == 'Brazil') return 'BR';
    if ($country == 'Canada') return 'CA';
    if ($country == 'China') return 'CN';
    if ($country == 'Croatia') return 'HR';
    if ($country == 'Denmark') return 'DK';
    if ($country == 'Djibouti') return 'DJ';
    if ($country == 'Ecuador') return 'EC';
    if ($country == 'Egypt') return 'EG';
    if ($country == 'Finland') return 'FI';
    if ($country == 'France') return 'FR';
    if ($country == 'Germany') return 'DE';
    if ($country == 'Greece') return 'GR';
    if ($country == 'Hong Kong') return 'HK';
    if ($country == 'Hungary') return 'HU';
    if ($country == 'Iraq') return 'IQ';
    if ($country == 'Italy') return 'IT';
    if ($country == 'Japan') return 'JP';
    if ($country == 'Jordan') return 'JO';
    if ($country == 'Kenya') return 'KE';
    if ($country == 'Kuwait') return 'KW';
    if ($country == 'Lebanon') return 'LB';
    if ($country == 'Luxembourg') return 'LU';
    if ($country == 'Macao') return 'MO';
    if ($country == 'Mongolia') return 'MN';
    if ($country == 'Niger') return 'NE';
    if ($country == 'Nigeria') return 'NG';
    if ($country == 'Oman') return 'OM';
    if ($country == 'Palestinian') return 'PS';
    if ($country == 'Portugal') return 'PT';
    if ($country == 'Qatar') return 'QA';
    if ($country == 'Romania') return 'RO';
    if ($country == 'Rwanda') return 'RW';
    if ($country == 'Spain') return 'ES';
    if ($country == 'Syrian') return 'SY';
    if ($country == 'Tunisia') return 'TN';
    if ($country == 'Turkey') return 'TR';
    if ($country == 'Ukraine') return 'UA';
    if ($country == 'United States') return 'US';
    if ($country == 'Venezuela') return 'VE';
    if ($country == 'Vietnam') return 'VN';
    if ($country == 'Yemen') return 'YE';
    if ($country == 'Kosovo') return 'XK';
    if ($country == 'Zambia') return 'ZM';
    if ($country == 'Zimbabwe') return 'ZW';
    return 'Country Not Found :( ';
}    

//(second endpoint) function with complex XML (data type)

function GetDetailsStudent($username, $password){ 
    return array('cin'=>'14267961', 'Prenom'=>'Lina', 'Nom'=>'Ksouri', 'email'=>'ksourilinaa@gmail.com',
                 'result'=> 'succée'); }
    
    $server = new nusoap_server();
     $server->configureWSDL('web service with  complex data type', 'urn:localhost');
     $server->wsdl->schemaTargetNamespace = 'urn:localhost';
    
     //SOAP complex type return type (an array/struct)
    $server->wsdl->addComplexType(
        'Etudiant', //complex type name
        'complexType', // type simple/complex
        'struct','all', // All-sequence
        '',
        array(
            'cin' => array('name' => 'cin', 'type' => 'xsd:string'),
            'Prenom' => array('name' => 'Prenom', 'type' => 'xsd:string'),
            'Nom' => array('name' => 'Nom', 'type' => 'xsd:string'),
            'email' => array('name' => 'email', 'type' => 'xsd:string'),
            'result' => array('name' => 'result', 'type' => 'xsd:string')) //tableau des elements 
    );
    //this is the second webservice entry point/function 
    $server->register('GetDetailsStudent',
    array('username' => 'xsd:string', 'password'=>'xsd:string'),  //input
                array('return' => 'tns:Etudiant'),  //output
                'urn:localhost',   //namespace
                'urn:localhost#StudentDetailsServer',  //soapaction
    ); 
$server->register('GetCountriesCode',
			array('country' => 'xsd:string'),  //input
			array('return' => 'xsd:string'),  //output
			'urn:localhost',   //namespace
			'urn:localhost#CountryCodeServer'  //soapaction
		); 
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>