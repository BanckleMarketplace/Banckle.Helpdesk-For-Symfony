<?php

namespace Banckle\Bundle\HelpdeskBundle\Service;

use Banckle\Helpdesk\Product;
use Banckle\Helpdesk\APIClient;
use Banckle\Helpdesk\AuthApi;

class BanckleHelpdeskWrapper
{
    private $apiKey = '';
    private $banckleAccountUri = '';
    private $banckleHelpdeskUri = '';
	
    public function __construct($apiKey ,$banckleAccountUri, $banckleHelpdeskUri)
    {
        $this->apiKey = $apiKey;
        $this->banckleAccountUri = $banckleAccountUri;
        $this->banckleHelpdeskUri = $banckleHelpdeskUri;
    }
	
    /*
    * Generate new authentication token.
    *
    * @return string Returns the token.
    */
    public function getToken($email, $password)
    {
        if ($email == '') {
            throw new \InvalidArgumentException('Email not specified');
    	}
        
        if ($password == '') {
            throw new \InvalidArgumentException('Password not specified');
    	}
        
        $apiClient = new APIClient($this->apiKey, $this->banckleAccountUri);
        $body = array('userEmail' => $email, 'password' => $password);
        $auth = new AuthApi($apiClient);
        $result = $auth->getToken($body);
        $token = $result->authorization->token;
        return $token;
    }
	
    /*
    * Create an instance of the class.
    *
    * @param string $apiName Name of the class.
    * @param string $token Token.
    *
    * @return object
    * @throws Exception
    */
    public function createInstance($apiName, $token)
    {	
        if ($apiName == '') {
            throw new \InvalidArgumentException('API Name not specified');
    	}
		
        if ($token == '') {
            throw new \InvalidArgumentException('Token not specified');
    	}
		
        Product::$token = $token; 
        $apiClient = new APIClient($this->apiKey, $this->banckleHelpdeskUri);
        $classPath = "Banckle\Helpdesk\\$apiName"; 
        return new $classPath($apiClient);
    }
	
}