# php-sdk
> PHP SDK Library / Wrapper for the [Webdock](https://webdock.io) API


## Installation 
### Composer
To use the Webdock SDK, install it to your project with [Composer](https://getcomposer.org/doc/00-intro.md).
- `composer require webdock/1.0.0`



## Example Usage 

```
<?php 
require_once 'vendor/autoload.php';

$client = new \Webdock\Client('Your Access token');


# Create a new server instance 
$params = [
  'name' => 'mynewserver1',
  'slug' => 'mynewserver1',
  'locationId' => 'fi',
  'profileSlug' => 'webdockmicro',
  'imageSlug' => 'krellide:webdock-focal-lemp-php74',
];

$newServer = $client->server->create($params);

?>
```


## API References



