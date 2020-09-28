<?php

require_once '../lib/PayU.php';

Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.9/");

$reference = "payment_test_00000001";
$value = "100";

$parameters = array(
	//Ingrese aquí el identificador de la cuenta.
	PayUParameters::ACCOUNT_ID => "512323",
	//Ingrese aquí el código de referencia.
	PayUParameters::REFERENCE_CODE => $reference,
	//Ingrese aquí la descripción.
	PayUParameters::DESCRIPTION => "payment test",

	// -- Valores --
	//Ingrese aquí el valor.
	PayUParameters::VALUE => $value,
	//Ingrese aquí la moneda.
	PayUParameters::CURRENCY => "PEN",

	// -- Comprador
	//Ingrese aquí el nombre del comprador.
	PayUParameters::BUYER_NAME => "First name and second buyer  name",
	//Ingrese aquí el email del comprador.
	PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
	//Ingrese aquí el teléfono de contacto del comprador.
	PayUParameters::BUYER_CONTACT_PHONE => "7563126",
	//Ingrese aquí el documento de contacto del comprador.
	PayUParameters::BUYER_DNI => "5415668464654",
	//Ingrese aquí la dirección del comprador.
	PayUParameters::BUYER_STREET => "Avenida de la poesia",
	PayUParameters::BUYER_STREET_2 => "160",
	PayUParameters::BUYER_CITY => "Cuzco",
	PayUParameters::BUYER_STATE => "CU",
	PayUParameters::BUYER_COUNTRY => "PE",
	PayUParameters::BUYER_POSTAL_CODE => "000000",
	PayUParameters::BUYER_PHONE => "7563126",

	// -- pagador --
	//Ingrese aquí el nombre del pagador.
	PayUParameters::PAYER_NAME => "First name and second payer name",
	//Ingrese aquí el email del pagador.
	PayUParameters::PAYER_EMAIL => "payer_test@test.com",
	//Ingrese aquí el teléfono de contacto del pagador.
	PayUParameters::PAYER_CONTACT_PHONE => "7563126",
	//Ingrese aquí el documento de contacto del pagador.
	PayUParameters::PAYER_DNI => "5415668464654",
	//OPCIONAL fecha de nacimiento del pagador YYYY-MM-DD, importante para autorización de pagos en México.
	PayUParameters::PAYER_BIRTHDATE => '1980-06-22',

	//Ingrese aquí la dirección del pagador.
	PayUParameters::PAYER_STREET => "av abancay",
	PayUParameters::PAYER_STREET_2 => "cra 4",
	PayUParameters::PAYER_CITY => "Iquitos",
	PayUParameters::PAYER_STATE => "LO",
	PayUParameters::PAYER_COUNTRY => "PE",
	PayUParameters::PAYER_POSTAL_CODE => "00000",
	PayUParameters::PAYER_PHONE => "7563126",

	// -- Datos de la tarjeta de crédito --
	//Ingrese aquí el número de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_NUMBER => "4907840000000005",
	//Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2014/12",
	//Ingrese aquí el código de seguridad de la tarjeta de crédito
	PayUParameters::CREDIT_CARD_SECURITY_CODE=> "321",
	//Ingrese aquí el nombre de la tarjeta de crédito
	//VISA||MASTERCARD
	PayUParameters::PAYMENT_METHOD => "VISA",

	//Ingrese aquí el número de cuotas.
	PayUParameters::INSTALLMENTS_NUMBER => "1",
	//Ingrese aquí el nombre del pais.
	PayUParameters::COUNTRY => PayUCountries::PE,

	//Session id del device.
	PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
	//IP del pagadador
	PayUParameters::IP_ADDRESS => "127.0.0.1",
	//Cookie de la sesión actual.
	PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
	//Cookie de la sesión actual.
	PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
);

$response = PayUPayments::doAuthorizationAndCapture($parameters);

if($response) {
	$response->transactionResponse->orderId;
	$response->transactionResponse->transactionId;
	$response->transactionResponse->state;
	if($response->transactionResponse->state=="PENDING") {
		$response->transactionResponse->pendingReason;
	}
	$response->transactionResponse->paymentNetworkResponseCode;
	$response->transactionResponse->paymentNetworkResponseErrorMessage;
	$response->transactionResponse->trazabilityCode;
	$response->transactionResponse->authorizationCode;
	$response->transactionResponse->responseCode;
	$response->transactionResponse->responseMessage;
}

?>