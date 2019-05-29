<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ExternalService
{
    /**
     * Send the request to any services
     *
     * @param  string $method
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function request($method, $requestUrl, $params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $response = $client->request($method, $requestUrl, ['form_params' => $params, 'headers' => $headers]);

        return $response->getBody()->getContents();
    }

    /**
     * Send the request to any services by GET method
     *
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function get($requestUrl, $params = [], $headers = [])
    {
        return $this->request('GET', $requestUrl, $params, $headers);
    }

    /**
     * Send the request to any services by POST method
     *
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function post($requestUrl, $params = [], $headers = [])
    {
        return $this->request('POST', $requestUrl, $params, $headers);
    }

    /**
     * Send the request to any services by PUT method
     *
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function put($requestUrl, $params = [], $headers = [])
    {
        return $this->request('PUT', $requestUrl, $params, $headers);
    }

    /**
     * Send the request to any services by PATCH method
     *
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function patch($requestUrl, $params = [], $headers = [])
    {
        return $this->request('PATCH', $requestUrl, $params, $headers);
    }

    /**
     * Send the request to any services by DELETE method
     *
     * @param  string $requestUrl
     * @param  array $params
     * @param  array $headers
     *
     * @return string
     */
    public function delete($requestUrl, $params = [], $headers = [])
    {
        return $this->request('DELETE', $requestUrl, $params, $headers);
    }
}
