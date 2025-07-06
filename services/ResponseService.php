<?php

class ResponseService
{

    public static function success_response($payload, $message = '')
    {
        $response = [];
        $response["status"] = 200;
        $response["message"] = $message;
        $response["payload"] = $payload;
        return json_encode($response);
    }
    public static function error_response($error)
    {
        $response = [];
        $response["status"] = 500;
        $response["error"] = $error;
        return json_encode($response);
    }


}