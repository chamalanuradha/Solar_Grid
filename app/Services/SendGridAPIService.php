<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class SendGridAPIService
{
    /**
     * Validate required fields and send email to a single address.
     * @param $data
     * @return array
     */
    public function sendSingleEmail($data): array
    {
        try {
            $validationRules = [
                'reply_to_name' => 'nullable',
                'reply_to_email' => 'nullable',
                'to_email' => 'required',
                'to_name' => 'required',
                'subject' => 'required',
                'body' => 'required',
            ];

            $validator = Validator::make($data, $validationRules);

            if ($validator->fails()) {
                return $this->responseDataFormat(false, $validator->errors()->first());
            }

            $sendGridCredentials = $this->getSendGridCredentials();
            if (!isset($sendGridCredentials)) {
                return $this->responseDataFormat(false, 'SendGrid credentials not found.');
            }

            $emailDataArr = $this->processEmailDataArray($sendGridCredentials, $data);
            return $this->sendMailCurlRequest($sendGridCredentials['key'], $emailDataArr);

        }catch (\Exception $e) {
            return $this->responseDataFormat(false, $e->getMessage().' on line '.$e->getLine());
        }
    }



    /**
     * Sends an email using the SendGrid API.
     * @param $apiKey
     * @param $data
     * @return array
     */
    protected function sendMailCurlRequest($apiKey, $data): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.$apiKey,
            'Content-Type: application/json'
        ]);

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $error = curl_errno($ch);
        curl_close($ch);

        if ($error) {
            return $this->responseDataFormat(false, $error);
        }

        if ($info['http_code'] == 202) {
            return $this->responseDataFormat(true, 'Success', json_decode($result));
        }

        return $this->responseDataFormat();
    }


    /**
     * Process email data array.
     *
     * @param $sendGridCredentials
     * @param $data
     * @return array
     */
    protected function processEmailDataArray($sendGridCredentials, $data): array
    {
        $response = [
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => $data['to_email'],
                            'name' => $data['to_name']
                        ]
                    ],
                    'subject' => $data['subject']
                ]
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $data['body']
                ]
            ],
            'from' => [
                'email' => $sendGridCredentials['from_email'],
                'name' => $sendGridCredentials['from_name']
            ]
        ];

        if (isset($data['reply_to_email'])) {
            $response['reply_to'] = [
                'email' => $data['reply_to_email'],
                'name' => $data['reply_to_name']
            ];
        }

        return $response;
    }


    /**
     * Get SendGrid credentials.
     *
     * @return array
     */
    public function getSendGridCredentials(): array
    {
        return [
            'key' => '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',
            'name' => 'SolarGridBox',
            'from_name' => 'SolarGridBox',
            'from_email' => 'sales@solar-gridbox.com.au',
        ];
    }


    /**
     * @param bool $success
     * @param string $message
     * @param array|null $data
     * @return array
     */
    protected function responseDataFormat(bool $success = false, string $message = 'Something went wrong.', array $data = null): array
    {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];
    }

}
