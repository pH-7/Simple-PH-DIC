# P.H.'s Dependency Injection Container Library

The "P.H.'s DIC" is a simple PHP 7.1+ **Dependency Injection Container**'s library useful for your next big thing.


## Usage

Register your new DIC as below (FYI, for this example I use the Symfony's HttpFoundation Request):

```php
use PierreHenry\Container\Providable;
use Symfony\Component\HttpFoundation\Request;

$this->container->register(
    'example.symfony.httprequest',
    new class implements Providable
    {
        public function getService(): Request
        {
            return Request::createFromGlobals();
        }
    }
);

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

Under [GNU GPL v3](https://www.gnu.org/licenses/gpl-3.0.en.html)
