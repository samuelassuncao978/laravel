<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Channel;

class Google
{
    protected $apiClient;

    /**
     * Set a Google API client instance
     */
    public function __construct()
    {
        $this->apiClient = new Google_Client();

        $this->apiClient->setClientId(config('services.google.client_id'));
        $this->apiClient->setClientSecret(config('services.google.client_secret'));
        $this->apiClient->setRedirectUri(config('app.url') . config('services.google.redirect_uri'));
        $this->apiClient->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
        $this->apiClient->setApprovalPrompt(config('services.google.approval_prompt'));
        $this->apiClient->setAccessType(config('services.google.access_type'));
        $this->apiClient->setIncludeGrantedScopes(config('services.google.include_granted_scopes'));

        return $this;
    }

    /**
     * Use provided token
     */
    public function applyAccessToken(string $accessToken)
    {
        $this->apiClient->setAccessToken($accessToken);

        return $this;
    }

    /**
     * API Calendar Service getter for an interaction
     */
    public function getApiService()
    {
        return new Google_Service_Calendar($this->apiClient);
    }

    /**
     * API Calendar Channel getter for an interaction
     */
    public function getApiChannel()
    {
        return new Google_Service_Calendar_Channel();
    }
}