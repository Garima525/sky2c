<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sky2c API</title>
</head>

<body>
<h2>Get Quote API</h2>
<?php
$url = 'https://rqservice.kuebix.com:8443/webservices/v1/rate/';

$postdata = '{ "version": "V1.0", "shipmentType": "LTL", "paymentType": "Inbound Collect", "pickupDate": "2017-10-10",
	"shipFromAddress":
		{ "companyName": "Kuebix", "street": "7 Main and Mill", "city": "Maynard", "state": "MA", "postal": "01754",
			"country": 
				{ "name": "United States" }
		},
	"shipToAddress":
		{ "companyName": "HollyWood Studios", "street": "1 main street", "city": "Randleman", "state": "NC", "postal": "27317",
			"country":
				{ "name": "United States" }
		},
	"handlingUnits": 1,
	"lineItems":
		[ { "freightClass": "50", "grossWeight": 600, "weightUnit": "lb", "packagingType": "Bag(s)", 
			"hazmatInfo": 
				{ "hazmatType": "1", "unNumber": "13", "limitedQuantity": true, "packagingGroup": "Type1", "emergencyResponseNumber": "Un1231" }
		} ],
	"dimensions":
		[ { "length": 40, "width": 40, "height": 40, "weight": 600, "weightUOM": "lb", "uom": "in", "stackable": false } ],
	"accessorials":
		{ "Pickup": 
			[ "Liftgate", "Inside Services" ],
		  "Delivery":
		  	[ "Inside Services" ],
		  "Other":
		  	[ "Single Shipment" ]
		}
}';

echo "<pre>"; print_r($postdata); echo "</pre>";
echo "<hr/>";

$username = "s2c@kbxapi.com";
$password = "17s2c09pRd25";
$apiKey = "001o00000113J12";

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, true);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, "$apiKey");
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

if(curl_error($ch))
{
    echo 'error:' . curl_error($ch);
}
$response = curl_exec( $ch );

$info = curl_getinfo($ch);

echo "check response: ".$response;
echo "<hr/>";

echo "info: <pre>"; print_r($info); echo "</pre>";
echo "<hr/>";

echo "first response: ".$response; echo "<br/>";
echo "<hr/>";
$result = json_decode($response, true);

echo "Second<pre>"; print_r($result); echo $response; echo "</pre>";
echo "<br/>"; echo "<hr/>";
print_r($response);

?>
</body>
</html>
