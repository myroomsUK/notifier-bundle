# Myrooms Notifier Bundle

## Installation
Add this repository in composer.json file

```
"repositories": [
    {
        "name": "myrooms/notifier-messages",
        "type": "vcs", "url": "git@github.com:myroomsUK/myrooms-notifier-messages.git"
    },
    {
        "name": "myrooms/notifier-bundle",
        "type": "vcs", "url": "git@github.com:myroomsUK/notifier-bundle.git"
    }
]

```

Use composer to install the bundle
`composer require myrooms/notifier-bundle`

## Configuration

Register the bundle in your config/bundles.php file
`Myrooms\NotifierBundle\MyroomsNotifierBundle::class => ['all' => true]`

Add the DSN to the notifier database in your .env(.local) file
`NOTIFIER_DSN=mysql://user:password@host:port/myrooms_notifier`

Add a new doctrine connection using this DSN
```
doctrine:
    dbal:
        default_connection: default
        connections:
            default:
                url: '%env(resolve:DATABASE_DSN)%'
            notifier:
                url: '%env(resolve:NOTIFIER_DSN)%'
```

Add the transport in your messenger.yaml file
```
transports:
    notifier:
        dsn: 'doctrine://notifier'
```

Update the messenger routing with the NotifierMessageInterface
```
routing:
    'Myrooms\Messages\Notifier\NotifierMessage': notifier
```

## Usage
### Notifier

```
public function logSomething(Notifier $notifier) {
    $notifier->info('Info message here');
    $notifier->error('Error message here');
    $notifier->critical('Critical message here');
}
```