<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpService
{
    public function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => config('services.mailchimp.server')
        ]);
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.list');

        $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
