<?php

require_once 'vendor/autoload.php';

use \Mailjet\Resources;

$apiKey = 'Your api key';
$apiSecret = 'Your secret key';

$mailjet = new \Mailjet\Client($apiKey, $apiSecret, true, ['version' => 'v3.1']);

$emailData = [
    'Messages' => [
        [
            'From' => [
                'Email' => 'From Mail Id',
                'Name' => 'Pixlogix'
            ],
            'To' => [
                [
                    'Email' => 'Reciver Mail Id',
                    'Name' => 'Hello'
                ]
            ],
            'Subject' => 'Test Mail From Mailjet Custom Code',
            'HTMLPart' => '<p>This is a test email.</p>'
        ]
    ]
];

$response = $mailjet->post(Resources::$Email, ['body' => $emailData]);

if ($response->success()) {
    echo 'Email sent successfully!';
} else {
    echo 'Error occurred while sending the email: ' . $response->getReasonPhrase();
}

?>
