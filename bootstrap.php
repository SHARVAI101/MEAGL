<?php

// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
// Used for composer based installation
require __DIR__  . '/vendor/autoload.php';
// Use below for direct download installation
// require __DIR__  . '/PayPal-PHP-SDK/autoload.php';
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps


/*
//paypal default app
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',     // ClientID
        'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL'      // ClientSecret
    )
);*/

//meagldev app
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AcL7C6HgRiCinO2V4A_fFO278AVGLeNrLp_NGb_G_fGdpBeqiFhGUacnwSCdaJVnmQ3uq0WlloRj7n51',     // ClientID
        'EFZhpWUrWumLJteaRbk08Dz4B-jnz4W1C1OFRe8e-r9njDyId9MyO00_nau03cpddFTcPTZyf-xYjbX5'      // ClientSecret
    )
);

/*$apiContext->setConfig{[
    'mode'=>'sandbox',
    'http.ConnectionTimeOut'=>30,
    'log.LogEnabled'=>true,
    'log.FileName'=>'logs.txt'
]};*/