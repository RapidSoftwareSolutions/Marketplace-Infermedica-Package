<?php

$app->post('/api/Infermedica/computeTriageLevel', function ($request, $response) {
    /** @var \Slim\Http\Response $response */
    /** @var \Slim\Http\Request $request */
    /** @var \Models\checkRequest $checkRequest */

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['appId', 'appKey', 'information']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }

    $url = $settings['apiUrl'] . '/triage';

    $toJson = new \Models\normilizeJson();
    $data = $toJson->normalizeJson(file_get_contents($postData['args']['information']));
    $data = json_decode(str_replace('\"', '"', $data . "s"), true);

    if ($data) {
        $headers['App-Id'] = $postData['args']['appId'];
        $headers['App-Key'] = $postData['args']['appKey'];
        if (isset($postData['args']['language']) && strlen($postData['args']['language']) > 0) {
            $headers['Model'] = $postData['args']['language'];
        }
        if (isset($postData['args']['devMode']) && strlen($postData['args']['devMode']) > 0) {
            $headers['Dev-Mode'] = filter_var($postData['args']['devMode'], FILTER_VALIDATE_BOOLEAN);
        }

        try {
            /** @var GuzzleHttp\Client $client */
            $client = $this->httpClient;
            $vendorResponse = $client->post($url, [
                'headers' => $headers,
                'json' => $data
            ]);
            $vendorResponseBody = $vendorResponse->getBody()->getContents();
            if ($vendorResponse->getStatusCode() == 200) {
                $result['callback'] = 'success';
                $result['contextWrites']['to'] = json_decode($vendorResponse->getBody());
            } else {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = 'API_ERROR';
                $result['contextWrites']['to']['status_msg'] = is_array($vendorResponseBody) ? $vendorResponseBody : json_decode($vendorResponseBody);
            }
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            $vendorResponseBody = $exception->getResponse()->getBody();
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($vendorResponseBody);
        }
    } else {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = 'Incorrect input JSON. Please, check fields with JSON input.';
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
