<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\Exception;

class GuzzleController extends Controller
{
    //

    public function send_alert($msg_content)
    {

        $client = new Client();

        // Set the API URL and chat ID
        $apiUrl = 'https://api.telegram.org/bot' . $msg_content->bot_api_key . '/sendMessage';
        $chatId = $msg_content->channel_id;

        $project_name = $msg_content->project_name;
        $domain_name = $msg_content->domain_name;
        $severity_level = $msg_content->severity;
        $error_msg = $msg_content->error_msg;

        $formattedMessage = "*Alert Manager*\n\n*Project Name*: $project_name\n*Domain Name*: $domain_name\n*Severity Level*: $severity_level\n*Error Message*: $error_msg";
        // Set the message text

        try {
            // Send the POST request with form data
            $response = $client->post($apiUrl, [
                'form_params' => [
                    'chat_id' => $chatId,
                    'text' => $formattedMessage,
                    'parse_mode' => 'Markdown',
                ],
            ]);

            // Get the response body
            $responseBody = $response->getBody();

            // Process the response as needed
            // ...
            return $responseBody;
        } catch (Exception $e) {
            // Handle any exceptions that occur
            return $e;
            // ...
        }
    }
    // Create a new Guzzle client instance
}
