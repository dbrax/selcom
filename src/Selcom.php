<?php

namespace Epmnzava\Selcom;

class Selcom
{

    public $baseUrl;
    public $baseauth;
    public $api_key;
    public $api_secret;
    public $timestamp;
    public function __construct($baseurl, $api_key, $api_secret)
    {
        $this->baseauth = base64_encode($api_key);
        $this->baseurl = $baseurl;
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->timestamp = date('c');
    }

    public function computeSignature($parameters, $signed_fields, $request_timestamp, $api_secret)
    {
        $fields_order = explode(',', $signed_fields);
        $sign_data = "timestamp=$request_timestamp";
        foreach ($fields_order as $key) {
            $sign_data .= "&$key=" . $parameters[$key];
        }


        //RS256 Signature Method
        #$private_key_pem = openssl_get_privatekey(file_get_contents("path_to_private_key_file"));
        #openssl_sign($sign_data, $signature, $private_key_pem, OPENSSL_ALGO_SHA256);
        #return base64_encode($signature);

        //HS256 Signature Method
        return base64_encode(hash_hmac('sha256', $sign_data, $api_secret, true));
    }
    public function create_order()
    {
    }

    public function create_order_minimal()
    {
    }

    public function cancel_order()
    {
    }

    public function get_order_status()
    {
    }

    public function list_all_orders()
    {
    }
}
