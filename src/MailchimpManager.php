<?php

namespace MailchimpSubscribe;

use GuzzleHttp\Client;

class MailchimpManager
{
    protected $client, $listId, $baseUri;

    public function __construct()
    {
        $apiKey = config('mailchimp.api_key');
        $server = config('mailchimp.server_prefix');
        $this->listId = config('mailchimp.list_id');
        $this->baseUri = "https://{$server}.api.mailchimp.com/3.0/";
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'auth' => ['anystring', $apiKey],
        ]);
    }

    public function getLists()
    {
        $response = $this->client->get('lists');
        return json_decode($response->getBody(), true);
    }

    public function subscribe($email, $mergeFields = [])
    {
        $response = $this->client->post("lists/{$this->listId}/members", [
            'json' => [
                'email_address' => $email,
                'status' => 'subscribed',
                'merge_fields' => $mergeFields,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }

    public function addTags($email, array $tags)
    {
        $subscriberHash = md5(strtolower($email));
        $response = $this->client->post("lists/{$this->listId}/members/{$subscriberHash}/tags", [
            'json' => [
                'tags' => collect($tags)->map(fn($tag) => ['name' => $tag, 'status' => 'active'])->values()->all()
            ],
        ]);
        return json_decode($response->getBody(), true);
    }

    public function unsubscribe($email)
    {
        $subscriberHash = md5(strtolower($email));
        $response = $this->client->patch("lists/{$this->listId}/members/{$subscriberHash}", [
            'json' => ['status' => 'unsubscribed'],
        ]);
        return json_decode($response->getBody(), true);
    }

    public function getCampaignReports()
    {
        $response = $this->client->get("reports");
        return json_decode($response->getBody(), true);
    }

    public function getCampaignReportById($campaignId)
    {
        $response = $this->client->get("reports/{$campaignId}");
        return json_decode($response->getBody(), true);
    }
}
