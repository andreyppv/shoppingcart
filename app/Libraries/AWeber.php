<?php

namespace App\Libraries;

require_once('aweber/aweber.php');

use AWeberAPI, Request;
class AWeber extends AWeberAPI
{
    public $message = '';
    
    function __construct() {
        # replace XXX with your real keys and secrets
        $consumerKey      = getenv('AWEBER_CONSUMER_KEY');
        $consumerSecret   = getenv('AWEBER_CONSUMER_SECRET');
        $accessToken      = getenv('AWEBER_ACCESS_KEY');
        $accessSecret     = getenv('AWEBER_ACCESS_SECRET');
        $accountID        = getenv('AWEBER_ACCOUNT_ID');
        $listID           = getenv('AWEBER_LIST_ID');
        

        $instance = new AWeberAPI($consumerKey, $consumerSecret);
        $this->account = $instance->getAccount($accessToken, $accessSecret);
        $this->listURL = "/accounts/{$accountID}/lists/{$listID}";
    }
    
    function findSubscriber($email) {
        try {
            $foundSubscribers = $this->account->findSubscribers(array('email' => $email));
            return $foundSubscribers[0];
        } catch(AWeberAPIException $exc) {
            $this->message = $exc->message;
            return false;
        } 
    }
    
    function addSubscriber($email)
    {
        $existSubscriber = $this->findSubscriber($email);
        if($existSubscriber === NULL)
        {
            $list = $this->account->loadFromUrl($this->listURL);
            
            # create a subscriber
            $params = array(
                'email' => $email,
                'ip_address' => Request::ip(),
                'name' => 'customer',
            );
            $subscribers = $list->subscribers;
            $new_subscriber = $subscribers->create($params);
            
            return;
        }
        
        if($existSubscriber->status == 'unconfirmed')
        {
            $this->message = 'Email is already subscribed and has not confirmed.';
        }
        else
        {
            $this->message = 'Email is already subscribed.';
        }
    }
    
    function removeSubscriber($email)
    {
        $existSubscriber = $this->findSubscriber($email);
        if($existSubscriber !== NULL)
        {
            if($existSubscriber->status == 'unconfirmed')
            {
                $this->message = 'Email is already subscribed and has not confirmed.';
            }
            else
            {
                $existSubscriber->delete();   
            }
        }
    }
}