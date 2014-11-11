Symfony-Bundle
==============

[![Build Status](https://secure.travis-ci.org/Notifier/Symfony-Bundle.png)](https://travis-ci.org/Notifier/Symfony-Bundle)
[![Latest Stable Version](https://poser.pugx.org/notifier/notifier-bundle/version.svg)](https://packagist.org/packages/notifier/notifier-bundle)
[![Latest Unstable Version](https://poser.pugx.org/notifier/notifier-bundle/v/unstable.svg)](//packagist.org/packages/notifier/notifier-bundle)
[![Total Downloads](https://poser.pugx.org/notifier/notifier-bundle/downloads.svg)](https://packagist.org/packages/notifier/notifier-bundle)
[![Dependency Status](https://www.versioneye.com/user/projects/54617130a23e41f3be00003b/badge.svg)](https://www.versioneye.com/user/projects/54617130a23e41f3be00003b)
[![License](https://poser.pugx.org/notifier/notifier-bundle/license.svg)](https://packagist.org/packages/notifier/notifier-bundle)

Notifier integration for symfony projects.

Installation
------------

Installing this bundle can be done through these simple steps:

1. Add the bundle to your project as a composer dependency:
  ```javascript
  // composer.json
  {
      // ...
      require: {
          // ...
          "notifier/notifier-bundle": "~1.0"
      }
  }
  ```

2. Update your composer installation:
  ```shell
  composer update
  ````

3. Add the bundle to your application kernel:
  ```php
  // app/AppKernel.php
  public function registerBundles()
  {
      // ...
      $bundle = array(
          // ...
          new Notifier\NotifierBundle\NotifierNotifierBundle(),
      );
      // ...
  
      return $bundles;
  }
  ```

Usage
-----

**Implement the data provider**

Implement `\Notifier\NotifierBundle\Notifier\RecipientChannelResolverInterface` and register it as a service.
Than register that service identifier as the `recipient_channel_resolver`.

**Configure the types**

`config.yml`

```
notifier:
   recipient_channel_resolver: "acme.recipient_channel_resolver"
   types:
       alert:
           channels: [ "acme.mail_channel" ]
```

Make sure the channels all resolve to an existing service defined in the project.

**Send a message**

```
use Notifier\Message\Message;
use Notifier\Recipient\Recipient;
use Notifier\NotifierBundle\Type\Type;

// ...

$message = new Message(new Type('alert'));
$this->get('notifier')->sendMessage($message, array(new Recipient('identifier')));
```

Contributing
------------

> All code contributions - including those of people having commit access - must
> go through a pull request and approved by a core developer before being
> merged. This is to ensure proper review of all the code.
>
> Fork the project, create a feature branch, and send us a pull request.
>
> To ensure a consistent code base, you should make sure the code follows
> the [Coding Standards](http://symfony.com/doc/2.0/contributing/code/standards.html)
> which we borrowed from Symfony.
> Make sure to check out [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) as this will help you a lot.

If you would like to help, take a look at the [list of issues](http://github.com/Notifier/NotifierBundle/issues).

Requirements
------------

PHP 5.3.2 or above

Author and contributors
-----------------------

Dries De Peuter - <dries@nousefreak.be> - <http://nousefreak.be>

See also the list of [contributors](https://github.com/Notifier/NotifierBundle/contributors) who participated in this project.

License
-------

NotifierBundle is licensed under the MIT license.
