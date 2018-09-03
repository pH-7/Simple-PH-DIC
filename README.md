# P.H.'s Dependency Injection Container Library

The "P.H.'s DIC" is a simple and lightweight PHP 7.1+ **Dependency Injection Container**'s library which lets you manage your dependencies easily for your next great project 🎉


## Usage

Register your new DIC as below (FYI, for this example I use the [Symfony's HttpFoundation](https://packagist.org/packages/symfony/http-foundation) Request).


For the first example, let's create your provider class with an [anonymous class](http://php.net/manual/en/language.oop5.anonymous.php) that implements the `\PierreHenry\Container\Providable` interface.

```php
use PierreHenry\Container\Container;
use PierreHenry\Container\Providable;
use Symfony\Component\HttpFoundation\Request;

$container = new Container();

// Register your container
$container->register(
    'example.symfony.httprequest',
    new class implements Providable
    {
        public function getService(): Request
        {
            return Request::createFromGlobals();
        }
    }
);

// Retrieve the container
$httpRequest = $container->get('example.symfony.httprequest');

// Use it
$request = $httpRequest->request; // $_POST body params
if ($request->get('get_var')) {
    echo '$_POST["get var"] exists';
} else {
    echo '"get_var" has not been requested';
}
```

### Another Example...

```php
use DateTime;
use DateTimeZone;
use PierreHenry\Container\Container;
use PierreHenry\Container\Providable;

$container = new Container();
$container->register(
    'stubs.date.datetime',
    new class implements Providable
    {
        public function getService(): DateTime
        {
            return new DateTime('now', new DateTimeZone('America/Chicago'));
        }
    }
);

// Retrieve the container
$date = $container->get('stubs.date.datetime');

// Use it
echo $date->format('m-d-Y H:i:s');
```


## The Requirements

* [PHP 7.1](http://php.net/releases/7_1_0.php) or newer
* [Composer](https://getcomposer.org)


## Inspired By...

This project is highly inspired by my [DIC](https://github.com/Lifyzer/Lifyzer-WebApp-CMS/tree/master/Server/Core/Container) I built for another [side-project](https://lifyzer.com).


## ...Who Am I...? 🤔

Hi 😉 I am [Pierre-Henry Soria](http://ph7.me), "[PierreHenry.be](http://pierrehenry.be)": a cool passionate Belgian software engineer :belgium: :smiley:

You can keep in touch at *hi {{AT}} ph7 [[D0T]] me*!


## License

Under [GNU GPL v3](https://www.gnu.org/licenses/gpl-3.0.en.html) or later.
