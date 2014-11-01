Symfony-Bundle
==============

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
