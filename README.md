#Banckle.Helpdesk for Symfony

This bundle allows you to work with Banckle.Helpdesk SDK in your Symfony applications quickly and easily. 


Installation
----------------------------------

Add the following lines to your composer.json file:

<pre>
// composer.json
{
    // ...
    require: {
        // ..
        "banckle/helpdesk-sdk-php": "dev-master",
        "banckle/helpdesk-bundle": "dev-master"

    }
}
</pre>


Now, you can install the new dependencies by running Composer's update command from the directory where your composer.json file is located.

<pre>
    composer update
</pre>


Update your AppKernel.php file, and register the new bundle:

<pre>
// app/AppKernel.php
public function registerBundles()
{
    // ...
     new Banckle\Bundle\HelpdeskBundle\BanckleHelpdeskBundle(),
    // ...
);
}
</pre>

Configuration
----------------------------------

Add this to your config.yml:

<pre>
banckle_helpdesk:
    #(Required) Your Account apiKey from apps.banckle.com
    apiKey: "XXXXXXXXXXXXX"
    banckleAccountUri: "https://apps.banckle.com/api/v2"
    banckleHelpdeskUri: "https://helpdesk.banckle.com/public/api/v1"
</pre>

Usage
----------------------------------

The Bundle is called as a standard service. 

<pre>
To access service:
$bancklehelpdesk = $this->get('bancklehelpdesk.api');

To generate token:
$bancklehelpdesk = $this->get('bancklehelpdesk.api');
$token = $bancklehelpdesk->getToken($email, $password);

To get all contacts:
$contacts = $bancklehelpdesk->createInstance('ContactsApi', $token);
$result = $contacts->getContacts();
</pre>
