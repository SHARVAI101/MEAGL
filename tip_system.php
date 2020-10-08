<?php

session_start();
require_once('bootstrap.php');
// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create

$payeeEmail=$_POST['tipReceiverEmail'];

$tipperId=$_POST['tipperId'];
$tipReceiverId=$_POST['tipReceiverId'];
$tipReceiverEmail=$_POST['tipReceiverEmail'];

$payer_location=$_POST['payer_location'];
$payeePaypalAccountCountry=$_POST['payeePaypalAccountCountry'];

$creatorName=$_POST['creator-name'];
$imageForTipId=$_POST['imageForTipId'];

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amt=$_POST['amount'];
//$cur=$_POST['currency'];
$amount = new \PayPal\Api\Amount();
$amount->setTotal($amt);

if($payer_location==$payeePaypalAccountCountry)
{
    if($payer_location==1 || $payer_location==3)
    {
        //USA OR Other
        $amount->setCurrency('USD');
    }
    else
    {
        //INR
        $amount->setCurrency('INR');
        //echo "INR";
    }
}
else
{
    $amount->setCurrency('USD');
}
//echo $payer_location.",".$payeePaypalAccountCountry.'<br>';


$payee = new \PayPal\Api\Payee();
$payee->setEmail($payeeEmail);

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount)
    ->setPayee($payee);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://192.168.0.101:80/meagl.com/completetransaction.php?success=true&sid=".$tipperId."&rid=".$tipReceiverId."&imageId=".$imageForTipId."&redir=tip-memer.php?imageId=".$imageForTipId)
    ->setCancelUrl("http://192.168.0.101:80/meagl.com/completetransaction.php?success=false&sid=".$tipperId."&rid=".$tipReceiverId."&imageId=".$imageForTipId."&redir=tip-memer.php?imageId=".$imageForTipId);

/*$redirectUrls->setReturnUrl("http://192.168.0.101:80/meagl.com/completetransaction.php?success=true&redir=makepayment")
    ->setCancelUrl("http://192.168.0.101:80/meagl.com/completetransaction.php?success=false&redir=makepayment");*/

//web experience profile part
$flowConfig = new \PayPal\Api\FlowConfig();
$flowConfig->setLandingPageType("Billing");
$flowConfig->setBankTxnPendingUrl("http://192.168.0.101:80/meagl.com/completetransaction.php?success=true");
$flowConfig->setUserAction("commit");
$flowConfig->setReturnUriHttpMethod("GET");

$presentation = new \PayPal\Api\Presentation();
$presentation->setLogoImage("http://192.168.0.101:80/meagl.com/logo/m_2.png")
    ->setBrandName("Tip ".$creatorName)
//  Locale of pages displayed by PayPal payment experience.
    ->setLocaleCode("US")
    ->setReturnUrlLabel("Return")
    ->setNoteToSellerLabel("Thanks!");

$inputFields = new \PayPal\Api\InputFields();
$inputFields->setAllowNote(true)
    ->setNoShipping(1)
    ->setAddressOverride(0);

$webProfile = new \PayPal\Api\WebProfile();
$webProfile->setName("Tip Memer" . uniqid())
    ->setFlowConfig($flowConfig)
    ->setPresentation($presentation)
    ->setInputFields($inputFields)
    ->setTemporary(true);

// For Sample Purposes Only.
//$request = clone $webProfile;
try {
    // Use this call to create a profile.
    $createProfileResponse = $webProfile->create($apiContext);
} catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    //ResultPrinter::printError("Created Web Profile", "Web Profile", null, $request, $ex);
    exit(1);
}
$experienceProileId=$createProfileResponse->id;
//web experience profile end

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setExperienceProfileId($experienceProileId)
    ->setPayer($payer)
    ->setTransactions(array($transaction))    
    ->setRedirectUrls($redirectUrls);


// 4. Make a Create Call and print the values
try {
    $payment->create($apiContext);
    //echo $payment;

    //$data = json_decode($payment,true);
    //$trans_data=$data['transactions'];
    //echo $trans_data[0]['amount']['total'];    

    //deleting the web profile
    /*$webProfile1 = new \PayPal\Api\WebProfile();
    $webProfile1->setId($createProfileResponse->getId());
    try {
        // Execute the delete method
        $webProfile1->delete($apiContext);
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printError("Deleted Web Profile", "Web Profile", $createProfileResponse->getId(), null, $ex);
        exit(1);
    }*/

    //redirecting to approval url
    //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
    echo $payment->getApprovalLink();

}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    //This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    //echo $ex->getData();
    echo "http://192.168.0.101:80/meagl.com/completetransaction.php?success=false&redir=tip-memer.php?imageId=".$imageForTipId;
}

//var_dump($payment->getLinks());