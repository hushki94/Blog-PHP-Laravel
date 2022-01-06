<?php

namespace App\Services;


class Newsletter {

    public function subscribe(string $email, $lists = null){

        $lists??= config('services.mailchimp.lists.subscribers');



        return $this->client()->lists->addListMember($lists, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }


    public function client(){
        $mailchimp = new \MailchimpMarketing\ApiClient();
        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);
    }
}
