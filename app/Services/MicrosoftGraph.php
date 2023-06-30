<?php

namespace App\Services;

use Microsoft\Graph\Graph;

class MicrosoftGraph
{
    protected $apiClient;

    /**
     * Set a Microsoft Graph API client instance
     */
    public function __construct()
    {
        $this->apiClient = (new Graph)
            ->setApiVersion('v1.0');

        return $this;
    }

    /**
     * Use provided token
     */
    public function applyAccessToken(string $accessToken)
    {
        $this->apiClient->setAccessToken($accessToken);

        return $this->apiClient;
    }
}