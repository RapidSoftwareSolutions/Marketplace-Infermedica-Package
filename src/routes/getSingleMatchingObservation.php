<?php

$app->post('/api/Infermedica/getSingleMatchingObservation', function ($request, $response) {
    /** @var \Slim\Http\Response $response */
    /** @var \Slim\Http\Request $request */
    /** @var \Models\checkRequest $checkRequest */

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['appId', 'appKey', 'phrase']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }

    $url = $settings['apiUrl'] . "/lookup";

    $headers['App-Id'] = $postData['args']['appId'];
    $headers['App-Key'] = $postData['args']['appKey'];
    $headers['Accept'] = 'application/json';
    if (isset($postData['args']['language']) && strlen($postData['args']['language']) > 0) {
        $headers['Model'] = $postData['args']['language'];
    }
    if (isset($postData['args']['devMode']) && strlen($postData['args']['devMode']) > 0) {
        $headers['Dev-Mode'] = filter_var($postData['args']['devMode'], FILTER_VALIDATE_BOOLEAN);
    }
    if (isset($postData['args']['interviewId']) && strlen($postData['args']['interviewId']) > 0) {
        $headers['Interview-Id'] = $postData['args']['interviewId'];
    }
    if (isset($postData['args']['userId']) && strlen($postData['args']['userId']) > 0) {
        $headers['User-Id'] = $postData['args']['userId'];
    }

    $params['phrase'] = $postData['args']['phrase'];
    if (isset($postData['args']['sex']) && strlen($postData['args']['sex']) > 0) {
        $params['sex'] = $postData['args']['sex'];
    }


    try {
        /** @var GuzzleHttp\Client $client */
        $client = $this->httpClient;
        $vendorResponse = $client->get($url, [
            'headers' => $headers,
            'query' => $params
        ]);
        $vendorResponseBody = $vendorResponse->getBody()->getContents();
        if ($vendorResponse->getStatusCode() == 200) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = json_decode($vendorResponse->getBody());
        }
        else {
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

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
