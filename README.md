# php-sdk
![CI](https://github.com/webdock-io/php-sdk/workflows/CI/badge.svg)
> PHP SDK Library / Wrapper for the [Webdock](https://webdock.io) API

## Installation

### Composer

To use the Webdock SDK, install it to your project with [Composer](https://getcomposer.org/doc/00-intro.md).

- `composer require webdock/php-sdk`

## Example Usage

```
<?php
require_once 'vendor/autoload.php';
$appName = 'YourAppName/v1.0';
$token = 'Your access token';
$client = new \Webdock\Client($token, $appName);


# Create a new server instance
$params = [
  'name' => 'mynewserver1',
  'slug' => 'mynewserver1',
  'locationId' => 'fi',
  'profileSlug' => 'webdockmicro',
  'imageSlug' => 'krellide:webdock-focal-lemp-php74',
];

$newServer = $client->server->create($params);

# To view HTTP Header Response
var_dump($newServer->getHeaders()->toArray());

# To view API call stats
var_dump($newServer->getApiStats());

# To view server response object
var_dump($newServer->getResponse());

# To view Server response in Array
var_dump($newServer->getResponse()->toArray());

# To view callbackID (if the endpoint is in asynchronous task. i.e. deleting server)
var_dump($newServer->getCallbackID());

?>
```

## Documentation

Full API documentation is available at https://api.webdock.io/

## API References

- **GET /ping** Sends a ping request to the Webdock API

  <details>
    <summary> Show example </summary>

  ```php
  $ping = $client->ping();

  var_dump($ping->getResponse()->toArray());
  ```

  </details>

- **GET /account/accountInformation** Get Account Information
  <details>
    <summary> Show example </summary>

  ```php
  $accountInfo = $client->accountInformation->get();
  ```

  </details>

- **GET /servers** Get a list of your servers
  <details>
    <summary> Show example </summary>

  ```php
  $status = 'active'; // [all, suspended, active]
  $serverList = $client->server->list($status);

  # to view the result
  foreach ($serverList->getResponse() as $server) {
    echo $server->name;
  }

  # or cast the response as arrays
  var_dump($serverList->getResponse()->toArray());

  # each individual item can be casted as an array too
  foreach ($serverList->getResponse() as $server) {
    var_dump($server->toArray());
  }
  ```

  </details>

- **POST /servers** Create a server
  <details>
    <summary> Show example </summary>

  ```php

  $params = [
    'name' => 'mynewserver1',
    'slug' => 'mynewserver1',
    'locationId' => 'fi', # get available locations: $client->location->list();
    'profileSlug' => 'webdockmicro',
    'imageSlug' => 'krellide:webdock-focal-lemp-php74',
  ]
  $newServer = $client->server->create($params);
  ```

  </details>

- **GET /servers/{serverSlug}** Get a specific server by slug
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'your-server-slug';
  $server = $client->server->get($slug);

  # Since the result is a single element, compared to the previous example (GET /servers), the response is in object/stdclass style

  echo $server->getResponse()->name;

  # We can also cast the response as an array
  var_dump($server->getResponse()->toArray());
  ```

  </details>

- **DELETE /servers/{serverSlug}** Delete a server

  This endpoint requires special privileges, if you want to enable this endpoint please contact Webdock support!
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'your-server-slug';
  $deleteServer = $client->delete($slug);
  ```

  </details>

- **PATCH /servers/{serverSlug}** Update server metadata
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $params = [
    'nextActionDate' => '2020-10-10',
    'name' => 'new server name',
    'description' => 'new server description',
    'notes' => 'another notes',
  ];
  $updateServer = $client->server->update($slug, $params);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/start** Start a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $startServer = $client->serverAction->start($slug);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/stop** Stop a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $stopServer = $client->serverAction->stop($slug);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/reboot** Reboot a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $stopServer = $client->serverAction->reboot($slug);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/suspend** Suspend a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $stopServer = $client->serverAction->suspend($slug);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/reinstall** Reinstall a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $image = 'krellide:webdock-focal-lemp-php74';
  $stopServer = $client->serverAction->reinstall($slug, $image);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/snapshot** Create a snapshot for a server
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $snapshotName = 'my server snapshot';
  $stopServer = $client->serverAction->snapshot($slug, $snapshotName);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/restore** Restore the server to a snapshot
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $snapshotId = 1203;
  $stopServer = $client->serverAction->restore($slug, $snapshotId);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/resize/dryrun** Dry Run for Server Profile Change
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $profileSlug = 'server-profile-a'; # Get the server profile in $client->profile->list($locationId);
  $stopServer = $client->serverAction->dryRunResize($slug, $profileSlug);
  ```

  </details>

- **POST /servers/{serverSlug}/actions/resize** Change a Server Profile
  <details>
    <summary> Show example </summary>

  ```php
  $slug = 'mynewserver1';
  $profileSlug = 'server-profile-a';
  $stopServer = $client->serverAction->resize($slug, $profileSlug);
  ```

  </details>

- **GET /locations** Get a list of possible server datacenter locations
  <details>
    <summary> Show example </summary>

  ```php
  $locations = $client->location->list();
  ```

  </details>

- **GET /profiles** Get a list of possible server hardware profiles
  <details>
    <summary> Show example </summary>

  ```php
  $locationId = 1002;
  $locations = $client->profile->list($locationId);
  ```

  </details>

- **GET /images** Get a list of possible server software images
  <details>
    <summary> Show example </summary>

  ```php
  $images = $client->image->list();
  ```

  </details>

- **GET /account/publicKeys** Get a list of public keys in your Webdock account
  <details>
    <summary> Show example </summary>

  ```php
  $myPublicKeys = $client->publicKey->list();
  ```

  </details>

- **POST /account/publicKeys** Add a new public key
  <details>
    <summary> Show example </summary>

  ```php
  $params = [
    'name' => 'my laptop public key',
    'publicKey' => 'ssh-rsa AAAB3...',
  ];
  $addPublicKey = $client->publicKey->create($params);
  ```

  </details>

- **DELETE /account/publicKeys/{id}** Delete a PublicKey
  <details>
    <summary> Show example </summary>

  ```php
  $publicKeyId = 12021;
  $deletePublicKey = $client->publicKey->delete($publicKeyId);
  ```

  </details>

- **GET /servers/{serverSlug}/shellUsers** Get a list of shell users for a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $shellUsers = $client->serverShellUser->list($serverSlug);
  ```

  </details>

- **POST /servers/{serverSlug}/shellUsers** Create a shell user in a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $params = [
    'username' => 'user1',
    'password' => 'X1xq0e-12k',
    'group' => 'user1',
    'shell' => 'zsh',
    'publicKeys' => [12021],
  ];
  $createShellUser = $client->serverShellUser->create($serverSlug, $params);
  ```

  </details>

- **DELETE /servers/{serverSlug}/shellUsers/{shellUserId}** Deletes a shell user
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $shellUserId = 40591;

  $deleteShellUser = $client->serverShellUser->delete(
    $serverSlug,
    $shellUserId
  );
  ```

  </details>

- **PATCH /servers/{serverSlug}/shellUsers/{shellUserId}** Update shell user Public Keys in a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $shellUserId = 40591;
  $params = ['publicKeys' => [1293, 19283]];
  $updateShellUser = $client->serverShellUser->update(
    $serverSlug,
    $shellUserId,
    $params
  );
  ```

  </details>

- **GET /account/scripts** Get a list of account scripts
  <details>
    <summary> Show example </summary>

  ```php
  $accountScripts = $client->accountScript->list();
  ```

  </details>

- **POST /account/scripts** Create an account script
  <details>
    <summary> Show example </summary>

  ```php
  $params = [
    'name' => 'my account script',
    'filename' => 'filename',
    'content' => 'the content',
  ];
  $createAccountScript = $client->accountScript->create($params);
  ```

  </details>

- **GET /account/scripts/{scriptId}** Get an account script by ID
  <details>
    <summary> Show example </summary>

  ```php
  $scriptId = 1203;
  $accountScript = $client->accountScript->get($scriptId);
  ```

  </details>

- **DELETE /account/scripts/{scriptId}** Delete an account script
  <details>
    <summary> Show example </summary>

  ```php
  $scriptId = 1203;
  $deleteAccountScript = $client->accountScript->delete($scriptId);
  ```

  </details>

- **PATCH /account/scripts/{scriptId}** /account/scripts/{scriptId}
  <details>
      <summary> Show example </summary>

  ```php
  $scriptId = 1203;
  $params = [
    'name' => 'updated script#1',
    'filename' => 'myscript.sh',
    'content' => 'thecontent',
  ];
  $updateAccountScript = $client->accountScript->update($scriptId, $params);
  ```

    </details>

- **GET /scripts** Get a list of public scripts
  <details>
      <summary> Show example </summary>

  ```php
  $scripts = $client->script->list();
  ```

    </details>

- **GET /servers/{serverSlug}/scripts** Get a list of server scripts
  <details>
      <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $scripts = $client->serverScript->list($serverSlug);
  ```

    </details>

- **POST /servers/{serverSlug}/scripts** Create a server script
  <details>
      <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $params = [
    'scriptId' => 123,
    'path' => '/path/to/script',
    'makeScriptExecutable' => true,
    'executeImmediately' => true,
  ];
  $createServerScript = $client->serverScript->create($serverSlug, $params);
  ```

    </details>

- **GET /servers/{serverSlug}/scripts/{scriptId}** Get a server script by ID
  <details>
      <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $scriptId = 123;
  $script = $client->serverScript->get($serverSlug, $scriptId);
  ```

    </details>

- **DELETE /servers/{serverSlug}/scripts/{scriptId}** Delete a server script
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $scriptId = 123;
  $deleteScript = $client->serverScript->delete($serverSlug, $scriptId);
  ```

  </details>

- **POST /servers/{serverSlug}/scripts/{scriptId}/execute** Execute a server script
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $scriptId = 123;
  $executeScript = $client->serverScript->executeScript($serverSlug, $scriptId);
  $callbackId = $executeScript->getCallbackID();
  ```

  </details>

- **POST /servers/{serverSlug}/fetchFile** Fetches a file from the server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $filePath = '/path/to/file';
  $fetchFile = $client->serverScript->fetchFile($serverSlug, $filePath);
  ```

    </details>

- **GET /servers/{serverSlug}/metrics** Get server metrics
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $metric = $client->serverMetric->getMetrics($serverSlug);
  ```

  </details>

- **GET ​/servers​/{serverSlug}​/metrics​/now** Get instant metrics
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $metric = $client->serverMetric->getMetricsNow($serverSlug);
  ```

  </details>

- **GET /servers/{serverSlug}/snapshots** Get a list of snapshots for a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $snapshots = $client->serverSnapshot->list($serverSlug);
  ```

  </details>

- **GET ​/servers​/{serverSlug}​/snapshots​/{snapshotId}** Get a snapshot by ID for a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $snapshotId = 1022;
  $snapshot = $client->serverSnapshot->get($serverSlug, $snapshotId);
  ```

  </details>

- **DELETE /servers/{serverSlug}/snapshots/{snapshotId}** Deletes a snapshot by ID for a server
  <details>
    <summary> Show example </summary>

  ```php
  $serverSlug = 'mynewserver1';
  $snapshotId = 1022;
  $deleteSnapshot = $client->serverSnapshot->delete($serverSlug, $snapshotId);
  ```

  </details>

- **GET /hooks** Get a list of event hooks
  <details>
      <summary> Show example </summary>

  ```php
  $eventHooks = $client->eventHook->list();
  ```

  </details>

- **POST /hooks** Creates an event hook
  <details>
      <summary> Show example </summary>

  ```php
  $params = [
    'callbackUrl' => 'the_callback_url',
    'callbackId' => 10293,
  ];
  $createEventHook = $client->eventHook->create($params);
  ```

  </details>

- **GET /hooks/{hookId}** Get an event hook by ID
  <details>
    <summary> Show example </summary>

  ```php
  $hookId = 1223;
  $eventHook = $client->eventHook->get($hookId);
  ```

  </details>

- **DELETE /hooks/{hookId}** Deletes an event hook
  <details>
    <summary> Show example </summary>

  ```php
  $hookId = 1223;
  $deleteEventHook = $client->eventHook->delete($hookId);
  ```

  </details>

- **GET /events** Get a list of events
  <details>
      <summary> Show example </summary>

  ```php
  $params = [];
  $events = $client->eventPoll->list($params);
  ```

    </details>
