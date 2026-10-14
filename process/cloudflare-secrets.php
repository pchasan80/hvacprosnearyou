<?php

/**
 * Fetch a secret value from Cloudflare KV using API token auth.
 * Returns null when Cloudflare KV is not configured or fetch fails.
 */
function getCloudflareKvValue($key) {
    $accountId = getenv('CF_ACCOUNT_ID');
    $namespaceId = getenv('CF_KV_NAMESPACE_ID');
    $apiToken = getenv('CF_API_TOKEN');

    if (empty($accountId) || empty($namespaceId) || empty($apiToken)) {
        return null;
    }

    $keyPrefix = getenv('CF_KV_KEY_PREFIX');
    $lookupKey = (empty($keyPrefix) ? '' : $keyPrefix) . $key;
    $timeout = (int) getenv('CF_API_TIMEOUT');
    if ($timeout <= 0) {
        $timeout = 5;
    }

    $url = 'https://api.cloudflare.com/client/v4/accounts/'
        . rawurlencode($accountId)
        . '/storage/kv/namespaces/'
        . rawurlencode($namespaceId)
        . '/values/'
        . rawurlencode($lookupKey);

    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => "Authorization: Bearer {$apiToken}\r\n",
            'timeout' => $timeout
        )
    ));

    $response = @file_get_contents($url, false, $context);
    if ($response === false) {
        return null;
    }

    $statusLine = isset($http_response_header[0]) ? $http_response_header[0] : '';
    if (strpos($statusLine, '200') === false) {
        return null;
    }

    return trim($response);
}